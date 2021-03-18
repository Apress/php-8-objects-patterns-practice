<?php

declare(strict_types=1);

namespace popp\ch04\batch10;

use popp\ch04\batch09\Runner as Runner09;

class Runner
{
    public static function run()
    {
        $path = Runner09::writeConf();
/* listing 04.65 */
        try {
            $conf = new Conf("/tmp/conf01.xml");
            //$conf = new Conf( "/root/unwriteable.xml" );
            //$conf = new Conf( "nonexistent/not_there.xml" );
            print "user: " . $conf->get('user') . "\n";
            print "host: " . $conf->get('host') . "\n";
            $conf->set("pass", "newpass");
            $conf->write();
/* listing 04.66 */
        } catch (\Exception $e) {
            // handle error in some way
/* /listing 04.65 */
            // or
            throw new \Exception("Conf error: " . $e->getMessage());
/* listing 04.65 */
        }
/* /listing 04.65 */
/* /listing 04.66 */
    }

    public static function run2()
    {
/* listing 04.67 */
        try {
            $conf = new Conf("nonexistent/not_there.xml");
        } catch (\Exception $e) {
            // handle error...
            // or rethrow
            throw $e;
        }
/* /listing 04.67 */
    }

    public static function run3()
    {
/* listing 04.68 */
        try {
            $conf = new Conf("nonexistent/not_there.xml");
        } catch (\Exception) {
            // handle error without using the Exception object
/* /listing 04.68 */
            return 100;
/* listing 04.68 */
        }
/* /listing 04.68 */
        return 5;
    }
}
