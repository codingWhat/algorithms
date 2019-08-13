<?php
namespace listx\practise;

use listx\SingleListNode;


//删除倒数第k个节点
function delKNode(SingleListNode $head, int $k) {

    if (is_null($head) || is_null($head->getNext())) return false;

    $i = 0;
    $fast = $head->getNext();
    $slow = $head->getNext();
    while ($i <= $k) { //保持多一个节点距离，方便删除
        $fast = $fast->getNext();
    }


    while ($fast) {
        $fast = $fast->getNext();
        $slow = $slow->getNext();
    }

    if (is_null($slow))  return false;

    $slow->setNext($slow->getNext()->getNext());

    return true;
}
