<?php
namespace listx\practise;


use listx\SingleList;

require dirname(__DIR__) . '/../autoload.php';
//准备测试数据
$singleList = prepareTestData();
$tmpList = $singleList;

//反转单链表
reverseSingleList($tmpList);

function reverseSingleList(SingleList $tmpList) {

    $cur = $tmpList->getHead();
    $prev = null;

    while ($cur) {
        $next = $cur->next;
        $cur->setNext($prev);
        $prev = $cur;
        $cur = $next;
    }
    $tmpList->setHead($prev);
}


function prepareTestData() {
    $singleList = new SingleList();
    $singleList->add(1);
    $singleList->add(2);
    $singleList->add(3);
    $singleList->add(4);

    return $singleList;
}