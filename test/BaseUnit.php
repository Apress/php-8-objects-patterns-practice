<?php

namespace popp\test;
use PHPUnit\Framework\TestCase;

class BaseUnit extends TestCase
{

    function capture(callable $callme)
    {
        ob_start();
        $callme();
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }

    function xcapture(callable $callme)
    {
        ob_start();
        $callme();
        $output = ob_get_contents();
        ob_end_clean();
        $ret = "\n==========\n";
        $ret .= "        \$expected = <<<EXPECTED\n{$output}\nEXPECTED;\n\n";
        $ret .= "        self::assertEquals(\$expected, \$val);\n\n";
        $ret .= "==========\n";
        return $ret;
    }
}
