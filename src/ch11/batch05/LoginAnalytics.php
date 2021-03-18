<?php

declare(strict_types=1);

namespace popp\ch11\batch05;

/* listing 11.29 */
class LoginAnalytics implements Observer
{
    public function update(Observable $observable): void
    {
        // not type safe!
        $status = $observable->getStatus();
        print __CLASS__ . ":    doing something with status info\n";
    }
}
