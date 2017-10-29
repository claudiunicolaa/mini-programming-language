<?php

/**
 * Class IO
 *
 * @author Claudiu Nicola <claudiu.nicolaa@gmail.com>
 */
class IO
{
    /**
     * @param string $filePath
     * @return array
     */
    public static function read(string $filePath): array
    {
        if (!file_exists($filePath)) {
            throw new RuntimeException("The " + $filePath + "dosen't exists");
        }

        return file($filePath, FILE_IGNORE_NEW_LINES);
    }

    /**
     * @param string $filePath
     * @param array  $data
     */
    public static function write(string $filePath, array $data): void
    {
        file_put_contents($filePath, print_r($data,true));
    }
}
