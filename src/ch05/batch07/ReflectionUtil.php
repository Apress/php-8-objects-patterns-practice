<?php

declare(strict_types=1);

namespace popp\ch05\batch07;

/* listing 05.66 */
class ReflectionUtil
{
    public static function getClassSource(\ReflectionClass $class): string
    {
        $path  = $class->getFileName();
        $lines = @file($path);
        $from  = $class->getStartLine();
        $to    = $class->getEndLine();
        $len   = $to - $from + 1;
        return implode(array_slice($lines, $from - 1, $len));
    }
/* /listing 05.66 */


/* listing 05.71 */

    // class ReflectionUtil
    public static function getMethodSource(\ReflectionMethod $method): string
    {
        $path  = $method->getFileName();
        $lines = @file($path);
        $from  = $method->getStartLine();
        $to    = $method->getEndLine();
        $len   = $to - $from + 1;
        return implode(array_slice($lines, $from - 1, $len));
    }
/* /listing 05.71 */
/* listing 05.66 */
}
/* /listing 05.66 */
