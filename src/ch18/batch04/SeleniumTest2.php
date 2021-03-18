<?php

/* listing 18.29 */
namespace popp\ch18\batch04;

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\WebDriverCapabilityType;
use PHPUnit\Framework\TestCase;

class SeleniumTest2 extends TestCase
{
    private $driver;

    protected function setUp(): void
    {
        $host = "http://127.0.0.1:4444/wd/hub";
        $capabilities = DesiredCapabilities::chrome();
        $this->driver = RemoteWebDriver::create($host, $capabilities);
    }

    public function testAddVenue(): void
    {
    }
}
