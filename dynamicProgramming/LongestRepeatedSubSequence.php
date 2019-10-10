<?php
//最长的重复的子序列

$str = "ATACTCGGA";
$len = strlen($str);
echo getLRSLength($str, $len, $len);
function getLRSLength($str, $len1, $len2) {

    if ($len1 == 0 || $len2 == 0) return 0;

    if ($str[$len1 - 1] == $str[$len2-1] && $len1 != $len2) {
       return  getLRSLength($str, $len1 - 1, $len2 - 1) + 1;
    }

    return max(
        getLRSLength($str, $len1, $len2 - 1),
        getLRSLength($str, $len1 - 1, $len2)
    );

}
echo PHP_EOL;


echo mainPrintLSR($str, $len, $len);

function mainPrintLSR($str, $len1, $len2) {
    $lookup = buildLSRMap($str, $len1, $len2);

    return printLSR($str, $len1, $len2, $lookup);
}

function printLSR($str, $len1, $len2, $lookup)
{

    if ($len1 == 0 || $len2 == 0) return "";


    if ($str[$len1 - 1] == $str[$len2 - 1] && $len1 != $len2) return printLSR($str, $len1 - 1, $len2 - 1, $lookup) . $str[$len1 - 1];


    if ($lookup[$len1 - 1][$len2] > $lookup[$len1][$len2 - 1]) return printLSR($str, $len1 - 1, $len2, $lookup);

    return printLSR($str, $len1, $len2 - 1, $lookup);
}