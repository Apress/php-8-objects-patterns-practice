<?php

declare(strict_types=1);

namespace popp\ch13\batch04;

class Venue extends DomainObject
{
    private ?SpaceCollection $spaces = null;

    public function __construct(int $id, private string $name)
    {
        parent::__construct($id);
    }


    public function getSpaces(): SpaceCollection
    {
        if (is_null($this->spaces)) {
            $reg = Registry::instance();
            $this->spaces = $reg->getSpaceCollection();
        }

        return $this->spaces;
    }

    public function setSpaces(SpaceCollection $spaces): void
    {
        $this->spaces = $spaces;
    }

    public function addSpace(Space $space): void
    {
        $this->getSpaces()->add($space);
        $space->setVenue($this);
    }

    // Venue

    public function getSpaces2(): SpaceCollection
    {
        if (is_null($this->spaces)) {
            $reg = Registry::instance();
            $finder = $reg->getSpaceMapper();
            $this->spaces = $finder->findByVenue($this->getId());
        }

        return $this->spaces;
    }

    public function getFinder(): VenueMapper
    {
        $reg = Registry::instance();

        return $reg->getVenueMapper();
    }

    public function setName($name): void
    {
        $this->name = $name;
        $this->markDirty();
    }

    public function getName(): string
    {
        return $this->name;
    }
}
