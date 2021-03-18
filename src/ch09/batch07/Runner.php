<?php

declare(strict_types=1);

namespace popp\ch09\batch07;

class Runner
{
    public static function run()
    {
/* listing 09.20 */
        $man = new CommsManager(CommsManager::MEGA);
        print (get_class($man->getApptEncoder())) . "\n";
        $man = new CommsManager(CommsManager::BLOGGS);
        print (get_class($man->getApptEncoder())) . "\n";
/* /listing 09.20 */
    }

    public static function run2()
    {
        $man = new CommsManager(CommsManager::MEGA);
        print $man->getHeaderText();
        $man = new CommsManager(CommsManager::BLOGGS);
        print $man->getHeaderText();
    }
}
