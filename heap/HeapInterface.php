<?php
namespace heap;

interface HeapInterface {

    public function bigHeap(&$arr, $index);

    public function smallHeap(&$arr, $index);

    public function staticBuildSmallHeap(&$arr);

    public function staticBuildBigHeap(&$arr);

    public function dynamicBuildSmallHeap(&$items, $item);

    public function dynamicBuildBigHeap(&$items, $vertex);
}