<?php
namespace listx\practise;
// 合并两个有序链表

use listx\SingleList;
use listx\SingleListNode;

$list1 = new SingleList();
$list1->add(4);
$list1->add(5);
$list1->add(8);

$list2 = new SingleList();
$list2->add(1);
$list2->add(6);
$list2->add(9);

printListItem(mergeTwoSortedList($list1->head, $list2->head));

function mergeTwoSortedList($head1, $head2) {

    if (is_null($head1) || is_null($head1->next)) return false;

    if (is_null($head2) || is_null($head2->next)) return false;

    $cur1 = $head1->next;
    $cur2 = $head2->next;


    $headNew = new SingleListNode(null);
    $cur = $headNew;
    while ($cur1 &&  $cur2) {
        if ($cur1->value > $cur2->value) {
            $cur->next = new SingleListNode($cur2->value);
            $cur2 = $cur2->next;
        }else {
            $cur->next = new SingleListNode($cur1->value);
            $cur1 = $cur1->next;
        }

        $cur = $cur->next;
    }

    while ($cur1) {
        $cur->next  = new SingleListNode($cur1->value);
        $cur = $cur->next;
        $cur1 = $cur1->next;
    }

    while ($cur2) {
        $cur->next  = new SingleListNode($cur2->value);
        $cur = $cur->next;
        $cur2 = $cur2->next;
    }

    return $headNew;
}

function printListItem($head) {
    $cur = $head->next;
    while ($cur) {
        echo $cur->value . PHP_EOL;
        $cur = $cur->next;
    }
}
