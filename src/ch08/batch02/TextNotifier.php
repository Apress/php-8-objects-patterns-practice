<?php

declare(strict_types=1);

namespace popp\ch08\batch02;

/* listing 08.16 */
class TextNotifier extends Notifier
{
    public function inform($message): void
    {
        print "TEXT notification: {$message}\n";
    }
}
/* /listing 08.16 */
