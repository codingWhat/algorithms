<?php

require __DIR__ . '/../heap/heap.php';


class  HeapSort
{

    /**
     * @var array
     */
    private $items;
    /**
     * @var HeapFactory
     */
    private $heapFactory;

    public function __construct(array $items)
    {
        $this->items = $items;
        $this->heapFactory = new HeapFactory();
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

$arr = [7, 3, 1, 4, 5];
$heapSortApi = new HeapSort($arr);

var_dump($heapSortApi->doIt());


