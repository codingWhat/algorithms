<?php

$str1  = "ABCBDAB";
$str2  = "BDCABA";
//最长公共子序列
/*echo longestCommonSubSequence($str1, $str2, strlen($str1), strlen($str2));
function longestCommonSubSequence ($str1, $str2, $len1, $len2){
        if ($len1 == 0 || $len2 == 0) return 0;


        if ($str1[$len1-1] == $str2[$len2-1]) {
            return longestCommonSubSequence($str1, $str2, $len1-1, $len2-1) + 1;
        }

        return max(longestCommonSubSequence($str1, $str2, $len1-1, $len2), longestCommonSubSequence($str1, $str2, $len1, $len2-1));
}*/
$str1 = "XMJYAUZ";
$str2 = "MZJAWXU";
echo lcsAdvanced($str1, $str2);
function lcsAdvanced($str1, $str2) {
    $len1 = strlen($str1);
    $len2 = strlen($str2);

    $cur = $prev = [];

    for ($i = 0; $i <= $len1; $i++) {
        for ($j = 0; $j <= $len2; $j++) {
            if ($i == 0 || $j == 0) {
                $cur[$j] = 0;
            }else {
                /*
                $str1 = "XMJYAUZ";
                $str2 = "MZJAWXU";
                */
                if ($str1[$i-1] == $str2[$j - 1]) {
                    $cur[$j] = $prev[$j - 1] + 1;
                } else {
                    $cur[$j] = max($prev[$j], $cur[$j - 1]);
                }
            }
        }

        for ($k = 0; $k <= $len2; $k++) {
            $prev[$k]  = $cur[$k];
        }
    }
var_dump($cur);
    return $cur[$len2];
}