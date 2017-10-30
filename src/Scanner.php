<?php

class Scanner
{
    const SYMBOLS = __DIR__ . '/input/symbols';
    const RESERVED_WORDS_ = __DIR__ . '/input/reserved_words';
    const OPERATORS = __DIR__ . '/input/operators';
    const SEPARATORS = __DIR__ . '/input/separators';

    const PIF = __DIR__ . '/output/PIF';
    const ST = __DIR__ . '/output/ST';


    /**
     * @var array
     */
    private $programInternalForm;

    /**
     * @var array
     */
    private $symbolTable;

    /**
     * @var \HashTable
     */
    private $operators;

    /**
     * @var \HashTable
     */
    private $reservedWords;

    /**
     * @var \HashTable
     */
    private $separators;

    /**
     * Scanner constructor.
     */
    public function __construct()
    {
        $this->reservedWords = Loader::populate(IO::read(static::RESERVED_WORDS_));
        $this->operators     = Loader::populate(IO::read(static::OPERATORS));
        $this->separators    = Loader::populate(IO::read(static::SEPARATORS));
    }

    public function analyze(array $source): void
    {
        $index = 0;
        while ($index < count($source)) {
            $line = trim($source[$index]);
            if (!empty($line)) {
                $tokens = explode(" ", $line);
                foreach ($tokens as $token) {
                    if ($code = $this->isOnFirstLevel($token)) {
                        $this->programInternalForm[] = new Atom($token, $code, -1);
                    } elseif (!is_null($code = $this->isOnSecondLevel($token))) {
                        // add in symbol table and pif
                        $position = $this->getSymbolTablePosition($token);
                        if ($position === 0) {
                            $this->symbolTable[] = $token;
                            $position            = $this->getSymbolTablePosition($token);
                        }

                        $this->programInternalForm[] = new Atom($token, $code, $position);

                    } else {
                        echo "lexical error at line " . ($index + 1) . "</br>";
                    }
                }
            }
            $index++;
        }

        $a = 1;
    }

    private function getSymbolTablePosition(string $atom): int
    {
        if (!is_null($this->symbolTable) && $position = array_search($atom, $this->symbolTable)) {
            return $position;
        }

        return 0;
    }

    private function isOnFirstLevel(string $atom): ?int
    {
        if ($code = $this->getOperatorCode($atom)) {
            return $code;
        }
        if ($code = $this->getReservedWordCode($atom)) {
            return $code;
        }
        if ($code = $this->getSeparatorCode($atom)) {
            return $code;
        }

        return null;

    }

    private function isOnSecondLevel(string $atom): ?int
    {
        if ($this->isIdentifier($atom)) {
            return 0;
        } elseif ($this->isConstant($atom)) {
            return 1;
        }

        return null;
    }

    private function getOperatorCode(string $atom): ?int
    {
        return is_null($this->operators->get($atom)) ? null : $this->operators->get($atom)->getCode();
    }

    private function getReservedWordCode(string $atom): ?int
    {
        return is_null($this->reservedWords->get($atom)) ? null : $this->reservedWords->get($atom)->getCode();
    }


    private function getSeparatorCode(string $atom): ?int
    {
        return is_null($this->separators->get($atom)) ? null : $this->separators->get($atom)->getCode();
    }

    private function isIdentifier(string $atom): bool
    {
        $rule = "(\b(([a-z]+_*)|([a-z_]+))\b)";

        return (bool)preg_match($rule, $atom);
    }

    private function isConstant(string $atom): bool
    {
        $rule = "(((\s|^)([+-]?[1-9]+[0-9]*))|((\s|^)([+-]?[0-9]+\.[0-9]+[1-9]))|((?<=\").*(?=\"))|((\s|^)0))";

        return (bool)preg_match($rule, $atom);
    }

    public function write(): void
    {
        IO::write(static::PIF, $this->programInternalForm);
        IO::write(static::ST, $this->symbolTable);
    }
}
