<?php

namespace popp\ch18\batch04\woo\domain;

class Event extends DomainObject
{
    private $start;
    private $duration;
    private $name;
    private $space;

    public function __construct($id = null, $name = "unknown")
    {
        parent::__construct($id);
        $this->name = $name;
    }

    public function setStart($start_l)
    {
        $this->start = $start_l;
    }

    public function getStart()
    {
        return $this->start;
    }

    public function setSpace(Space $space)
    {
        $this->space = $space;
        $this->markDirty();
    }

    public function getSpace()
    {
        return $this->space;
    }

    public function setDuration($duration_i)
    {
        $this->duration = $duration_i;
        $this->markDirty();
    }

    public function getDuration()
    {
        return $this->duration;
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
}
