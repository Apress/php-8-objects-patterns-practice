<?php

declare(strict_types=1);

namespace popp\ch12\batch11;

/* listing 12.46 */
abstract class DomainObject
{

    public function __construct(private int $id)
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public static function getCollection(string $type): Collection
    {
        // dummy implementation
        return Collection::getCollection($type);
    }

    public function markDirty(): void
    {
        // next chapter!
    }
}
