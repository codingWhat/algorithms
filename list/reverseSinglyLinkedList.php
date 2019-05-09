<?php
//反转单链表


class Node {

    public $value;
    public $next;

    public function __construct($value)
    {
        $this->value = $value;
    }
}

class SingleList {

    public $head;


    public function addNode($node)
    {
        $curr = $this->head;
        $newNode = new Node($node);
        if (is_null($curr)) {
            $this->head = $newNode;
            return true;
        }

        $prev = null;
        while ($curr) {
            $prev = $curr;
            $curr = $curr->next;
        }

        if ($curr == null && $prev) {
            $prev->next = $newNode;
        }
        return true;
    }
}

$singleList = new SingleList();
$singleList->addNode(1);
$singleList->addNode(2);
$singleList->addNode(3);
$singleList->addNode(4);


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
