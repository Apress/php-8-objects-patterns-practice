<?php

declare(strict_types=1);

namespace popp\ch13\batch05;

use popp\ch13\batch04\DomainObject;

/* listing 13.35 */

abstract class Collection implements \Iterator
{
    protected int $total = 0;
    protected array $raw = [];

    private int $pointer = 0;
    private array $objects = [];

    // Collection

    public function __construct(array $raw = [], protected ?DomainObjectFactory $dofact = null)
    {
        if (count($raw) && ! is_null($dofact)) {
            $this->raw = $raw;
            $this->total = count($raw);
        }
        $this->dofact = $dofact;
    }

    // ...

/* /listing 13.35 */

    public function add(DomainObject $object): void
    {
        $class = $this->targetClass();

        if (! ($object instanceof $class )) {
            throw new Exception("This is a {$class} collection");
        }

        $this->notifyAccess();
        $this->objects[$this->total] = $object;
        $this->total++;
    }

    abstract public function targetClass(): string;

    protected function notifyAccess()
    {
        // deliberately left blank!
    }

/* listing 13.36 */

    private function getRow(int $num): ?DomainObject
    {
        // ...
/* /listing 13.36 */
        $this->notifyAccess();

        if ($num >= $this->total || $num < 0) {
            return null;
        }

        if (isset($this->objects[$num])) {
            return $this->objects[$num];
        }

/* listing 13.36 */
        if (isset($this->raw[$num])) {
            $this->objects[$num] = $this->dofact->createObject($this->raw[$num]);

            return $this->objects[$num];
        }
    }
/* /listing 13.36 */

    public function rewind(): void
    {
        $this->pointer = 0;
    }

    public function current(): mixed
    {
        return $this->getRow($this->pointer);
    }

    public function key(): mixed
    {
        return $this->pointer;
    }

    public function next(): void
    {
        $row = $this->getRow($this->pointer);
        if ($row) {
            $this->pointer++;
        }
    }

    public function valid(): bool
    {
        return (! is_null($this->current()));
    }
}
