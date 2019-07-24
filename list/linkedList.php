<?php


class LinkedNode {
    public $value;

    public $prev;
    public $next;

    public function __construct($value)
    {
        $this->value = $value;
    }
}

class LinkedList {


    private $size;

    public function __construct($size)
    {
        $this->size = $size;
    }

    public function add(LinkedNode $node)
    {

    }

    public function remove(LinkedNode $node)
    {

    }
}