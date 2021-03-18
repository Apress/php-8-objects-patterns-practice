<?php

declare(strict_types=1);

namespace popp\ch04\batch24;

class Runner
{
    public static function run()
    {

/* listing 04.125 */
        $person = new Person();
        $person->output(
            new class implements PersonWriter {
                public function write(Person $person): void
                {
                    print $person->getName() . " " . $person->getAge() . "\n";
                }
            }
        );
/* /listing 04.125 */
    }

    public static function run2()
    {

/* listing 04.126 */
        $person = new Person();
        $person->output(
            new class ("/tmp/persondump") implements PersonWriter {
                private $path;

                public function __construct(string $path)
                {
                    $this->path = $path;
                }

                public function write(Person $person): void
                {
                    file_put_contents($this->path, $person->getName() . " " . $person->getAge() . "\n");
                }
            }
        );
/* /listing 04.126 */
    }
}
// done
