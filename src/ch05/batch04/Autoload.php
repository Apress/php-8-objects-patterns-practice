<?php

/* listing 05.29 */
$basic = function (string $classname) {
    $file = __DIR__ . "/" . "{$classname}.php";
    if (file_exists($file)) {
        require_once($file);
    }
};

\spl_autoload_register($basic);

$blah = new Blah();
$blah->wave();
