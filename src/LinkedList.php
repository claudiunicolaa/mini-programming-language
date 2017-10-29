<?php
require "Node.php";

class LinkedList implements Iterator
{
    private $firstNode = null;
    private $current   = null;
    private $position  = 0;
    private $count     = 0;

    /**
     * Insert node at the beginning of the list.
     */
    public function insertFirst($data = null)
    {
        $newNode = new Node($data);
        if ($this->firstNode !== null) {
            $newNode->next = $this->firstNode;
        }
        $this->firstNode = &$newNode;
        $this->count++;

        return true;
    }

    /**
     * Reverse the list.
     */
    public function reverse()
    {
        if ($this->firstNode !== null) {
            if ($this->firstNode->next !== null) {
                $reversed = $temp = null;
                $current  = $this->firstNode;
                while ($current !== null) {
                    $temp          = $current->next;
                    $current->next = $reversed;
                    $reversed      = $current;
                    $current       = $temp;
                }
                $this->firstNode = $reversed;
            }
        }
    }

    /**
     * Get the nth element in the list.
     */
    public function getNthElement($n = 0)
    {
        if ($this->firstNode !== null && $n <= $this->count) {
            $current = $this->firstNode;
            for ($i = 0; $i < $n; $i++) {
                $current = $current->next;
            }

            return $current;
        }

        return false;
    }

    /**
     * Get size of the list
     */
    public function size()
    {
        return $this->count;
    }

    /*
     * Iterator Implementation
     */
    public function rewind()
    {
        $this->position = 0;
        $this->current  = $this->firstNode;
    }

    public function current()
    {
        return $this->current->data;
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        $this->position++;
        $this->current = $this->current->next;
    }

    public function valid()
    {
        return $this->current !== null;
    }
}
