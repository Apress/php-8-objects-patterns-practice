<?php

declare(strict_types=1);

namespace popp\ch13\batch05;

class Runner
{
    public static function run()
    {
        // runner code here
        $factory = new VenueObjectFactory();
        $venue = $factory->createObject(
            [
                "id" => -1,
                "name" => "The Venue"
            ]
        );
        print_r($venue);
    }

    public static function run2()
    {
        $raw = [
            [
                "id" => -1,
                "name" => "The Venue"
            ],
            [
                "id" => -2,
                "name" => "The Other Venue"
            ]
        ];

        $collection = new VenueCollection($raw, new VenueObjectFactory());
        $ret = [];
        foreach ($collection as $venue) {
            $ret[] = $venue->getName();
        }
        return $ret;
    }
}
