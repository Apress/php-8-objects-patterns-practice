<?php

declare(strict_types=1);

namespace popp\ch13\batch01;

class Venue extends DomainObject
{
    private ?SpaceCollection $spaces = null;

    public function __construct(int $id, private string $name)
    {
        parent::__construct($id);
    }

/* listing 13.13 */

    // Venue

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
/* /listing 13.13 */

/* listing 13.19 */

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
/* /listing 13.19 */

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
