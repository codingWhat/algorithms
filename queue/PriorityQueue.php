<?php


require  __DIR__ . '/../heap/heap.php';


class PriorityQueue {

    private $size;

    /**
     * @var array
     */
    private $items;
    /**
     * @var HeapFactory
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
        $this->heapFactory = new HeapFactory();
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


$queue = new PriorityQueue(4);

$queue->add(10);
$queue->add(6);
$queue->add(12);
$queue->add(4);

for ($i = 0; $i < 4; $i++) {
   echo  $queue->poll();
}