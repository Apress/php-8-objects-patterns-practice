<?php

declare(strict_types=1);

namespace popp\ch09\batch14_1;

use popp\ch09\batch06\ApptEncoder;
use popp\ch09\batch06\BloggsApptEncoder;
use popp\ch09\batch06\MegaApptEncoder;

class Runner
{
    public static function run()
    {
/* listing 09.55 */
        $assembler = new ObjectAssembler("src/ch09/batch14_1/objects.xml");
        $encoder = $assembler->getComponent(ApptEncoder::class);
        $apptmaker = new AppointmentMaker2($encoder);
        $out = $apptmaker->makeAppointment();
        print $out;
/* /listing 09.55 */
    }

    public static function run2()
    {
/* listing 09.56 */
        $assembler = new ObjectAssembler("src/ch09/batch14_1/objects.xml");
        $encoder = $assembler->getComponent(MegaApptEncoder::class);
        $apptmaker = new AppointmentMaker2($encoder);
        $out = $apptmaker->makeAppointment();
        print $out;
/* /listing 09.56 */
    }
}
