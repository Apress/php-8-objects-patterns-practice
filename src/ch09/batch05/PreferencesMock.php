<?php

declare(strict_types=1);

namespace popp\ch09\batch05;

class PreferencesMock extends Preferences
{
    public function getDsn(): string
    {
        return "** test DSN\n";
    }
}
