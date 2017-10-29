<?php

/**
 * Interface TableObjectContract
 */
interface TableObjectContract
{
    public function getType(): string;

    public function getCode(): int;

    public function setType(string $type);

    public function setCode(int $code);
}
