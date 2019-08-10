<?php

require __DIR__ . '/singleList.php';

$list = new SingleList();

$list->add(3);
$list->add(2);
$list->add(1);

$list->printListItem();
