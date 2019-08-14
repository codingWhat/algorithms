<?php
namespace listx;
//实现单链表，循环链表，双向链表，支持增删操作

class Queue {

    private  $items;

    private $size = 0;

    private $count = 0;

    private $head = 0;

    private $tail = 0;

    public function __construct($size)
    {
        $this->size = $size;
        $this->items = [];

    }

    public function enqueue($item)
    {

        if ((($this->tail + 1) % $this->size) === $this->head) {
            return false;
        }

        $this->items[$this->tail] = $item;
        $this->tail = ($this->tail + 1) % $this->size;
        $this->count++;
        return true;
    }

    public function dequeue()
    {
        // return array_shift($this->items);
        if ((($this->head + 1)  % $this->size) === $this->tail)  {
          //  var_dump($this->head);
            return false;
        }

        $item = $this->items[$this->head];
        $this->head = ($this->head + 1) % $this->size;
        $this->count--;

        return $item;
    }

    public function size()
    {
        return $this->count;
    }

    public function getItems()
    {
        return $this->items;
    }
}



