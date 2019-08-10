          <?php
//利用回溯算法求解八皇后问题



function eightQueens($row, $col, $arr, $recorded){

        $item = $arr[$row];
        for ($i = 0; $i < $col; $i++) {

            if (isOk($item[$i], $i, $recorded)) {

            }
        }

}

function isOk() {

}
