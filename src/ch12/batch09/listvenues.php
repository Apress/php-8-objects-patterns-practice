<?php

namespace popp\ch12\batch09;

require_once(__DIR__ . "/../../../vendor/autoload.php");

$addvenue = new ListVenuesController();
$addvenue->init();
$addvenue->process();
