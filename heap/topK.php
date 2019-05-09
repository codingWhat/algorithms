<?php
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

function quickSort(&$arr, $low, $high) {
    if ($low >= $high) return;

    $pivot = partition($arr, $low, $high);
    quickSort($arr, $low, $pivot - 1);
    quickSort($arr, $pivot + 1, $high);
}

function partition(&$arr, $low, $high) {

    $left = $low;
    $right = $high - 1;
    $pivot = $arr[$high];

    while (true) {
        while ($arr[$left] < $pivot) $left++;

        if ($left == $high) return $left;

        while ($arr[$right] > $pivot) $right--;

        if ($left < $right) {
            $tmp = $arr[$left];
            $arr[$left] = $arr[$right];
            $arr[$right] = $tmp;
            //1465
        }else {
            $tmp = $arr[$left];
            $arr[$left] = $pivot;
            $arr[$high] = $tmp;
            return $left;
        }
    }
}

//基于最大堆
$arr = [ 1=>4,3, 2, 5, 6, 7, 9];
arr2($arr, 3);
function arr2($arr, $k) {
    BigHeap($arr);

    for($i = 1; $i < $k+1; $i++) {
        echo $arr[$i];
    }

}

function BigHeap(&$arr) {
    $n = count($arr);
    for ($i = $n / 2; $i >= 1; $i--) {
        heapy($arr, $i);
    }
    var_dump($arr);
}

function heapy(&$arr, $i) {
    while (true) {
        $max = $i;
        if (isset($arr[2*$i]) && $arr[$i] < $arr[2*$i]) {
            $max = 2*$i;
        }

        if (isset($arr[2*$i + 1]) && $max < $arr[2*$i + 1]) {
            $max = 2*$i;
        }
        if ($max != $i) {
            $tmp = $arr[$i];
            $arr[$i] = $arr[$max];
            $arr[$max] = $tmp;
            $i = $max;
        }else {
            break;
        }



    }

}



