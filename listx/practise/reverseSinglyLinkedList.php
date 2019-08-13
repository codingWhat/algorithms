<?php
namespace listx\practise;
//反转单链表

use listx\SingleList;


$singleList = new SingleList();
$singleList->add(1);
$singleList->add(2);
$singleList->add(3);
$singleList->add(4);


$tmpList = $singleList;
 var_dump($tmpList);
reverseSingleList($tmpList);
var_dump($tmpList->head);
function reverseSingleList($tmpList) {

    $cur = $tmpList->head;
    $prev = null;

    while ($cur) {
        $next = $cur->next;
        $cur->next = $prev;
        $prev = $cur;
        $cur = $next;
    }
    $tmpList->head = $prev;
}
