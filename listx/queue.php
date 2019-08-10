<?php
//实现单链表，循环链表，双向链表，支持增删操作

class Queue {

    private  $items = [];

    private $size = 0;

    private $count = 0;

    private $head = 0;

    private $tail = 0;

    public function __construct($size)
    {
        $this->size = $size;
    }

    public function enqueue($item)
    {
        if ($this->tail == $this->size) {return false;}

        $this->items[$this->tail] = $item;
        $this->tail++;
        $this->count++;
        return $this->tail - 1;
    }

    public function dequeue()
    {
        if ($this->head >= $this->size)  {
            return false;
        }

        $item = $this->items[$this->head];

        $this->head++;
        $this->count--;
        return $item;
    }

    public function size()
    {
        return $this->count;
    }

    public function getItems()
    {
        var_dump($this->head);
        var_dump($this->tail);
        var_dump($this->count);
        return $this->items;
    }
}



