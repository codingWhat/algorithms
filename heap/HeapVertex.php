<?php

namespace heap;

class HeapVertex implements HeapInterface{


    /**
     * @param array $items
     * @param Vertex $vertex
     * @return bool
     */
    public function dynamicBuildSmallHeap(&$items, $vertex)
    {
        if (empty($items)) return false;

        $items[] = $vertex;
        $index = count($items) - 1;
        while (($index / 2) > 0 && $items[$index]->dist < $items[$index/2]->dist) {
            $tmp = $items[$index];
            $items[$index] = $items[$index/2];
            $items[$index/2] = $tmp;
            $index = $index / 2;
        }

        return true;
    }

    public function bigHeap(&$arr, $index)
    {

        while (true) {
            $left = 2 * $index + 1;
            $right = 2 * $index + 2;

            $max = $index;

            if (!isset($arr[$max])) break;

            if (isset($arr[$left]) && $arr[$left]->dist > $max->dist) {
                $max = $left;
            }

            if (isset($arr[$right]) && $arr[$right]->dist > $max) {
                $max = $right;
            }

            if ($index == $max) break;

            $tmp = $arr[$max];
            $arr[$max] = $arr[$index];
            $arr[$index] = $tmp;

            $index = $max;
        }

    }

    public function smallHeap(&$arr, $index)
    {
        while (true) {
            $left = 2 * $index + 1;
            $right = 2 * $index + 2;

            $min = $index;
            if (!isset($arr[$min]))  break;

            if (isset($arr[$left]) && $arr[$left] < $arr[$min]) {
                $min = $left;
            }
            if (isset($arr[$right]) && $arr[$right] < $arr[$min]) {
                $min = $right;
            }

            if ($min == $index) break;

            $tmp = $arr[$index];
            $arr[$index] = $arr[$min];
            $arr[$min] = $tmp;

            $index = $min;

        }

    }

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

        for ($i = ($len /2) -1; $i >= 0; $i--) {
            $this->bigHeap($arr, $i);
        }
    }

    public function dynamicBuildBigHeap(&$items, $vertex)
    {
        if (empty($items)) return false;

        $items[] = $vertex;
        $index = count($items) - 1;
        while (($index / 2) > 0 && $items[$index]->dist > $items[$index/2]->dist) {
            $tmp = $items[$index];
            $items[$index] = $items[$index/2];
            $items[$index/2] = $tmp;
            $index = $index / 2;
        }

        return true;
    }
}
