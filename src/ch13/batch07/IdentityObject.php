<?php

declare(strict_types=1);

namespace popp\ch13\batch07;

/* listing 13.40 */
class IdentityObject
{
    protected ?Field $currentfield = null;
    protected array $fields = [];
    private array $enforce = [];

    // an identity object can start off empty, or with a field
    public function __construct(?string $field = null, ?array $enforce = null)
    {
        if (! is_null($enforce)) {
            $this->enforce = $enforce;
        }

        if (! is_null($field)) {
            $this->field($field);
        }
    }

    // field names to which this is constrained
    public function getObjectFields(): array
    {
        return $this->enforce;
    }

    // kick off a new field.
    // will throw an error if a current field is not complete
    // (ie age rather than age > 40)
    // this method returns a reference to the current object
    // allowing for fluent syntax
    public function field(string $fieldname): self
    {
        if (! $this->isVoid() && $this->currentfield->isIncomplete()) {
            throw new \Exception("Incomplete field");
        }

        $this->enforceField($fieldname);

        if (isset($this->fields[$fieldname])) {
            $this->currentfield = $this->fields[$fieldname];
        } else {
            $this->currentfield = new Field($fieldname);
            $this->fields[$fieldname] = $this->currentfield;
        }

        return $this;
    }

    // does the identity object have any fields yet
    public function isVoid(): bool
    {
        return empty($this->fields);
    }

    // is the given fieldname legal?
    public function enforceField(string $fieldname): void
    {
        if (! in_array($fieldname, $this->enforce) && ! empty($this->enforce)) {
            $forcelist = implode(', ', $this->enforce);
            throw new \Exception("{$fieldname} not a legal field ($forcelist)");
        }
    }

    // add an equality operator to the current field
    // ie 'age' becomes age=40
    // returns a reference to the current object (via operator())
    public function eq($value): self
    {
        return $this->operator("=", $value);
    }

    // less than
    public function lt($value): self
    {
        return $this->operator("<", $value);
    }

    // greater than
    public function gt($value): self
    {
        return $this->operator(">", $value);
    }

    // does the work for the operator methods
    // gets the current field and adds the operator and test value
    // to it
    private function operator(string $symbol, $value): self
    {
        if ($this->isVoid()) {
            throw new \Exception("no object field defined");
        }

        $this->currentfield->addTest($symbol, $value);

        return $this;
    }

    // return all comparisons built up so far in an associative array
    public function getComps(): array
    {
        $ret = [];

        foreach ($this->fields as $field) {
            $ret = array_merge($ret, $field->getComps());
        }

        return $ret;
    }
/* /listing 13.40 */

    public function __toString(): string
    {
        $ret = [];

        foreach ($this->getComps() as $compdata) {
            $ret[] = "{$compdata['name']} {$compdata['operator']} {$compdata['value']}";
        }

        return implode(" AND ", $ret);
    }
/* listing 13.40 */
}
/* /listing 13.40 */
