<?php

declare(strict_types=1);

namespace popp\ch10\batch07;

class Runner
{
    public static function run()
    {
/* listing 10.37 */
        $process = new AuthenticateRequest(
            new StructureRequest(
                new LogRequest(
                    new MainProcess()
                )
            )
        );
        $process->process(new RequestHelper());
/* /listing 10.37 */
    }
}
