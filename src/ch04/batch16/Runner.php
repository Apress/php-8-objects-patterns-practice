<?php

declare(strict_types=1);

namespace popp\ch04\batch16;

class Runner
{
    public static function run()
    {
/* suspended_listing 04.78 */
        $address = new Address("441b Bakers Street");
        print "street address: {$address->streetaddress}\n";
        $address = new Address("15", "Albert Mews");
        print "street address: {$address->streetaddress}\n";
        $address->streetaddress = "34, West 24th Avenue";
        print "street address: {$address->streetaddress}\n";
/* /suspended_listing 04.78 */
    }

    public static function run2()
    {
/* listing 04.93 */
        $address = new Address("441b Bakers Street");
        print_r($address);
/* /listing 04.93 */
    }
}
