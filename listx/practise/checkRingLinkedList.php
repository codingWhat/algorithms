<?php
namespace listx\practise;
//链表中环的检测


use listx\SingleListNode;

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
