<?php

require "LinkedList.php";

class HashTable
{
    /**
     * @var int
     */
    private $size;
    /**
     * @var \Node[]
     */
    private $items;

    /**
     * HashTable constructor.
     * @param int $size
     */
    public function __construct(int $size = 10)
    {
        $this->size  = $size;
        $this->items = new SplFixedArray($size);
        for ($i = 0; $i < $this->items->getSize(); $i++) {
            $this->items[$i] = null;
        }
    }

    public function put(TableObject $object): void
    {
        $index = $this->hash($object->getType());
        $items = $this->items[$index];

        if (is_null($items)) {
            $items = new LinkedList();
            $items->insertFirst($object);
            $this->items[$index] = $items;
        } else {
            /**
             * @var \LinkedList $items
             */
            $items->insertFirst($object);
        }
    }

    /**
     * @param string $key
     * @return \TableObject|null
     */
    public function get(string $key): ?TableObject
    {
        $index = $this->hash($key);
        if (is_null($this->items[$index])) {
            return null;
        }

        /**
         * @var \LinkedList $items
         */
        $items = $this->items[$index];

        $items->rewind();
        while ($items->valid()) {
            /**
             * @var \Node $item
             */
            $item = $items->current();
            if($item->getType() === $key) {
                return $item;
            }
            $items->next();
        }

        return null;
    }

    /**
     * Linear probing.
     *
     * @param string $key
     * @return int
     */
    public function hash(string $key): int
    {
        $chars = str_split($key);
        $sum   = 0;
        foreach ($chars as $char) {
            $sum += ord($char);
        }

        return $sum % $this->size;
    }
}
