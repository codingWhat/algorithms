<?php
namespace heap;
//利用优先级队列合并K个有序数组

require dirname(__DIR__) . '/autoload.php';
$arr1 = [1, 3, 4, 7];
$arr2 = [1, 5, 6,8, 9];

//var_dump(mergeTwoSortedArr1($arr1, $arr2));

function mergeTwoSortedArr1($arr1, $arr2) {
    $res = [];
    $len1 = count($arr1);
    $len2 = count($arr2);

    $tmp = [];
    /** @var Heap $heap */
    $heap = HeapFactory::make();

    $i = 0; $j = 0;
    $tmp[] = $arr1[$i];
    $tmp[] = $arr2[$j];
    while ($i < $len1 && $j < $len2) {
        $heap->staticBuildSmallHeap($tmp);

        $minItem = array_shift($tmp);
        if ($minItem == $arr1[$i]) {
            $i++;
            $tmp[] = $arr1[$i];
        }else if ($minItem == $arr2[$j]){
            $j++;
            $tmp[] = $arr2[$j];
        }

        $res[] = $minItem;
        $tmp = array_values($tmp);
    }

    while ($i < $len1) {
        $res[] = $arr1[$i++];
    }

    while ($j < $len2) {
        $res[] = $arr2[$j++];
    }

    return $res;
}

$arr4 = [
  [10, 11, 12],
  [1, 2, 3],
  [3, 6, 7, 9]
];

var_dump(mergeNSortedArray($arr4));
/**
 * @param array ...$arr
 */
function mergeNSortedArray($arr){

    $len = count($arr);

    $lens  = [];
    $indexes = [];
    $tmp = [];
    /** @var Heap $heap */
    $heap = HeapFactory::make();
    for ($i = 0; $i < $len; $i++) {
        $lens[] = count($arr[$i]);
        $var = 'i'. ($i+1);
        $$var = 0;
        $indexes[] = &$$var;
        $tmp[] = $arr[$i][0];
    }

    $res = [];
    while (isMeet($lens, $indexes)) {

        $heap->staticBuildSmallHeap($tmp);

        $minItem = array_shift($tmp);


        for ($j = 0; $j < count($indexes); $j++) {
            if (isset($arr[$j][$indexes[$j]]) && $arr[$j][$indexes[$j]] == $minItem) {
                $indexes[$j]++;
                $tmp[] = $arr[$j][$indexes[$j]];
            }
        }

        if (!is_null($minItem)) {
            $res[] = $minItem;
        }

        $tmp = array_values($tmp);
    }

    return $res;
}


function isMeet($lens, $indexes) {

    $flag = 0;
    for ($i = 0; $i < count($indexes); $i++) {
        if ($indexes[$i] < $lens[$i]) continue;

        ++$flag;
        if ($flag == count($lens)) {
            return false;
        }
    }

    return true;
}
