<?php

require "TableObject.php";

final class Loader
{
    public static function populate(array $data): HashTable
    {
        /**
         * @var \HashTable $result
         */
        $result = new HashTable();
        foreach ($data as $item) {
            $tokens = explode(" ", $item);
            $object = new TableObject($tokens[0], $tokens[1]);
            $result->put($object);
        }

        return $result;
    }
}