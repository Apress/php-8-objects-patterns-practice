<?php

declare(strict_types=1);

namespace popp\ch24\batch01;

use popp\ch24\batch01\parse\Context;
use popp\ch24\batch01\parse\Scanner;
use popp\ch24\batch01\parse\StringReader;
use popp\ch24\batch01\marklogic\MarkParse;

class Runner
{
    public static function run(): void
    {
        // runner code here

        $questions = [
            "how many beans make five?" => '$input equals "five" or $input equals "5"',
            "give a childs name?" => '$input equals "jake" or $input equals "holly"',
            "life begins at" => '$input equals "forty" or $input equals "40"'
        ];

        $answers = ["five", "jake", "40"];

        foreach ($questions as $prompt => $mark) {
            print "$prompt\n";
            $marker = new MarkLogicMarker($mark);
            $result = false;

            do {
                $line = array_shift($answers);

                //$fh = fopen( 'php://stdin', 'r' );
                //$line = fgets( $fh );
                //$line = trim( $line );

                $question = new TextQuestion($prompt, $marker);

                if ($result = $question->mark($line)) {
                    print "well done!\n";
                } else {
                    print "wrong, try again\n";
                }
            } while (! $result);
        }
    }

    public static function run2(): void
    {
/* listing 24.06 */
        $context = new Context();
        $user_in = "\$input equals '4' or \$input equals 'four'";
        $reader = new StringReader($user_in);
        $scanner = new Scanner($reader, $context);

        while ($scanner->nextToken() != Scanner::EOF) {
            print $scanner->token();
            print "   {$scanner->charNo()}";
            print "   {$scanner->getTypeString()}\n";
        }
/* /listing 24.06 */
    }

    public static function run3(): void
    {
        //$input      = '4';
        //$statement = "( \$input equals '4' or  \$input equals 'four' )";
        $input      = 'armpit';
        $statement = "( \$input equals 'five' or \$input equals 'armpit')";

        $engine = new MarkParse($statement);
        $result = $engine->evaluate($input);
        print "input: $input evaluating: $statement\n";

        if ($result) {
            print "true!\n";
        } else {
            print "false!\n";
        }
    }

    public static function run4(): void
    {
/* listing 24.25 */
        $input      = 'five';
        $statement = "( \$input equals 'five')";
        $engine = new MarkParse($statement);
        $result = $engine->evaluate($input);
        print "input: $input evaluating: $statement\n";

        if ($result) {
            print "true!\n";
        } else {
            print "false!\n";
        }
/* /listing 24.25 */
    }

    public static function run5(): void
    {
        // will cause exception
        $input      = 'five';
        $statement = "( \$input broken equals xxx 'five')";
        $engine = new MarkParse($statement);
        $result = $engine->evaluate($input);
    }
}
