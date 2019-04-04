<?php

/*****************说明**********************/




main();
function main() {
    $arr = [5,4,3,2, 1];
    quickSort($arr,0, count($arr)-1);
    var_dump($arr);
    $arr = [1,2,3,4,5];
    quickSort($arr,0, count($arr)-1);
    var_dump($arr);
    $arr = [2,43,13,22, 41];
    quickSort($arr,0, count($arr)-1);
    var_dump($arr);
}


function quickSort(&$arr, $start, $end) {
    if ($start >= $end) return;
    $pivot = partition($arr, $start, $end);

    quickSort($arr, $start, $pivot-1);
    quickSort($arr, $pivot+1, $end);
}

function partition(&$arr, $start, $end) {

    $left = $start;
    $right = $end-1;
    $pivot = $arr[$end];
    while(true) {
        while ($arr[$left] < $pivot) $left++;

        if ($left == $end) {
            return $left;
        }

        while ($arr[$right] > $pivot) $right--;

        if ($left < $right) {
            $tmp = $arr[$right];
            $arr[$right] = $arr[$left];
            $arr[$left] = $tmp;
            continue;
        }else {
            $tmp = $arr[$left];
            $arr[$left] = $pivot;
            $arr[$end] = $tmp;
            return $left;
        }
    }

}