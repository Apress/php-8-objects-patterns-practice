<?php

declare(strict_types=1);

namespace popp\ch12\batch04;

class Registry
{
    private static ?Registry $instance = null;
    private ?Request $request = null;
/* listing 12.06 */

    // class Registry

    private ?TreeBuilder $treeBuilder = null;
    private ?Conf $conf = null;

    // ...

/* /listing 12.06 */
/* listing 12.07 */

    // class Registry

    private static $testmode = false;

    // ...
/* /listing 12.07 */
    private function __construct()
    {
    }

/* listing 12.07 */

    public static function testMode(bool $mode = true): void
    {
        self::$instance = null;
        self::$testmode = $mode;
    }

    public static function instance(): self
    {
        if (is_null(self::$instance)) {
            if (self::$testmode) {
                self::$instance = new MockRegistry();
            } else {
                self::$instance = new self();
            }
        }

        return self::$instance;
    }
/* /listing 12.07 */

    public function getRequest(): Request
    {
        if (is_null($this->request)) {
            $this->request = new Request();
        }

        return $this->request;
    }

/* listing 12.06 */
    public function treeBuilder(): TreeBuilder
    {
        if (is_null($this->treeBuilder)) {
            $this->treeBuilder = new TreeBuilder($this->conf()->get('treedir'));
        }

        return $this->treeBuilder;
    }

    public function conf(): Conf
    {
        if (is_null($this->conf)) {
            $this->conf = new Conf();
        }

        return $this->conf;
    }
/* /listing 12.06 */
}
