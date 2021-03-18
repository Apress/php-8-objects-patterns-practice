<?php

namespace popp\ch12\batch07;

// fake mapper
class VenueMapper
{
    private array $fakevenues = [
        "Likey Lounge",
        "Happy House"
    ];

    public function findAll(): array
    {
        $ret = [];

        foreach ($this->fakevenues as $venuename) {
            $ret[] = new Venue($venuename);
        }

        return $ret;
    }
}
