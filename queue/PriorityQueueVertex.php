<?php
namespace queue;

use Heap\HeapFactory;
use heap\HeapVertex;

class PriorityQueueVertex {

    private $size;

    /**
     * @var array
     */
    private $items;
    /**
     * @var HeapVertex
     */
    private $heapFactory;

    /** @var int */
    private $count;

    /**
     * PriorityQueue constructor.
     * @param $size
     */
    public function __construct($size)
    {
        $this->size = $size;
        $this->items = [];
        $this->heapFactory = HeapFactory::make("vertex");
    }

    //默认获取小顶堆中的最小元素，重新构建小顶堆
    public function poll()
    {
        if ($this->count <= 0)  return false;

        $popItem = array_shift($this->items);

        if (!empty($this->items)) {
            $this->heapFactory->staticBuildSmallHeap($this->items);
        }

        return $popItem;
    }


    public function add($item)
    {
        if ($this->count > $this->size) return false;

         $this->heapFactory->dynamicBuildSmallHeap($this->items, $item);

         $this->count++;

         return true;
    }
}