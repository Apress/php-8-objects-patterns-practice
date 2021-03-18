<?php

declare(strict_types=1);

namespace popp\ch09\batch15;

class Runner
{
    public static function run()
    {
        $assembler = new ObjectAssembler("src/ch09/batch15/objects.xml");
        $apptmaker = $assembler->getComponent(AppointmentMaker2::class);
        $out = $apptmaker->makeAppointment();
        print $out;
    }

    public static function run2()
    {
/* listing 09.67 */
        $assembler = new ObjectAssembler("src/ch09/batch15/objects.xml");
        $terrainfactory = $assembler->getComponent(TerrainFactory::class);
        $plains = $terrainfactory->getPlains(); // MarsPlains
/* /listing 09.67 */
    }

    public static function run3()
    {
/* listing 09.71 */
        $assembler = new ObjectAssembler("src/ch09/batch15/objects.xml");
        $apptmaker = $assembler->getComponent(AppointmentMaker::class);
        $output = $apptmaker->makeAppointment();
        print $output;
/* /listing 09.71 */
    }
}
