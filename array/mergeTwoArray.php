<?php
// 合并两个有序数组为一个有序数组
$a = [1, 3, 5, 7];
$b = [2, 4, 6, 8];
var_dump(mergeTwoArr($a, $b));
$a = [1, 2, 3];
$b = [4, 5, 6];
var_dump(mergeTwoArr($a, $b));
$a = [1, 1, 1];
$b = [2, 2, 2];
var_dump(mergeTwoArr($a, $b));
function mergeTwoArr($a, $b) {
    if (!is_array($a) || !is_array($b)) return false;
    $lenA = count($a);
    $lenB = count($b);

    $i=$j=0;
    $res = [];
    while ($i < $lenA && $j < $lenB) {
        if ($a[$i] > $b[$j]) {
            $res[]= $b[$j++];
        }else {
            $res[] = $a[$i++];
        }
    }
    while ($j < $lenB) {
        $res[] = $b[$j++];
    }

    while ($i < $lenA) {
        $res[] = $a[$i++];
    }
    return $res;
}