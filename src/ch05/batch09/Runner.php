<?php

declare(strict_types=1);

namespace popp\ch05\batch09;

class Runner
{
    public static function runClass()
    {
/* listing 05.85 */
        $rpers = new \ReflectionClass(Person::class);
        $attrs = $rpers->getAttributes();
        foreach ($attrs as $attr) {
            print $attr->getName() . "\n";
        }
/* /listing 05.85 */
    }

    public static function runMethod1()
    {
/* listing 05.87 */
        $rpers = new \ReflectionClass(Person::class);
        $rmeth = $rpers->getMethod("setName");
        $attrs = $rmeth->getAttributes();
        foreach ($attrs as $attr) {
            print $attr->getName() . "\n";
        }
/* /listing 05.87 */
    }

    public static function runMethod2()
    {
/* listing 05.89 */
        $rpers = new \ReflectionClass(Person::class);
        $rmeth = $rpers->getMethod("setInfo");
        $attrs = $rmeth->getAttributes();
        foreach ($attrs as $attr) {
            print $attr->getName() . "\n";
            foreach ($attr->getArguments() as $arg) {
                print "  - $arg\n";
            }
        }
/* /listing 05.89 */
    }

    public static function runMethod3()
    {
/* listing 05.91 */
        $rpers = new \ReflectionClass(Person::class);
        $rmeth = $rpers->getMethod("setInfo");
        $attrs = $rmeth->getAttributes();
        foreach ($attrs as $attr) {
            print $attr->getName() . "\n";
            $attrobj = $attr->newInstance();
            print "  - " . $attrobj->compinfo . "\n";
            print "  - " . $attrobj->depinfo . "\n";
        }
/* /listing 05.91 */
    }

    public static function runMethod4()
    {
/* listing 05.92 */
        $rpers = new \ReflectionClass(Person::class);
        $rmeth = $rpers->getMethod("setInfo");
        $attrs = $rmeth->getAttributes(ApiInfo::class);
/* /listing 05.92 */
        foreach ($attrs as $attr) {
            print $attr->getName() . "\n";
            $attrobj = $attr->newInstance();
            print "  - " . $attrobj->compinfo . "\n";
            print "  - " . $attrobj->depinfo . "\n";
        }
    }

    public static function runMethod5()
    {
/* listing 05.93 */
        $rpers = new \ReflectionClass(Person::class);
        $rmeth = $rpers->getMethod("setInfo");
        $attrs = $rmeth->getAttributes(ApiInfo::class, \ReflectionAttribute::IS_INSTANCEOF);
/* /listing 05.93 */
        foreach ($attrs as $attr) {
            print $attr->getName() . "\n";
            $attrobj = $attr->newInstance();
            print "  - " . $attrobj->compinfo . "\n";
            print "  - " . $attrobj->depinfo . "\n";
        }
    }
}
