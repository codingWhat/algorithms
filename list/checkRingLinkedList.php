<?php
//链表中环的检测
require __DIR__ . '/singleList.php';


function checkWhetherRingList(SingleListNode $head) {

    $fast = $head->next;
    $slow = $head->next;

    while ($fast) {
        $fast = $fast->next->next;
        $slow = $slow->next;

        if ($fast->value == $slow->value)  return true;
    }

    return false;
}
