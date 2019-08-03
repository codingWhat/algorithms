<?php

require __DIR__ . '/SingleList.php';



$list = new SingleList();

$list->add(3);
$list->add(4);
$list->add(5);
echo "list size :" . $list->size() . PHP_EOL;

$cur = $list->head->next;
while ($cur) {
    echo $cur->value;
    $cur = $cur->next;
}