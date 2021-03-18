<?php

declare(strict_types=1);

namespace popp\ch09\batch14;

use popp\ch09\batch06\BloggsApptEncoder;
use popp\ch09\batch06\ApptEncoder;

/* listing 09.52 */
class AppointmentMaker2
{
    public function __construct(private ApptEncoder $encoder)
    {
    }

    public function makeAppointment(): string
    {
        return $this->encoder->encode();
    }
}
