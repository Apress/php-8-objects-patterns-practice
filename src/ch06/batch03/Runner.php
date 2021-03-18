<?php

namespace popp\ch06\batch03;

use popp\ch03\batch12\ShopProduct;
use popp\ch03\batch12\CdProduct;
use popp\ch03\batch12\BookProduct;

class Runner
{
    public static function run()
    {
/* listing 06.07 */
        $test = ParamHandler::getInstance(__DIR__ . "/params.xml");
        $test->addParam("key1", "val1");
        $test->addParam("key2", "val2");
        $test->addParam("key3", "val3");
        $test->write(); // writing in XML format
/* /listing 06.07 */
    }

    public static function run2()
    {
/* listing 06.08 */
        $test = ParamHandler::getInstance(__DIR__ . "/params.txt");
        $test->read(); // reading in text format
        $params = $test->getAllParams();
        print_r($params);
/* /listing 06.08 */
    }

    public static function run3()
    {
        $file = __DIR__ . "/newparams.txt";
        file_put_contents($file, "key1:val1\nkey2:val2\nkey3:val3\n");

/* listing 06.11 */
        // could return XmlParamHandler or TextParamHandler
        $test = ParamHandler::getInstance($file);

        $test->read();  // could be XmlParamHandler::read() or TextParamHandler::read()
        $test->addParam("newkey1", "newval1");
        $test->write(); // could be XmlParamHandler::write() or TextParamHandler::write()
/* /listing 06.11 */
    }


/* listing 06.12 */
    public function workWithProducts(ShopProduct $prod)
    {
        if ($prod instanceof CdProduct) {
            // do cd thing
/* /listing 06.12 */
            return "cd";
/* listing 06.12 */
        } elseif ($prod instanceof BookProduct) {
            // do book thing
/* /listing 06.12 */
            return "book";
/* listing 06.12 */
        }
/* /listing 06.12 */
        return "nomatch";
/* listing 06.12 */
    }
/* /listing 06.12 */
}
