<?php

declare(strict_types=1);

namespace popp\ch09\batch09;

class MegaCommsManager extends CommsManager
{
    public function getHeaderText(): string
    {
        return "MegaCal header\n";
    }

    public function getApptEncoder(): ApptEncoder
    {
        return new MegaApptEncoder();
    }

    public function getTtdEncoder(): TtdEncoder
    {
        return new MegaTtdEncoder();
    }

    public function getContactEncoder(): ContactEncoder
    {
        return new MegaContactEncoder();
    }

    public function getFooterText(): string
    {
        return "MegaCal footer\n";
    }
}
