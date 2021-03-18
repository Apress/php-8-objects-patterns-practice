<?php

declare(strict_types=1);

namespace popp\ch05\batch05;

use popp\ch05\batch05\util as u;
use popp\ch05\batch05\util\db\Querier as q;
use popp\ch04\batch02\BookProduct;

class Runner
{

    public static function runbefore()
    {
/* listing 05.37 */
        $classname = "Task";
        require_once("tasks/{$classname}.php");
        $classname = "tasks\\$classname";
        $myObj = new $classname();
        $myObj->doSpeak();
/* /listing 05.37 */
    }

    public static function runObjClass()
    {
/* listing 05.45 */
        $bookp = new BookProduct(
            "Catch 22",
            "Joseph",
            "Heller",
            11.99,
            300
        );
        print $bookp::class;
/* /listing 05.45 */
    }

    public static function run()
    {
/* listing 05.38 */
        $base = __DIR__;
        $classname = "Task";
        $path = "{$base}/tasks/{$classname}.php";
        if (! file_exists($path)) {
            throw new \Exception("No such file as {$path}");
        }
        require_once($path);
        $qclassname = "tasks\\$classname";
        if (! class_exists($qclassname)) {
            throw new Exception("No such class as $qclassname");
        }
        $myObj = new $qclassname();
        $myObj->doSpeak();
/* /listing 05.38 */
    }

/* listing 05.41 */
    public static function getProduct()
    {
        return new CdProduct(
            "Exile on Coldharbour Lane",
            "The",
            "Alabama 3",
            10.99,
            60.33
        );
    }
/* /listing 05.41 */

    public static function getBookProduct()
    {
        return new BookProduct(
            "Catch 22",
            "Joseph",
            "Heller",
            11.99,
            300
        );
    }

    public static function run2()
    {

/* listing 05.40 */
        $product = self::getProduct();
        if (get_class($product) === 'popp\ch05\batch05\CdProduct') {
            print "\$product is a CdProduct object\n";
        }
/* /listing 05.40 */

/* listing 05.42 */
        $product = self::getProduct();
        if ($product instanceof \popp\ch05\batch05\CdProduct) {
            print "\$product is an instance of CdProduct\n";
        }
/* /listing 05.42 */
    }

    public static function run3()
    {
        print u\Writer::class . "\n";
        print q::class . "\n";
        print Local::class . "\n";
    }

    public static function run4()
    {
        print_r(get_class_methods('\\popp\\ch04\\batch02\\BookProduct'));
    }

    public static function run5()
    {
/* listing 05.47 */
/* listing 05.56 */
        $product = self::getProduct();
        $method = "getTitle";   // define a method name
        print $product->$method(); // invoke the method
/* /listing 05.56 */
/* /listing 05.47 */

/* listing 05.48 */
        if (in_array($method, get_class_methods($product))) {
            print $product->$method(); // invoke the method
        }
/* /listing 05.48 */

/* listing 05.49 */
        if (is_callable([$product, $method])) {
            print $product->$method(); // invoke the method
        }
/* /listing 05.49 */

/* listing 05.51 */
        if (method_exists($product, $method)) {
            print $product->$method(); // invoke the method
        }
/* /listing 05.51 */

/* listing 05.52 */
        print_r(get_class_vars('\\popp\\ch05\\batch05\\CdProduct'));
/* /listing 05.52 */

        print get_parent_class('\\popp\\ch04\\batch02\\BookProduct');

/* listing 05.54 */
        $product = self::getBookProduct(); // acquire an object

        if (is_subclass_of($product, '\\popp\\ch04\\batch02\\ShopProduct')) {
            print "BookProduct is a subclass of ShopProduct\n";
        }
/* /listing 05.54 */


/* listing 05.55 */
        if (in_array('someInterface', class_implements($product))) {
            print "BookProduct is an interface of someInterface\n";
        }
/* /listing 05.55 */

/* listing 05.57 */
        $product = self::getBookProduct(); // Acquire a BookProduct object
        call_user_func([$product, 'setDiscount'], 20);
/* /listing 05.57 */
    }

    public static function runCallableName()
    {
        $product = self::getProduct();
        $method = "getTitle";   // define a method name
/* listing 05.50 */
        if (is_callable([$product, $method], false, $callableName)) {
            print $callableName;
        }
/* /listing 05.50 */
    }

    public static function runDeclared()
    {
/* listing 05.39 */
        print_r(get_declared_classes());
/* /listing 05.39 */
    }

    public static function runLocal()
    {
        $here = getcwd();
        chdir(__DIR__);
        require_once("LocalNsEg.php");
        
        chdir($here);
    }

    public static function runClassMethods()
    {
/* listing 05.46 */
        print_r(get_class_methods('\\popp\\ch04\\batch02\\BookProduct'));
/* /listing 05.46 */
    }
    
    public static function runClassVars()
    {
        print_r(get_class_vars('\\popp\\ch05\\batch05\\CdProduct'));
    }

    public static function runGetParentClass()
    {
/* listing 05.53 */
        print get_parent_class('\\popp\\ch04\\batch02\\BookProduct');
/* /listing 05.53 */
    }

    public static function runCallFunc()
    {
        $returnVal = call_user_func("popp\ch05\batch05\myFunction");
        return $returnVal;
    }

    public static function runVarCall()
    {
        $product = self::getBookProduct(); // Acquire a BookProduct object
/* listing 05.58 */
        $method = "setDiscount";
        $product->$method(20);
/* /listing 05.58 */
        return $product;
    }
}


function myFunction(): string
{
    return "myFunction";
}
