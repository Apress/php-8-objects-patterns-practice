<?php

declare(strict_types=1);

namespace popp\ch09\batch10;

class BloggsApptEncoder extends ApptEncoder
{
    public function encode(): string
    {
        return "Appointment data encoded in BloggsCal format\n";
    }
}
