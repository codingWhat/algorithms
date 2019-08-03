<?php
// 0-1背包问题

$index = 0;
$currentWeight = 0;
$items = [3, 4, 6, 5];
$bagWeight = 10;
$maxWeight = 0;
$num = 4;
bagPack($index, $currentWeight, $items, $num, $bagWeight, $maxWeight);
echo $maxWeight;

function bagPack($index, $currentWeight, $items, $num, $bagWeight, &$maxWeight) {
    if ($index == $num || $currentWeight == $bagWeight) {
        if ($currentWeight > $maxWeight) {
            $maxWeight = $currentWeight;
        }

        return ;
    }

    bagPack($index+1, $currentWeight, $items, $num, $bagWeight, $maxWeight);

    if ($items[$index] + $currentWeight < $bagWeight) {
        bagPack($index+1, $items[$index] + $currentWeight, $items, $num, $bagWeight,$maxWeight);
    }
}