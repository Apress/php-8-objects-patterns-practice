<?php

declare(strict_types=1);

namespace popp\ch12\batch05;

/* listing 12.14 */
abstract class Command
{
    final public function __construct()
    {
    }

    public function execute(Request $request): void
    {
        $this->doExecute($request);
    }

    abstract protected function doExecute(Request $request): void;
}
/* /listing 12.14 */
