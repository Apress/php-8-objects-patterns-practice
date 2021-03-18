<?php

namespace popp\ch03\batch05;

class Runner
{
    public static function run1()
    {
/* listing 03.24 */
        $settings = simplexml_load_file(__DIR__ . "/resolve.xml");
        $manager = new AddressManager();
        $manager->outputAddresses((string)$settings->resolvedomains);
/* /listing 03.24 */
    }
}
