<?php

echo palindromicSubsequence("ABBDCACB", 0, 7);
function palindromicSubsequence($str, $start, $end) {

    if ($start > $end) return 0;

    if ($start == $end) return 1;

    if ($str[$start] == $str[$end]) {
       return  palindromicSubsequence($str, $start+1, $end-1) + 2;
    }

    return max(
        palindromicSubsequence($str, $start+1, $end),
        palindromicSubsequence($str, $start, $end-1)
    );

}



main();

function main() {
    $str1 = "ABBDCACB";
    $str2 = strrev($str1);
    $len = strlen($str1);
    $lookup = buildLookUp($str1, $str2, $len);

    echo  printPalindromicSubSequence($str1, $str2, $len, $len, $lookup);

}
//打印回文字符串序列
function buildLookUp($str, $str1, $len) {

    $lookup = [];
    for ($i = 0; $i <= $len; $i++) {
        $lookup[$i][0] = 0;
    }

    for ($j = 0; $j <= $len; $j++) {
        $lookup[0][$j] = 0;
    }

    for ($i = 1; $i <= $len; $i++) {
        for ($j = 1; $j <= $len; $j++) {
                if ($str[$i - 1] == $str1[$j-1]) {
                    $lookup[$i][$j] = $lookup[$i-1][$j-1] + 1;
                } else {
                    $lookup[$i][$j] = max($lookup[$i-1][$j], $lookup[$i][$j-1]);
                }
        }
    }
echo "<pre>";
    print_r($lookup);
    echo "<pre>";exit;
    return $lookup;
}

function printPalindromicSubSequence($str1, $str2, $start, $end, $lookup) {

    if ($start == 0 || $end == 0) return "";

    if ($str1[$start-1] == $str2[$end-1]) {
        return printPalindromicSubSequence($str1, $str2, $start-1, $end-1, $lookup) . $str1[$start-1];
    }

    if ($lookup[$start-1][$end] > $lookup[$start][$end-1]) {
        return printPalindromicSubSequence($str1, $str2, $start-1, $end, $lookup);
    }

    return printPalindromicSubSequence($str1, $str2, $start, $end-1, $lookup);
}
