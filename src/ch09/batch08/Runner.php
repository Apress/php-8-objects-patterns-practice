<?php

declare(strict_types=1);

namespace popp\ch09\batch08;

class Runner
{
    public static function run()
    {
/* listing 09.26 */
        $mgr = new BloggsCommsManager();
        print $mgr->getHeaderText();
        print $mgr->getApptEncoder()->encode();
        print $mgr->getFooterText();
/* /listing 09.26 */
    }
}
