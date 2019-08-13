<?php
namespace listx\practise;


//链表中间节点
use listx\SingleListNode;

function findMiddleNode(SingleListNode $head) {

    if (is_null($head))  return false;

    $fast = $head->getNext();
    $slow = $head;

    while ($fast) {
        $fast = $fast->getNext()->getNext();
        $slow = $slow->getNext();
    }

    return $slow;
}