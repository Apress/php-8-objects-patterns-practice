<?php

declare(strict_types=1);

namespace popp\ch13\batch04;

class ObjectWatcher
{
/* listing 13.24 */

    // ObjectWatcher

    private array $all = [];
    private array $dirty = [];
    private array $new = [];
    private array $delete = []; // unused in this example
    private static ?ObjectWatcher $instance = null;

/* /listing 13.24 */

    private function __construct()
    {
    }

    public static function reset(): void
    {
        self::$instance = null;
    }

    public static function instance(): self
    {
        if (is_null(self::$instance)) {
            self::$instance = new ObjectWatcher();
        }

        return self::$instance;
    }

    public function globalKey(DomainObject $obj): string
    {
        return  get_class($obj) . "." . $obj->getId();
    }

    public static function add(DomainObject $obj): DomainObject
    {
        $inst = self::instance();
        $inst->all[$inst->globalKey($obj)] = $obj;

        return $obj;
    }

    public static function exists($classname, $id): ?DomainObject
    {
        $inst = self::instance();
        $key = "{$classname}.{$id}";

        if (isset($inst->all[$key])) {
            return $inst->all[$key];
        }

        return null;
    }

/* listing 13.24 */
    public static function addDelete(DomainObject $obj): void
    {
        $inst = self::instance();
        $inst->delete[$inst->globalKey($obj)] = $obj;
    }

    public static function addDirty(DomainObject $obj): void
    {
        $inst = self::instance();

        if (! in_array($obj, $inst->new, true)) {
            $inst->dirty[$inst->globalKey($obj)] = $obj;
        }
    }

    public static function addNew(DomainObject $obj): void
    {
        $inst = self::instance();
        // we don't yet have an id
        $inst->new[] = $obj;
    }

    public static function addClean(DomainObject $obj): void
    {
        $inst = self::instance();
        unset($inst->delete[$inst->globalKey($obj)]);
        unset($inst->dirty[$inst->globalKey($obj)]);

        $inst->new = array_filter(
            $inst->new,
            function ($a) use ($obj) {
                return !($a === $obj);
            }
        );
    }

    public function performOperations(): void
    {
        foreach ($this->dirty as $key => $obj) {
            $obj->getFinder()->update($obj);
        }

        foreach ($this->new as $key => $obj) {
            $obj->getFinder()->insert($obj);
            print "inserting " . $obj->getName() . "\n";
        }

        $this->dirty = [];
        $this->new = [];
    }
/* /listing 13.24 */
}
