<?php
namespace hashTable;

class LinkedNode {
    private $prev;
    private $next;
    private $key;
    private $value;
    private $hnext;

    public function __construct($key, $value)
    {
        $this->value = $value;
        $this->key = $key;
    }

    /**
     * @return mixed
     */
    public function getPrev()
    {
        return $this->prev;
    }

    /**
     * @param mixed $prev
     */
    public function setPrev($prev)
    {
        $this->prev = $prev;
    }

    /**
     * @return mixed
     */
    public function getNext()
    {
        return $this->next;
    }

    /**
     * @param mixed $next
     */
    public function setNext($next)
    {
        $this->next = $next;
    }

    /**
     * @return mixed
     */
    public function getHnext()
    {
        return $this->hnext;
    }

    /**
     * @param mixed $hnext
     */
    public function setHnext($hnext)
    {
        $this->hnext = $hnext;
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param mixed $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }
}

