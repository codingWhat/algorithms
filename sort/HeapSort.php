<?php

namespace sort;

use Heap\HeapFactory;

require dirname(__DIR__) . '/autoload.php';



class HeapSort
{

    /**
     * @var array
     */
    private $items;
    /**
     * @var \heap\Heap $heapFactory
     */
    private $heapFactory;

    public function __construct(array $items)
    {
        $this->items = $items;
        $this->heapFactory = HeapFactory::make();
        $this->heapFactory->staticBuildSmallHeap($this->items);
    }

    public function doIt()
    {
        $count = count($this->items);
        if (empty($count))  return $this->items;

        $res = [];
        for ($i = 0; $i < $count; $i++) {
            $item = array_shift($this->items);
            $this->heapFactory->staticBuildSmallHeap($this->items);
            array_push($res, $item);
        }

        return $res;
    }
}



