<?php

namespace popp\ch18\batch04\woo\domain;

class Venue extends DomainObject
{
    private $name;
    private $spaces;

    public function __construct($id = null, $name = null)
    {
        $this->name = $name;
        parent::__construct($id);
    }

    public function setSpaces(SpaceCollection $spaces)
    {
        $this->spaces = $spaces;
    }

    public function getSpaces()
    {
        if (! isset($this->spaces)) {
            $finder = self::getFinder('woo\\domain\\Space');
            $this->spaces = $finder->findByVenue($this->getId());
            //$this->spaces = self::getCollection("woo\\domain\\Space");
        }

        return $this->spaces;
    }

    public function addSpace(Space $space)
    {
        $this->getSpaces()->add($space);
        $space->setVenue($this);
    }

    public function setName($name_s)
    {
        $this->name = $name_s;
        $this->markDirty();
    }

    public function getName()
    {
        return $this->name;
    }

    public static function findAll()
    {
        $finder = self::getFinder(__CLASS__);

        return $finder->findAll();
    }

    public static function find($id)
    {
        $finder = self::getFinder(__CLASS__);

        return $finder->find($id);
    }
}
