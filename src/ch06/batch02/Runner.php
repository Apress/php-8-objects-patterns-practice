<?php

namespace popp\ch06\batch02;

require_once("src/ch06/batch02/paramreader.php");

class Runner
{
    public static function run()
    {
        $file = "/tmp/texttest.proc.xml";

        $params = [
            "key1" => "val1",
            "key2" => "val2",
            "key3" => "val3",
        ];

        \writeParams($params, $file);

        $output = \readParams($file);
        print_r($output);
    }
}
