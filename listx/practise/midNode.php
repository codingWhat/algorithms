<?php
namespace listx\practise;
//链表中间节点

function findMiddleNode($head) {

    if (is_null($head))  return false;

    $fast = $head->next;
    $slow = $head;

    while ($fast) {
        $fast = $fast->next->next;
        $slow = $slow->next;
    }

    return $slow;
}