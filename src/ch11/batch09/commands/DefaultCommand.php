<?php

declare(strict_types=1);

namespace popp\ch11\batch09\commands;

use popp\ch11\batch09\CommandContext;
use popp\ch11\batch09\Command;

class DefaultCommand extends Command
{

    public function execute(CommandContext $context): bool
    {
        // default command
        return true;
    }
}
