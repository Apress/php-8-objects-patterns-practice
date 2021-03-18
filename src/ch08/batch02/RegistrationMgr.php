<?php

declare(strict_types=1);

namespace popp\ch08\batch02;

/* listing 08.13 */
class RegistrationMgr
{
    public function register(Lesson $lesson): void
    {
        // do something with this Lesson

        // now tell someone
        $notifier = Notifier::getNotifier();
        $notifier->inform("new lesson: cost ({$lesson->cost()})");
    }
}
/* /listing 08.13 */
