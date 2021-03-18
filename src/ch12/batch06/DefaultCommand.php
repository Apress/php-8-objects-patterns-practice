<?php

declare(strict_types=1);

namespace popp\ch12\batch06;

class DefaultCommand extends Command
{
    protected function doExecute(Request $request): int
    {
        $request->addFeedback("Welcome to WOO");
        return Command::CMD_DEFAULT;
    }
}
