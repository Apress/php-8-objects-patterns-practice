<?php

namespace popp\ch11\batch02;

class Runner
{
    public static function run()
    {
/* listing 11.21 */
        $markers = [
            new RegexpMarker("/f.ve/"),
            new MatchMarker("five"),
            new MarkLogicMarker('$input equals "five"')
        ];

        foreach ($markers as $marker) {
            print get_class($marker) . "\n";
            $question = new TextQuestion("how many beans make five", $marker);

            foreach ([ "five", "four" ] as $response) {
                print "    response: $response: ";
                if ($question->mark($response)) {
                    print "well done\n";
                } else {
                    print "never mind\n";
                }
            }
        }
/* /listing 11.21 */
    }
}
