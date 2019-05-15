<?php

//建堆
//1.静态数据的建堆
//2.动态数据的建堆

class HeapFactory {

    public function staticBuild($arr)
    {
        if (!is_array($arr) || empty($arr))  return [];

        $len = count($arr);

        //只需对非叶子节点进行堆化即可
        $father = (int) ($len/2);
        for ($i = $father; $i >= 0; $i-- ) {
            $this->smallHeap($arr, $i);
//            $this->bigHeap($arr, $i);
        }

        return $arr;
    }

    public function smallHeap(&$arr, $index)
    {

        while (true) {
            $min = $index;
            $left = 2*$index+1;
            $right = 2*$index+2;

            if (isset($arr[$left]) && $arr[$left] < $arr[$index]) {
                $min = $left;
            }

            if (isset($arr[$right]) && $min && $arr[$right] < $arr[$min]) {
                $min = $right;
            }
            if ($min == $index) break;

            $tmp = $arr[$min];
            $arr[$min] = $arr[$index];
            $arr[$index] = $tmp;

            $index = $min;
        }


    }

    public function bigHeap(&$arr, $index)
    {
        while (true) {
            $max = $index;
            $left = 2*$index+1;
            $right = 2*$index+2;

            if (isset($arr[$left]) && $arr[$left] > $arr[$index]) {
                $max = $left;
            }

            if (isset($arr[$right]) && $max && $arr[$right] > $arr[$max]) {
                $max = $right;
            }
            if ($max == $index) break;

            $tmp = $arr[$max];
            $arr[$max] = $arr[$index];
            $arr[$index] = $tmp;

            $index = $max;
        }

    }


    public function dynamicBuild($item)
    {

    }
}

$factory = new HeapFactory();
$arr = [6, 3, 7, 1, 9];
var_dump($factory->staticBuild($arr));
var_dump($factory->staticBuild($arr));
exit;

//实现一个小顶堆、大顶堆、优先级队列


function smallHeap()  {

}


function bigHeap(){

}

function priorityQueue() {

}

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
