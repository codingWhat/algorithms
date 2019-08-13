<?php

namespace queue;

use Heap\Heap;
use Heap\HeapFactory;

require __DIR__ . '/../heap/Heap.php';


class PriorityQueue {

    private $size;

    /**
     * @var array
     */
    private $items;

    /**
     * @var Heap
     */
    private $heapFactory;

    /**
     * PriorityQueue constructor.
     * @param $size
     */
    public function __construct($size)
    {
        $this->size = $size;
        $this->items = [];

        $this->heapFactory = HeapFactory::make();
    }

    //默认获取小顶堆中的最小元素，重新构建小顶堆
    public function poll()
    {
        if (empty($this->items))  return false;

        $popItem = array_shift($this->items);

        if (!empty($this->items)) {
            $this->heapFactory->staticBuildSmallHeap($this->items);
        }

        return $popItem;
    }


    public function add($item)
    {
        if (count($this->items) > $this->size) return false;

       return $this->heapFactory->dynamicBuildSmallHeap($this->items, $item);
    }
}


