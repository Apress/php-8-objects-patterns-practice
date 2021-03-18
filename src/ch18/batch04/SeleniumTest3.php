<?php

/* listing 18.30 */
namespace popp\ch18\batch04;

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\WebDriverCapabilityType;
use Facebook\WebDriver\WebDriverBy;
use PHPUnit\Framework\TestCase;

class SeleniumTest3 extends TestCase
{

    protected function setUp(): void
    {
        $host = "http://127.0.0.1:4444/wd/hub";
        $capabilities = DesiredCapabilities::chrome();
        $this->driver = RemoteWebDriver::create($host, $capabilities);
    }

    public function testAddVenue(): void
    {
        $this->driver->get("http://popp.vagrant.internal/webwoo/AddVenue.php");
        $venel = $this->driver->findElement(WebDriverBy::name("venue_name"));
        $venel->sendKeys("my_test_venue");

        $venel->submit();

        $tdel = $this->driver->findElement(WebDriverBy::xpath("//td[1]"));
        $this->assertMatchesRegularExpression("/'my_test_venue' added/", $tdel->getText());

        $spacel = $this->driver->findElement(WebDriverBy::name("space_name"));
        $spacel->sendKeys("my_test_space");
        $spacel->submit();

        $el = $this->driver->findElement(WebDriverBy::xpath("//td[1]"));
        $this->assertMatchesRegularExpression("/'my_test_space' added/", $el->getText());
    }
}
