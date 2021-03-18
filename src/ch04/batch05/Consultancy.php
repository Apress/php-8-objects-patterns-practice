<?php

declare(strict_types=1);

namespace popp\ch04\batch05;

/* listing 04.21 */
class Consultancy extends TimedService implements Bookable, Chargeable
{
    // ...
/* /listing 04.21 */
    public function getPrice(): float
    {
        return 5.5;
    }
/* listing 04.21 */
}
/* /listing 04.21 */
