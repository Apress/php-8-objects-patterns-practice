<?php

declare(strict_types=1);

namespace popp\ch12\batch05;

/* listing 12.18 */
class DefaultCommand extends Command
{
    protected function doExecute(Request $request): void
    {
        $request->addFeedback("Welcome to WOO");
        include(__DIR__ . "/main.php");
    }
}
/* /listing 12.18 */
