<?php

$cmd = "default";

if (isset($_REQUEST['cmd'])) {
    $cmd = $_REQUEST['cmd'];
}

if ($cmd == "AddVenue") {
    require("AddVenue.php");
} elseif ($cmd == "AddSpace") {
    require("AddSpace.php");
} else {
    require("Main.php");
}
