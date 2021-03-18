<?php

namespace popp\ch18\batch04\woo\controller;

use popp\ch18\batch04\woo\base\ApplicationRegistry;

class Controller
{
    private $applicationHelper;

    private function __construct()
    {
    }

    public static function run()
    {
        $instance = new Controller();
        $instance->init();
        $instance->handleRequest();
    }

    public function init()
    {
        $applicationHelper
            = ApplicationHelper::instance();
        $applicationHelper->init();
    }

/* listing 18.25 */

// Controller

    public function handleRequest()
    {
        $request = ApplicationRegistry::getRequest();
        $app_c = ApplicationRegistry::appController();

        while ($cmd = $app_c->getCommand($request)) {
            $cmd->execute($request);
        }

        $this->invokeView($app_c->getView($request));
    }
/* /listing 18.25 */

    public function invokeView($target)
    {
        include("src/ch18/batch04/woo/view/$target.php");
    }
}
