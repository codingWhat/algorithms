<?php

class Node {

    public $value;
    public $next;

    public function __construct($value)
    {

        $this->value = $value;
    }

    public function setNext($next)
    {
        $this->next = $next;
        return $this;
    }
}


class ListQueue {

    private $size;

    private $head;

    private $tail;
    /**
     * @var int
     */
    private $count;

    public function __construct($size)
    {
        $this->size = $size;
        $this->head = $this->tail = new Node(0);
        $this->count = 0;
    }

    public function enqueue($value)
    {
        var_dump($this->count);
        if ($this->count >= $this->size) return false;

        $newNode = new Node($value);

        if ($this->count == 0) $this->head->next = $newNode;

        $this->tail->next = $newNode;
        $this->tail = $newNode;
        $this->count++;
        return true;
    }

    public function dequeue()
    {
        if ($this->count <= 0) return false;

        $dequeueItem = $this->head->next;
        $this->head->next = $this->head->next->next;

        $this->count--;
        return $dequeueItem;
    }

    public function isFull()
    {
        var_dump( $this->count == $this->size);
    }

    public function printItems()
    {
        $cur = $this->head->next;
        while ($cur) {
            echo $cur->value;
            $cur = $cur->next;
        }
    }
}