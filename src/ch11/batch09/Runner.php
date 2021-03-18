<?php

declare(strict_types=1);

namespace popp\ch11\batch09;

class Runner
{
    public static function run()
    {
/* listing 11.53 */
        $controller = new Controller();
        $context = $controller->getContext();

        $context->addParam('action', 'login');
        $context->addParam('username', 'bob');
        $context->addParam('pass', 'tiddles');
        $controller->process();

        print $context->getError();
/* /listing 11.53 */
    }

    public static function run2()
    {
        $controller = new Controller();
        $context = $controller->getContext();

        $context->addParam('action', 'feedback');
        $context->addParam('email', 'bob@bob.com');
        $context->addParam('topic', 'my brain');
        $context->addParam('msg', 'all about my brain');
        $controller->process();

        print $context->getError();
    }
}
