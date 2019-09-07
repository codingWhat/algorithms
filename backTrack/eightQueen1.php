<?php


define("QUEEN_NUM", 5);

define("SHOW_STR", "Q");

$arr = [];
queen($arr, 0);

function queen($arr, $row) {

    //代表 已经到最后一层的queen，打印整个棋盘即可
    if ($row == QUEEN_NUM) {
        for ($i = 0; $i < QUEEN_NUM; $i++) {
            for ($j = 0; $j < QUEEN_NUM; $j++) {
                if (isset($arr[$i][$j]) && $arr[$i][$j] == SHOW_STR) {
                    echo SHOW_STR;
                }else {
                    echo "-";
                }
                echo "\t";
            }

            echo "\n";
        }

        return ;
    }


    for ($col = 0; $col < QUEEN_NUM; $col++) {
        if (isOk($arr, $row, $col)) {
            $arr[$row][$col] = SHOW_STR;
            queen($arr, $row+1);
            $arr[$row][$col] = "-";
        }
    }
}

function isOk($arr, $row, $col) {

    //纵向 return false
    for ($i = 0 ; $i < $row; $i++) {
        if (isset($arr[$i][$col]) && $arr[$i][$col] == SHOW_STR) {
            return false;
        }
    }
    //反斜线
    for ($i = $row, $j = $col; $i >= 0 && $j >= 0; $i-- , $j--) {
        if (isset($arr[$i][$j]) && $arr[$i][$j] == SHOW_STR) {
            return false;
        }
    }

    //正斜线
    for ($i = $row, $j = $col; $i >= 0 && $j < QUEEN_NUM; $i--, $j++) {
        if (isset($arr[$i][$j]) && $arr[$i][$j] == SHOW_STR) {
            return false;
        }
    }



    return true;
}