<?php

declare(strict_types=1);

namespace popp\ch24\batch01\parse;

/* listing 24.01 */
class Scanner
{
    // token types
    public const WORD         = 1;
    public const QUOTE        = 2;
    public const APOS         = 3;
    public const WHITESPACE   = 6;
    public const EOL          = 8;
    public const CHAR         = 9;
    public const EOF          = 0;
    public const SOF          = -1;

    protected int $line_no    = 1;
    protected int $char_no    = 0;
    protected ?string $token  = null;
    protected int $token_type     = -1;

    // Reader provides access to the raw character data. Context stores
    // result data
    public function __construct(private Reader $r, private Context $context)
    {
    }

    public function getContext(): Context
    {
        return $this->context;
    }

    // read through all whitespace characters
    public function eatWhiteSpace(): int
    {
        $ret = 0;

        if (
            $this->token_type != self::WHITESPACE &&
            $this->token_type != self::EOL
        ) {
            return $ret;
        }

        while (
            $this->nextToken() == self::WHITESPACE ||
            $this->token_type == self::EOL
        ) {
            $ret++;
        }

        return $ret;
    }

    // get a string representation of a token
    // either the current token, or that represented
    // by the $int arg
    public function getTypeString(int $int = -1): ?string
    {
        if ($int < 0) {
            $int = $this->tokenType();
        }

        if ($int < 0) {
            return null;
        }

        $resolve = [
            self::WORD =>       'WORD',
            self::QUOTE =>      'QUOTE',
            self::APOS =>       'APOS',
            self::WHITESPACE => 'WHITESPACE',
            self::EOL =>        'EOL',
            self::CHAR =>       'CHAR',
            self::EOF =>        'EOF'
        ];

        return $resolve[$int];
    }

    // the current token type (represented by an integer)
    public function tokenType(): int
    {
        return $this->token_type;
    }

    // get the contents of the current token
    public function token(): ?string
    {
        return $this->token;
    }

    // return true if the current token is a word
    public function isWord(): bool
    {
        return ($this->token_type == self::WORD);
    }

    // return true if the current token is a quote character
    public function isQuote(): bool
    {
        return ($this->token_type == self::APOS || $this->token_type == self::QUOTE);
    }

    // current line number in source
    public function lineNo(): int
    {
        return $this->line_no;
    }

    // current character number in source
    public function charNo(): int
    {
        return $this->char_no;
    }

    // clone this object
    public function __clone(): void
    {
        $this->r = clone($this->r);
    }

    // move on to the next token in the source. Set the current
    // token and track the line and character numbers
    public function nextToken(): int
    {
        $this->token = null;
        $type = -1;

        while (! is_bool($char = $this->getChar())) {
            if ($this->isEolChar($char)) {
                $this->token = $this->manageEolChars($char);
                $this->line_no++;
                $this->char_no = 0;

                return ($this->token_type = self::EOL);
            } elseif ($this->isWordChar($char)) {
                $this->token = $this->eatWordChars($char);
                $type = self::WORD;
            } elseif ($this->isSpaceChar($char)) {
                $this->token = $char;
                $type = self::WHITESPACE;
            } elseif ($char == "'") {
                $this->token = $char;
                $type = self::APOS;
            } elseif ($char == '"') {
                $this->token = $char;
                $type = self::QUOTE;
            } else {
                $type = self::CHAR;
                $this->token = $char;
            }

            $this->char_no += strlen($this->token());

            return ($this->token_type = $type);
        }

        return ($this->token_type = self::EOF);
    }

    // return an array of token type and token content for the NEXT token
    public function peekToken(): array
    {
        $state = $this->getState();
        $type = $this->nextToken();
        $token = $this->token();
        $this->setState($state);

        return [$type, $token];
    }

    // get a ScannerState object that stores the parser's current
    // position in the source, and data about the current token
    public function getState(): ScannerState
    {
        $state = new ScannerState();
        $state->line_no      = $this->line_no;
        $state->char_no      = $this->char_no;
        $state->token        = $this->token;
        $state->token_type   = $this->token_type;
        $state->r            = clone($this->r);
        $state->context      = clone($this->context);

        return $state;
    }

    // use a ScannerState object to restore the scanner's
    // state
    public function setState(ScannerState $state): void
    {
        $this->line_no      = $state->line_no;
        $this->char_no      = $state->char_no;
        $this->token        = $state->token;
        $this->token_type   = $state->token_type;
        $this->r            = $state->r;
        $this->context      = $state->context;
    }

    // get the next character from source
    // returns boolean when none left
    private function getChar(): string|bool
    {
        return $this->r->getChar();
    }

    // get all characters until they stop being
    // word characters
    private function eatWordChars(string $char): string
    {
        $val = $char;

        while ($this->isWordChar($char = $this->getChar())) {
            $val .= $char;
        }

        if ($char) {
            $this->pushBackChar();
        }

        return $val;
    }

    // move back one character in source
    private function pushBackChar(): void
    {
        $this->r->pushBackChar();
    }

    // argument is a word character
    private function isWordChar($char): bool
    {
        if (is_bool($char)) {
            return false;
        }

        return (preg_match("/[A-Za-z0-9_\-]/", $char) === 1);
    }

    // argument is a space character
    private function isSpaceChar($char): bool
    {
        return (preg_match("/\t| /", $char) === 1);
    }

    // argument is an end of line character
    private function isEolChar($char): bool
    {
        $check = preg_match("/\n|\r/", $char);

        return ($check === 1);
    }

    // swallow either \n, \r or \r\n
    private function manageEolChars(string $char): string
    {
        if ($char == "\r") {
            $next_char = $this->getChar();

            if ($next_char == "\n") {
                return "{$char}{$next_char}";
            } else {
                $this->pushBackChar();
            }
        }

        return $char;
    }

    public function getPos(): int
    {
        return $this->r->getPos();
    }
}
/* /listing 24.01 */
