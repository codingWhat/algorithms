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

//执行流程；
/*
 4
0/ \1
 3
0/ \1
 6
0/ \1
7
0/ \1

第一步就是递归到最后一个元素，利用递归特性，巧妙backTrace
7  //curWeight = 0, maxWeight = 7
6,7 // 超过bagWeight
3,6,7  // 3+6 = 9 ,而 15超过 bagWeight
4,3,6,7
  */