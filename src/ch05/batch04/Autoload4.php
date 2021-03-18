<?php

/* listing 05.35 */
$underscores = function (string $classname) {
    $path = str_replace('_', DIRECTORY_SEPARATOR, $classname);
    $path = __DIR__ . "/$path";
    if (\stream_resolve_include_path("{$path}.php") !== false) {
        require_once("{$path}.php");
    }
};

$namespaces = function (string $path) {
    if (preg_match('/\\\\/', $path)) {
        $path = str_replace('\\', DIRECTORY_SEPARATOR, $path);
    }
    if (\stream_resolve_include_path("{$path}.php") !== false) {
        require_once("{$path}.php");
    }
};

\spl_autoload_register($namespaces);
\spl_autoload_register($underscores);

$blah = new util_Blah();
$blah->wave();

$obj = new util\LocalPath();
$obj->wave();
/* /listing 05.35 */
