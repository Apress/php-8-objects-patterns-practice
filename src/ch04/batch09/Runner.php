<?php

declare(strict_types=1);

namespace popp\ch04\batch09;

class Runner
{
    public static function run()
    {
        $path = self::writeConf();
        $conf = new Conf($path);
        print "user: " . $conf->get('user') . "\n";
        print "host: " . $conf->get('host') . "\n";
        $conf->set("pass", "newpass2");
        $conf->write();
    }

    public static function writeConf($path = "/tmp/conf01.xml")
    {
        $xml = <<<XML
<?xml version="1.0" ?>
<conf>
    <item name="user">bob</item>
    <item name="pass">newpass</item>
    <item name="host">localhost</item>
</conf>
XML;
        file_put_contents($path, $xml);
        return $path;
    }
}
