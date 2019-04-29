<?php

//实现一个小顶堆、大顶堆、优先级队列

class SmallHeap {

    private $item = [];
    private $count;
    
    public function insert($item)
    {
        $this->count++;
        $this->item[$this->count] = $item;
        $index = $this->count;
        while (($index / 2) > 0 && $this->item[$index]  < ($this->item[$index /2])) {
            $tmp = $this->item[$index];
            $this->item[$index] = $this->item[$index /2];
            $this->item[$index /2] = $tmp;
            $index = $index / 2;
        }
    }



    public function getItem()
    {
        return $this->item;
    }
}

$arr = [6, 9, 13, 8, 15, 21, 1];

$heap = new SmallHeap();

foreach ($arr as $item) {
    $heap->insert($item);
}

var_dump($heap->getItem());
