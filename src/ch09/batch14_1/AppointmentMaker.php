<?php

declare(strict_types=1);

namespace popp\ch09\batch14_1;

use popp\ch09\batch06\BloggsApptEncoder;

class AppointmentMaker
{
    public function makeAppointment(): string
    {
        $encoder = new BloggsApptEncoder();
        return $encoder->encode();
    }
}
