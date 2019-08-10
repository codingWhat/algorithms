<?php
namespace Heap;

//建堆
//1.静态数据的建堆
//2.动态数据的建堆
//实现一个小顶堆、大顶

class Heap implements HeapInterface {

    public function staticBuildSmallHeap(&$arr)
    {
        if (!is_array($arr) || empty($arr))  return [];

        $len = count($arr);

        //只需对非叶子节点进行堆化即可
        $father = (int) ($len/2);
        for ($i = $father; $i >= 0; $i-- ) {
            $this->smallHeap($arr, $i);
        }
    }

    public function staticBuildBigHeap(&$arr)
    {
        if (!is_array($arr) || empty($arr))  return [];

        $len = count($arr);

        //只需对非叶子节点进行堆化即可
        $father = (int) ($len/2);
        for ($i = $father; $i >= 0; $i-- ) {
            $this->bigHeap($arr, $i);
        }
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

    //动态构建小顶堆
    public function dynamicBuildSmallHeap(&$items, $item)
    {
        if (empty($item)) return false;

        $items[] = $item;
        $index = count($items) - 1;
        while (($index / 2) > 0 && $items[$index]  < ($items[$index /2])) {
            $tmp = $items[$index];
            $items[$index] = $items[$index /2];
            $items[$index /2] = $tmp;
            $index = $index / 2;
        }

        return true;
    }

    public function dynamicBuildBigHeap(&$items, $vertex)
    {
        if (empty($item)) return false;

        $items[] = $item;
        $index = count($items) - 1;
        while (($index / 2) > 0 && $items[$index]  > ($items[$index /2])) {
            $tmp = $items[$index];
            $items[$index] = $items[$index /2];
            $items[$index /2] = $tmp;
            $index = $index / 2;
        }

        return true;
    }
}


/*class HeapFactory {



    public function staticBuildSmallHeap(&$arr)
    {
        if (!is_array($arr) || empty($arr))  return [];

        $len = count($arr);

        //只需对非叶子节点进行堆化即可
        $father = (int) ($len/2);
        for ($i = $father; $i >= 0; $i-- ) {
            $this->smallHeap($arr, $i);
//            $this->bigHeap($arr, $i);
        }
    }

    public function staticBuildBigHeap(&$arr)
    {
        if (!is_array($arr) || empty($arr))  return [];

        $len = count($arr);

        //只需对非叶子节点进行堆化即可
        $father = (int) ($len/2);
        for ($i = $father; $i >= 0; $i-- ) {
            $this->bigHeap($arr, $i);
        }
    }

    private function smallHeap(&$arr, $index)
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

    private function bigHeap(&$arr, $index)
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

    //动态构建小顶堆
    public function dynamicBuildSmallHeap(&$items, $item)
    {
        if (empty($item)) return false;

        $items[] = $item;
        $index = count($items) - 1;
        while (($index / 2) > 0 && $items[$index]  < ($items[$index /2])) {
            $tmp = $items[$index];
            $items[$index] = $items[$index /2];
            $items[$index /2] = $tmp;
            $index = $index / 2;
        }

        return true;
    }


}*/




