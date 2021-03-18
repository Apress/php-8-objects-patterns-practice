<?php

declare(strict_types=1);

/* listing 15.01 */
namespace popp\ch15\batch01;

require_once(__DIR__ . "/../../../vendor/autoload.php");

$tree = new Tree();
print "loaded " . get_class($tree) . "\n";
/* /listing 15.01 */
