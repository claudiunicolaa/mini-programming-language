<?php

class TableObject
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var int
     */
    private $code;

    /**
     * TableObject constructor.
     * @param string $type
     * @param int    $code
     */
    public function __construct($type, $code)
    {
        $this->type = $type;
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type)
    {
        $this->type = $type;
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
}