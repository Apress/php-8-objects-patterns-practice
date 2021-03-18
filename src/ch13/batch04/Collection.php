<?php

declare(strict_types=1);

namespace popp\ch13\batch04;

abstract class Collection implements \Iterator
{
    protected int $total = 0;
    private int $pointer = 0;
    private array $objects = [];

    public function __construct(protected array $raw = [], protected ?Mapper $mapper = null)
    {
        $this->total = count($raw);

        if (count($raw) && is_null($mapper)) {
            throw new AppException("need Mapper to generate objects");
        }
    }

    public function add(DomainObject $object): void
    {
        $class = $this->targetClass();

        if (! ($object instanceof $class )) {
            throw new AppException("This is a {$class} collection");
        }

        $this->notifyAccess();
        $this->objects[$this->total] = $object;
        $this->total++;
    }

    abstract public function targetClass(): string;

    protected function notifyAccess(): void
    {
        // deliberately left blank!
    }

    private function getRow($num): ?DomainObject
    {
        $this->notifyAccess();

        if ($num >= $this->total || $num < 0) {
            return null;
        }

        if (isset($this->objects[$num])) {
            return $this->objects[$num];
        }

        if (isset($this->raw[$num])) {
            $this->objects[$num] = $this->mapper->createObject($this->raw[$num]);
            return $this->objects[$num];
        }
    }

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

        if (! is_null($row)) {
            $this->pointer++;
        }
    }

    public function valid(): bool
    {
        return (! is_null($this->current()));
    }
}
