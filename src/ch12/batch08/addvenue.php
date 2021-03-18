<?php

namespace popp\ch12\batch08;

require_once(__DIR__ . "/../../../vendor/autoload.php");

/* listing 12.37 */
$addvenue = new AddVenueController();
$addvenue->init();
$addvenue->process();
/* /listing 12.37 */
