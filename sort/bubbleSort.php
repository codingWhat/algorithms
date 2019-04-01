<?php
/***********************概念介绍***********************************/
/**
 *有序度：数组中具有有序对元素的个数
 * 比如[2,4,3,1,5,6]这组数据的有序度就是11，
 * 分别是[2,4][2,3][2,5][2,6][4,5][4,6][3,5][3,6][1,5][1,6][5,6]。同理，
 * 对于一个倒序数组，比如[6,5,4,3,2,1]，有序度是0；
 * 对于一个完全有序的数组，比如[1,2,3,4,5,6]，有序度为n*(n-1)/2，也就是15
 * ，完全有序的情况称为满有序度
 */
//冒泡排序
//最好时间复杂度:O(n)
//最坏时间复杂度:O(n^2)
//平均时间复杂度:O(n^2)
//稳定排序算法,
$arr = [1, 2, 3, 4, 5];
var_dump(bubbleSort($arr));
$arr = [5, 4, 3, 2, 1];
var_dump(bubbleSort($arr));
$arr = [1, 4, 6, 5, 1];
var_dump(bubbleSort($arr));
function bubbleSort($arr) {
    if (!is_array($arr)) {
        return false;
    }
    $len = count($arr);
    if (empty($arr) || $len <= 1) {
        return [];
    }
    $flag = false;
    for ($i = 0; $i < $len; $i++) {
        for ($j = 0; $j < $len -$i- 1; $j++) {
            if ($arr[$j] > $arr[$j+1]) {
                $tmp = $arr[$j];
                $arr[$j] = $arr[$j+1];
                $arr[$j + 1] = $tmp;
                $flag = true;
            }
        }
        if ($flag == false) {
            break;
        }
    }
    return $arr;
}