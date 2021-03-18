<?php

declare(strict_types=1);

namespace popp\ch09\batch13;

use popp\ch09\batch09\CommsManager;
use popp\ch09\batch09\MegaCommsManager;
use popp\ch09\batch09\BloggsCommsManager;

/* listing 09.49 */
class AppConfig
{
    private static ?AppConfig $instance = null;
    private CommsManager $commsManager;

    private function __construct()
    {
        // will run once only
        $this->init();
    }

    private function init(): void
    {
        switch (Settings::$COMMSTYPE) {
            case 'Mega':
                $this->commsManager = new MegaCommsManager();
                break;
            default:
                $this->commsManager = new BloggsCommsManager();
        }
    }

    public static function getInstance(): AppConfig
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getCommsManager(): CommsManager
    {
        return $this->commsManager;
    }
}
