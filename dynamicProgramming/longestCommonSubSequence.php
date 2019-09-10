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
echo lcs($str1, $str2);exit;
function lcs($str1, $str2) {

    $len1 = strlen($str1);
    $len2 = strlen($str2);
    $arr = [];

    //$arr[$len1+1][$len2+1]
    for ($i = 0; $i <= $len1; $i++) {
        $arr[$i][0] = 0;
    }
    //最长的公共子序列，最长为较短的字符串，所以以较短字符串的长度为column长度，这里为了代码简短，忽略了这层校验
    for ($j = 0; $j <= $len2; $j++) {
        $arr[0][$j] = 0;
    }


    for ($i = 1; $i <= $len1; $i ++) {
        for ($j = 1; $j <= $len2; $j++) {

            if ($str1[$i-1] == $str2[$j-1]) {
                $arr[$i][$j] =  $arr[$i-1][$j] + 1;
            } else {
                $arr[$i][$j] = max($arr[$i-1][$j], $arr[$i][$j-1]);
            }
        }
    }
    var_dump($arr);
    return $arr[$len1][$len2];
}

$str1 = "XMJYAUZ";
$str2 = "MZJAWXU";
echo lcsSpaceOptimized($str1, $str2);
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

    return $cur[$len2];
}