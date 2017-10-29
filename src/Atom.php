<?php

/**
 * Class Atom
 * @author Claudiu Nicola <claudiu.nicolaa@gmail.com>
 */
class Atom
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $code;

    /**
     * @var int
     */
    private $position;

    /**
     * Atom constructor.
     * @param string $name
     * @param int    $code
     * @param int    $position
     */
    public function __construct($name, $code, $position)
    {
        $this->name     = $name;
        $this->code     = $code;
        $this->position = $position;
    }


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @param int $code
     */
    public function setCode(int $code)
    {
        $this->code = $code;
    }

    /**
     * @return int
     */
    public function getPosition(): int
    {
        return $this->position;
    }

    /**
     * @param int $position
     */
    public function setPosition(int $position)
    {
        $this->position = $position;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "Atom{"
            . " name= " . $this->name
            . ", code= " . $this->code
            . ", position=" . $this->position
            . " }";
    }


}
