<?php

declare(strict_types=1);

/* listing 05.19 */
namespace popp\ch05\batch04;

/* /listing 05.19 */

use popp\ch05\batch04\util\InSame;
use popp\ch05\batch04\client\FromClient;
use popp\ch05\batch04\util as util;
use popp\ch05\batch04\util\Debug;
/* listing 05.19 */
use popp\ch05\batch04\util\TreeLister;

/* /listing 05.19 */

// need to include this non-namespace
require_once(__DIR__ . "/Lister.php");
//require_once(__DIR__ . "/util/Lister.php");

// cause name clash
//use popp\ch05\batch04\Debug;

// cure name clash with alias
use popp\ch05\batch04\Debug as CoreDebug;

class Runner
{
    public static function runbefore()
    {
/* listing 05.09 */
        \popp\ch05\batch04\Debug::helloworld();
/* /listing 05.09 */
    }

    public static function runRequires()
    {
        $path = get_include_path();
        set_include_path("{$path}:" . __DIR__);

/* listing 05.21 */
        require_once('business/Customer.php');
        require_once('util/WebTools.php');
/* /listing 05.21 */

/* listing 05.25 */
        require_once('business/User.php');
/* /listing 05.25 */
        set_include_path($path);
    }

    public static function run()
    {
        InSame::run();
    }

    public static function run2()
    {
        FromClient::run();
    }

    public static function run3()
    {
        util\Debug::helloWorld();
    }

    public static function run4()
    {
/* listing 05.08 */
        Debug::helloWorld();
/* /listing 05.08 */
    }

    public static function run5()
    {
        CoreDebug::helloWorld();
    }

    public static function run6()
    {
        CoreDebug::helloWorld();
    }

    public static function donotrunme()
    {
/* listing 05.23 */
        require_once('../../projectlib/business/User.php');
/* /listing 05.23 */
/* listing 05.24 */
        require_once('/home/john/projectlib/business/User.php');
/* /listing 05.24 */
    }

    public static function run7()
    {
/* listing 05.19 */
        TreeLister::helloWorld();  // access local
        \TreeLister::helloWorld(); // access from root
/* /listing 05.19 */
    }

    public static function run8()
    {
        require_once(__DIR__ . "/Autoload.php");
    }

    public static function run9()
    {
        require_once(__DIR__ . "/Autoload2.php");
    }

    public static function run10()
    {
        $here = getcwd();
        chdir(__DIR__);

        require_once(__DIR__ . "/Autoload3.php");

        chdir($here);
    }

    public static function run10_2()
    {
        $path = get_include_path();
        set_include_path("{$path}:" . __DIR__);
        require_once(__DIR__ . "/Autoload3_1.php");

        set_include_path($path);
    }

    public static function run11()
    {
        require_once(__DIR__ . "/Autoload4.php");
    }

    public static function run12()
    {
         spl_autoload_register();
         $writer = new Writer();
         return $writer;
    }
}

/* listing 05.10 */
/* listing 05.11 */
/* listing 05.12 */
/* listing 05.13 */
namespace main;

/* /listing 05.13 */
/* /listing 05.12 */
/* /listing 05.11 */
/* /listing 05.10 */

/* listing 05.12 */
use popp\ch05\batch04\util;
/* /listing 05.12 */

/* listing 05.13 */
use popp\ch05\batch04\util\Debug;
/* /listing 05.13 */



function mainrun1()
{
/* listing 05.10 */
    popp\ch05\batch04\Debug::helloworld();
/* /listing 05.10 */
}

function mainrun2()
{
/* listing 05.11 */
    \popp\ch05\batch04\Debug::helloworld();
/* /listing 05.11 */
}

function mainrun3()
{
/* listing 05.12 */

    util\Debug::helloWorld();
/* /listing 05.12 */
}

function mainrun4()
{
/* listing 05.13 */

    Debug::helloWorld();
/* /listing 05.13 */
}
