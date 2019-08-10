<?php

//删除倒数第k个节点

require __DIR__ . '/singleList.php';

function delKNode(SingleListNode $head, $k) {

    if (is_null($head) || is_null($head->next)) return false;

    $i = 0;
    $fast = $head->next;
    $slow = $head->next;
    while ($i <= $k) { //保持多一个节点距离，方便删除
        $fast = $fast->next;
    }


    while ($fast) {
        $fast = $fast->next;
        $slow = $slow->next;
    }

    if (is_null($slow))  return false;

    $slow->next = $slow->next->next;

    return true;
}
