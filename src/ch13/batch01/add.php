<?php

declare(strict_types=1);

namespace popp\ch13\batch01;

$collection->add(new \woo\domain\Venue(null, "Loud and Thumping"));
$collection->add(new \woo\domain\Venue(null, "Eeezy"));
$collection->add(new \woo\domain\Venue(null, "Duck and Badger"));

foreach ($collection as $venue) {
    print $venue->getName() . "\n";
}
