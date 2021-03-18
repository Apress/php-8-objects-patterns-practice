<?php

declare(strict_types=1);

namespace popp\ch09\batch05;

abstract class Preferences
{
    private array $props = [];
    private static bool $mockmode = false;
    private static ?self $instance = null;

    private function __construct()
    {
    }

    public static function mockmode(bool $which = true): void
    {
        self::$mockmode = $which;
        self::$instance = null;
    }

    public static function getInstance(): self
    {
        if (is_null(self::$instance)) {
            self::$instance = (self::$mockmode) ? new PreferencesMock() : new PreferencesImpl();
        }
        return self::$instance;
    }

    abstract public function getDsn(): string;
    // ...
}
