<?php

main ();
function main () {

    $coins = [1, 3, 5, 7];
    $sum = 8;
    coinChange($coins, $sum, []);
}


function coinChange($coins, $sum, $permu) {

    if ($sum == 0 || array_sum($permu) == 8) {

        print_r($permu);
        return ;
    }


    foreach ($coins as $coin) {

        //如果满足条件，就加入数组中，(即和等于8)
        if (isMeet($coin, $sum, $permu)) {
            $permu[] = $coin;
            coinChange($coins, $sum - $coin, $permu);
            array_pop($permu);
        }
    }
}

function isMeet($coin, $sum, $permu) {
    return $sum >= $coin  &&  array_sum($permu) <= 8 - $coin;
}