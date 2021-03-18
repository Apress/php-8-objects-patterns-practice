<?php

declare(strict_types=1);

namespace popp\ch11\batch09\commands;

use popp\ch11\batch09\CommandContext;
use popp\ch11\batch09\Command;
use popp\ch11\batch09\Registry;

/* listing 11.54 */
class FeedbackCommand extends Command
{
    public function execute(CommandContext $context): bool
    {
        $msgSystem = Registry::getMessageSystem();
        $email = $context->get('email');
        $msg   = $context->get('msg');
        $topic = $context->get('topic');
        $result = $msgSystem->send($email, $msg, $topic);

        if (! $result) {
            $context->setError($msgSystem->getError());
            return false;
        }

        return true;
    }
}
