<?php
declare(strict_types=1);

namespace popp\ch12\batch07;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch07Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        $test = <<<TEST
<html>
<head>
<title>Venues</title>
</head>
<body>
<h1>Venues</h1>

    Likey Lounge<br />
    Happy House<br />

</body>
</html>

TEST;
        self::assertEquals($test, $val);
        //print $val;
        
    }
}


