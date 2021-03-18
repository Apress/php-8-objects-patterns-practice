<?php

declare(strict_types=1);

namespace popp\ch09\batch04;

/* listing 09.13 */
/* listing 09.12 */
class Preferences
{
    private array $props = [];
/* /listing 09.12 */
    private static Preferences $instance;
/* listing 09.12 */

    private function __construct()
    {
    }

/* /listing 09.12 */
    public static function getInstance(): Preferences
    {
        if (empty(self::$instance)) {
            self::$instance = new Preferences();
        }
        return self::$instance;
    }

/* listing 09.12 */
    public function setProperty(string $key, string $val): void
    {
        $this->props[$key] = $val;
    }

    public function getProperty(string $key): string
    {
        return $this->props[$key];
    }
}
