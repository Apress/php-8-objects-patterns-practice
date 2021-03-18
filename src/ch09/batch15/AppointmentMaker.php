<?php

declare(strict_types=1);

namespace popp\ch09\batch15;

use popp\ch09\batch06\ApptEncoder;

/* listing 09.68 */
class AppointmentMaker
{
    private ApptEncoder $encoder;

    #[Inject(ApptEncoder::class)]
    public function setApptEncoder(ApptEncoder $encoder)
    {
        $this->encoder = $encoder;
    }

    public function makeAppointment(): string
    {
        return $this->encoder->encode();
    }
}
