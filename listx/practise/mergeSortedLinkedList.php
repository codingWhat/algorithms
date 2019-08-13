<?php
namespace listx\practise;
// 合并两个有序链表
require dirname(__DIR__) . '/../autoload.php';
use listx\SingleList;
use listx\SingleListNode;

$list1 = new SingleList();
$list2 = new SingleList();
prepareTestData($list1, $list2);

printListItem(mergeTwoSortedList($list1->head, $list2->head));

function mergeTwoSortedList(SingleListNode $head1, SingleListNode $head2) {

    if (is_null($head1) || is_null($head1->getNext())) return false;

    if (is_null($head2) || is_null($head2->getNext())) return false;

    $cur1 = $head1->getNext();
    $cur2 = $head2->getNext();


    $headNew = new SingleListNode(null);
    $cur = $headNew;
    while ($cur1 &&  $cur2) {
        if ($cur1->value > $cur2->value) {
            $cur->setNext(new SingleListNode($cur2->value));
            $cur2 = $cur2->next;
        }else {
            $cur->setNext(new SingleListNode($cur1->value));
            $cur1 = $cur1->getNext();
        }

        $cur = $cur->getNext();
    }

    while ($cur1) {
        $cur->setNext(new SingleListNode($cur1->value));
        $cur = $cur->getNext();
        $cur1 = $cur1->getNext();
    }

    while ($cur2) {
        $cur->getNext()->setNext(new SingleListNode($cur2->value));
        $cur = $cur->getNext();
        $cur2 = $cur2->getNext();
    }

    return $headNew;
}

function printListItem(SingleListNode $head) {
    $cur = $head->getNext();
    while ($cur) {
        echo $cur->value . PHP_EOL;
        $cur = $cur->getNext();
    }
}

function prepareTestData(SingleList $list1, SingleList $list2) {
    $list1->add(4);
    $list1->add(5);
    $list1->add(8);


    $list2->add(1);
    $list2->add(6);
    $list2->add(9);
}
