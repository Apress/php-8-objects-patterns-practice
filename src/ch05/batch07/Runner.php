<?php

declare(strict_types=1);

namespace popp\ch05\batch07;

use popp\ch04\batch02\BookProduct;
use popp\ch04\batch02\CdProduct;

class Runner
{
    public static function run()
    {
        $d = new Delegator();
        $d->andAnotherThing("a", "b");
    }
    public static function run2()
    {
/* listing 05.61 */
/* listing 05.63 */
        $prodclass = new \ReflectionClass(CdProduct::class);
/* /listing 05.63 */
        print $prodclass;
/* /listing 05.61 */
    }

    public static function run3()
    {
/* listing 05.62 */
        $cd = new CdProduct("cd1", "bob", "bobbleson", 4, 50);
        var_dump($cd);
/* /listing 05.62 */
    }

    public static function run4()
    {
/* listing 05.65 */
        $prodclass = new \ReflectionClass(CdProduct::class);
        print ClassInfo::getData($prodclass);
/* /listing 05.65 */
    }

    public static function run5()
    {
/* listing 05.67 */
        print ReflectionUtil::getClassSource(
            new \ReflectionClass(CdProduct::class)
        );
/* /listing 05.67 */
    }

    public static function run5_1()
    {
        print ReflectionUtil::getClassSource(
            new \ReflectionClass('\popp\ch05\batch07\Runner')
        );
    }

    public static function run6()
    {
/* listing 05.69 */
        $prodclass = new \ReflectionClass(CdProduct::class);
        $methods = $prodclass->getMethods();

        foreach ($methods as $method) {
            print ClassInfo::methodData($method);
            print "\n----\n";
        }
/* /listing 05.69 */
    }

    public static function runInstantiateMethod()
    {
/* listing 05.68 */
        $cd = new CdProduct("cd1", "bob", "bobbleson", 4, 50);
        $classname = CdProduct::class;

        $rmethod1 = new \ReflectionMethod("{$classname}::__construct");   // class/method string
        $rmethod2 = new \ReflectionMethod($classname, "__construct"); // class name and method name
        $rmethod3 = new \ReflectionMethod($cd, "__construct"); // object and method name
/* /listing 05.68 */

        return [$rmethod1, $rmethod2, $rmethod3];
    }

    public static function runInstantiateParameter()
    {
/* listing 05.73 */
        $classname = CdProduct::class;

        $rparam1 = new \ReflectionParameter([$classname, "__construct"], 1);
        $rparam2 = new \ReflectionParameter([$classname, "__construct"], "firstName");

        $cd = new CdProduct("cd1", "bob", "bobbleson", 4, 50);
        $rparam3 = new \ReflectionParameter([$cd, "__construct"], 1);
        $rparam4 = new \ReflectionParameter([$cd, "__construct"], "firstName");
/* /listing 05.73 */

        return [$rparam1, $rparam2, $rparam3, $rparam4];
    }

    public static function run7()
    {
/* listing 05.72 */
        $class = new \ReflectionClass(CdProduct::class);
        $method = $class->getMethod('getSummaryLine');
        print ReflectionUtil::getMethodSource($method);
/* /listing 05.72 */
    }

    public static function run8()
    {
/* listing 05.74 */
        $class = new \ReflectionClass(CdProduct::class);

        $method = $class->getMethod("__construct");
        $params = $method->getParameters();

        foreach ($params as $param) {
            print ClassInfo::argData($param) . "\n";
        }
/* /listing 05.74 */
    }
}
