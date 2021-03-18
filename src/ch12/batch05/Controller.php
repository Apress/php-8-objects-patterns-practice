<?php

declare(strict_types=1);

namespace popp\ch12\batch05;

/* listing 12.09 */
class Controller
{
    private Registry $reg;

    private function __construct()
    {
        $this->reg = Registry::instance();
    }

    public static function run(): void
    {
        $instance = new self();
        $instance->init();
        $instance->handleRequest();
    }

    private function init(): void
    {
        $this->reg->getApplicationHelper()->init();
    }

    private function handleRequest(): void
    {
        $request = $this->reg->getRequest();
        $resolver = new CommandResolver();
        $cmd = $resolver->getCommand($request);
        $cmd->execute($request);
    }
}
/* /listing 12.09 */
