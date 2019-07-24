<?php
//利用回溯算法求解0-1背包问题

// 背包重量 10
// 物品重量 4， 3， 6，7
// 最多能装多少

$maxWeight = 0;
$bagWeight = 10;
$items = [4, 3, 6, 7];
$index = 0;
$curWeight = 0;
$num = 4;
bagPack($index, $curWeight, $items, $bagWeight, $num, $maxWeight);

var_dump($maxWeight);

function bagPack($index, $curWeight, $items, $bagWeight, $num, &$maxWeight) {

    if ($index == $num || $curWeight == $bagWeight) {
        if ($curWeight > $maxWeight) {
            $maxWeight = $curWeight;
        }
        return ;
    }

    bagPack($index + 1, $curWeight, $items, $bagWeight, $num, $maxWeight);

    if ($items[$index] + $curWeight < $bagWeight) {
        bagPack($index + 1, $items[$index] + $curWeight, $items, $bagWeight, $num, $maxWeight);
    }

}