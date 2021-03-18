<?php

declare(strict_types=1);

namespace popp\ch09\batch05;

class PreferencesImpl extends Preferences
{
    public function getDsn(): string
    {
        return "** real DSN\n";
    }
}
