<?php

require __DIR__ . '/../sort/quickSort.php';
//求一组动态数据集合的最大Top K

//获取top3 数据
//$arr = [1,2,6,7,8,9,3,4,5,10];

//1. 基于快排
//arr1($arr, 3);

function arr1($arr, $k) {

    $len = count($arr);
    $len = $len - 1;
    quickSort($arr, 0, $len);

    for ($i = $len; $i > $len-$k; $i--) {
        echo  $arr[$i];
    }
}


require __DIR__ . '/../heap/Heap.php';
//基于最大堆
$arr = [4,3, 2, 5, 6, 7, 9];

arr2($arr, 3);
function arr2($arr, $k) {
    $heapFactory = new  HeapFactory();
    $heapFactory->staticBuildBigHeap($arr);

    for($i = 0; $i < $k; $i++) {
        echo $arr[0];
        unset($arr[0]);
        $arr = array_values($arr);
        $heapFactory->staticBuildBigHeap($arr);
    }

}





