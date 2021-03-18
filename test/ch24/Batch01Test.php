<?php
declare(strict_types=1);

namespace popp\ch24\batch01;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

use popp\ch24\batch01\parse\StringReader;
use popp\ch24\batch01\parse\Scanner;
use popp\ch24\batch01\parse\Context;

use popp\ch24\batch01\parse\NotParse;
use popp\ch24\batch01\parse\SequenceParse;
use popp\ch24\batch01\parse\AlternationParse;
use popp\ch24\batch01\parse\RepetitionParse;
use popp\ch24\batch01\parse\WordParse;
use popp\ch24\batch01\parse\StringLiteralParse;
use popp\ch24\batch01\parse\CharacterParse;



class Batch01Test extends BaseUnit 
{

    protected function setUp(): void { 
        $this->res = dirname(__FILE__).DIRECTORY_SEPARATOR."res";
        $this->sample1 = $this->res.DIRECTORY_SEPARATOR."sample1.txt";
    }     

    public function testRunner()
    {
$testout1 = <<<OUT
how many beans make five?
well done!
give a childs name?
well done!
life begins at
well done!

OUT;

$testout2 = <<<OUT
\$   1   CHAR
input   6   WORD
    7   WHITESPACE
equals   13   WORD
    14   WHITESPACE
'   15   APOS
4   16   WORD
'   17   APOS
    18   WHITESPACE
or   20   WORD
    21   WHITESPACE
\$   22   CHAR
input   27   WORD
    28   WHITESPACE
equals   34   WORD
    35   WHITESPACE
'   36   APOS
four   40   WORD
'   41   APOS

OUT;

$testout3 = <<<OUT
input: armpit evaluating: ( \$input equals 'five' or \$input equals 'armpit')
true!

OUT;

        $val = $this->capture(function() { Runner::run(); });
        //print $val;
        self::assertEquals($val, $testout1);
        
        $val = $this->capture(function() { Runner::run2(); });
        //print $val;
        self::assertEquals($val, $testout2);

        $val = $this->capture(function() { Runner::run3(); });
        //print $val;
        self::assertEquals($val, $testout3);
    }

    private function getScanner( $str ) {
        $context = new Context();
        return new Scanner( new StringReader( $str ), $context );
    }

    public function testWord() {
        $scanner=$this->getScanner( 'tok tok tok tok' );
        $tok = new WordParse('tok');
        $result = $tok->scan( $scanner );
        $context = $scanner->getContext();
        self::AssertEquals( $context->peekResult(), 'tok' );
        self::AssertEquals( $context->resultCount(), 1 );
        self::AssertEquals( $context->popResult(), 'tok' );
        self::AssertTrue( $result );
    }

    public function testNotParse() {
        $scanner=$this->getScanner( '<tok <tok <tok <trick piggle' );
        $not = new NotParse();
        $not->add($this->angleTrick());
        $result = $not->scan( $scanner );
        $context = $scanner->getContext();
        $txt = $context->popResult();
        self::AssertEquals( $txt, "<tok <tok <tok " );
        self::AssertTrue( $result );
   }

    public function testRepetitionFalseTrigger() {

        $scanner=$this->getScanner(  '<tok <tok <tok <trick' );
        $context = $scanner->getContext();
        $container = new SequenceParse();
        $rep = new RepetitionParse( );
        $rep->add( $this->angleTok() );
        $container->add( $rep );
        $container->add( $this->angleTrick() );
        $container->scan( $scanner );
        $context = $scanner->getContext();
        self::AssertEquals( $context->resultCount(), 4  );
        self::AssertEquals( $context->popResult(), "trick" );
        self::AssertEquals( $context->popResult(), "tok" );
        self::AssertEquals( $context->popResult(), "tok" );
        self::AssertEquals( $context->popResult(), "tok" );
        self::AssertEquals( $context->resultCount(), 0  );
        
    }

    public function testRepetition() {
        $scanner=$this->getScanner(  'tok tok tok tok' );
        $manytest = new RepetitionParse();
        $manytest->add( new WordParse('tok') );
        $manytest->scan( $scanner);
        $context = $scanner->getContext();
        self::AssertEquals( $context->peekResult(), 'tok' );
        self::AssertEquals( $context->resultCount(), 4 );
        $testarray = array();
        while ( $x = $context->popResult() ) {
            array_push( $testarray, $x );
        }
        self::AssertEquals( implode("|", $testarray ), 
                            'tok|tok|tok|tok' );
        self::AssertEquals( $context->resultCount(), 0 );
    }

    public function testRepetitionMin() {

        $scanner1=$this->getScanner( '<tok <tok' );
        $scanner2=$this->getScanner( '<tok' );
        $rep = new RepetitionParse( 2 );
        $rep->add( $this->angleTok() );
        $retval1 = $rep->scan( $scanner1 );
        $retval2 = $rep->scan( $scanner2 );

        $context1 = $scanner1->getContext();
        $context2 = $scanner2->getContext();
        $testarray = array();
        /*
        while ( $x = $context1->popResult() ) {
            array_push( $testarray, $x );
        }
        print implode("|", $testarray );
        print "count is ".$context1->resultCount()."\n";
        */
        self::AssertEquals( $context1->resultCount(), 2  );
        self::AssertTrue( $retval1 );
        self::AssertEquals( $context2->resultCount(), 0  );
        self::AssertTrue( ! $retval2 );
    }

    public function testRepetitionMax() {
        $scanner1 = $this->getScanner( '<tok <tok <tok' );
        $scanner2 = $this->getScanner( '<tok <tok <tok <tok <tok' );
                                          
        $rep = new RepetitionParse( 0, 4 );
        $rep->add( $this->angleTok() );
        $retval1 = $rep->scan( $scanner1 );
        $retval2 = $rep->scan( $scanner2 );

        $context1 = $scanner1->getContext();
        $context2 = $scanner2->getContext();
        self::AssertEquals( $context1->resultCount(), 3  );
        self::AssertTrue( $retval1 );
        self::AssertEquals( $context2->resultCount(), 4  );
        self::AssertTrue( $retval2 );
    }


    private function angleTok() {
        $angletest = new SequenceParse();
        $angletest->add( new CharacterParse('<') )->discard();
        $angletest->add( new WordParse('tok') );
        return $angletest;
    }

    private function angleTrick() {
        $trick = new SequenceParse();
        $trick->add( new CharacterParse('<') )->discard();
        $trick->add( new WordParse('trick') );
        return $trick;
    }


    public function testPants() {
        $str = 'pants pants pants';
        $tokenizer = new Scanner( new StringReader($str), new Context() );
        $vals = preg_split("/( )/", $str, -1, \PREG_SPLIT_DELIM_CAPTURE);
        $count=0;
        while ( $tok = $tokenizer->nextToken()
                != Scanner::EOF ) {
            $val = $tokenizer->token();
            self::assertEquals($vals[$count], $val);
            $count++;
        }
    }

/**
 * Test for expected tokens in a sample file
 */
    public function testToken() {
        $str = file_get_contents($this->sample1 );
        self::AssertTrue( is_string( $str ), "should be string" );
        //$tokenizer = new Scanner( $str );
        $tokenizer = new Scanner( new StringReader( $str ), new Context() );
        $tok = $tokenizer->nextToken();  // this
        $val = $tokenizer->token();
        self::AssertEquals( $tok, Scanner::WORD );
        self::AssertEquals( $val, 'this', "got $val" );
        $tok = $tokenizer->nextToken(); // EOL
        self::AssertEquals( $tok, Scanner::EOL );
        $tok = $tokenizer->nextToken(); // is
        $tok = $tokenizer->nextToken(); // SPACE
        self::AssertEquals( $tok, Scanner::WHITESPACE );
        self::AssertEquals( $tokenizer->getTypeString(), "WHITESPACE" );
        $tok = $tokenizer->nextToken(); // a
        $tok = $tokenizer->nextToken(); // SPACE (four)
        $tok = $tokenizer->nextToken(); // SPACE (four)
        $tok = $tokenizer->nextToken(); // SPACE (four)
        $tok = $tokenizer->nextToken(); // SPACE (four)
        $val = $tokenizer->token();
        self::AssertEquals( $tok, Scanner::WHITESPACE );
        self::AssertEquals( $val, " " );
        $tok = $tokenizer->nextToken(); // sample
        $tok = $tokenizer->nextToken(); // EOL
        $tok = $tokenizer->nextToken(); // <
        $val = $tokenizer->token();
        self::AssertEquals( $tok, Scanner::CHAR );
        self::AssertEquals( $val, "<" );
        $count = 0;
        while ( ($tok = $tokenizer->nextToken()) 
                != Scanner::EOF ) {
            // should not go into infinite loop!
            $count++;
            if ( $count > 1000 ) {
                self::AssertTrue( false, 'EOF not encountered' );
            } 
        }
        self::AssertEquals( $tok, Scanner::EOF );
        self::AssertTrue( true );
    }

    public function testRunner4()
    {
        $val = $this->capture(function() { Runner::run4(); });
        $testout1 = <<<TEST
input: five evaluating: ( \$input equals 'five')
true!

TEST;
        //print $val;
        self::assertEquals($val, $testout1);
    }

    public function testRunner5()
    {
        self::expectException("\\Exception");
        Runner::run5();
    }

}
