<?php

declare(strict_types=1);

/* listing 18.27 */
namespace popp\ch18\batch04;

use popp\ch18\batch04\woo\base\ApplicationRegistry;
use popp\ch18\batch04\woo\controller\ApplicationHelper;
use PHPUnit\Framework\TestCase;

class AddVenueTest2 extends TestCase
{

    public function testAddVenueVanilla(): void
    {
        $output = $this->runCommand("AddVenue", ["venue_name" => "bob"]);
        self::AssertMatchesRegularExpression("/added/", $output);
    }

    private function runCommand($command = null, array $args = null): string
    {
        $applicationHelper = ApplicationHelper::instance();
        $applicationHelper->init();
        ob_start();
        $request = ApplicationRegistry::getRequest();

        if (! is_null($args)) {
            foreach ($args as $key => $val) {
                $request->setProperty($key, $val);
            }
        }

        if (! is_null($command)) {
            $request->setProperty('cmd', $command);
        }

        woo\controller\Controller::run();
        $ret = ob_get_contents();
        ob_end_clean();

        return $ret;
    }
}
