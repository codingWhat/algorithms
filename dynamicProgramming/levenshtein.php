<?php

// ""  ABC   => cost 3
//ANC  ABC   => AN  AB  cost 0
//若最后一个字符不相等时
//ADB  ACF   =>  ADBF  ACF  //添加目标字符最后一个字符
//ADB  ACF   => AD ACF  //删除当前字符的最后一个字符
//ADB  ACF   => ADF  ACF  //将当前字符的最后一个字符替换成目标字符的最后一个字符，举一个更明显的例子, ADF ADE => ADE ADE ,然后又递归

// AB  ADF

echo editDistance("ADB", "ACF", 3, 3, 0);
echo editDistance("", "ACF", 1, 3, 0);
//echo editDistance("kitten", "sitting", 6, 7, 0);
echo editDistance("siting", "citing", 6, 6, 0);

function editDistance($obj, $target, $objLen, $targetLen, $cost) {

    if (strlen($obj) == 0) {
        return $targetLen;
    }

    if (strlen($targetLen) == 0) {
        return $objLen;
    }
   // var_dump(func_get_args());
    if ($objLen <= 0 || $targetLen <= 0) {

        return $cost;
    }

    if (isset($obj[$objLen - 1]) && isset($target[$targetLen - 1])) {
        if ($obj[$objLen - 1] == $target[$targetLen - 1]) {
            return  editDistance($obj, $target, $objLen-1, $targetLen-1, $cost);
        }

        return min (
        //添加一个字符
        editDistance($obj, $target, $objLen, $targetLen-1, $cost + 1),
        //删除一个字符
        editDistance($obj, $target, $objLen - 1, $targetLen, $cost + 1),
        //替换一个字符
        editDistance($obj, $target, $objLen - 1, $targetLen - 1, $cost + 1)
        );

    }

}