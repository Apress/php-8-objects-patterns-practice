<?php

declare(strict_types=1);

namespace popp\ch12\batch05;

/* listing 12.17 */
class CliRequest extends Request
{
    public function init(): void
    {
        $args = $_SERVER['argv'];

        foreach ($args as $arg) {
            if (preg_match("/^path:(\S+)/", $arg, $matches)) {
                $this->path = $matches[1];
            } else {
                if (strpos($arg, '=')) {
                    list($key, $val) = explode("=", $arg);
                    $this->setProperty($key, $val);
                }
            }
        }

        $this->path = (empty($this->path)) ? "/" : $this->path;
    }
}
/* /listing 12.17 */
