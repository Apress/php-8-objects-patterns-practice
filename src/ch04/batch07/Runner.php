<?php

declare(strict_types=1);

namespace popp\ch04\batch07;

class Runner
{
    public static function run()
    {
/* listing 04.61 */
        print_r(User::create());
        print_r(SpreadSheet::create());
/* /listing 04.61 */
    }

    public static function run2()
    {
/* listing 04.56 */
        print_r(Document::create());
/* /listing 04.56 */
    }
}
