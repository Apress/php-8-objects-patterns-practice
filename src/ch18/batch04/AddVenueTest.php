<?php

declare(strict_types=1);

/* listing 18.26 */
namespace popp\ch18\batch04;

use popp\ch18\batch04\woo\base\ApplicationRegistry;
use popp\ch18\batch04\woo\controller\ApplicationHelper;
use PHPUnit\Framework\TestCase;

class AddVenueTest extends TestCase
{
    public function testAddVenueVanilla(): void
    {
/* /listing 18.26 */
        ob_start();
/* listing 18.26 */
        $this->runCommand("AddVenue", ["venue_name" => "bob"]);
/* /listing 18.26 */
        $output = ob_get_contents();
        ob_end_clean();
        $this->assertMatchesRegularExpression("/Add a Space/", $output);
/* listing 18.26 */
    }

    private function runCommand($command = null, array $args = null): void
    {
        $reg = ApplicationRegistry::instance();
        $applicationHelper = ApplicationHelper::instance();
        $applicationHelper->init();
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
    }
}
