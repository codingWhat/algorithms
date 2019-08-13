<?php
namespace listx\practise;


use listx\SingleList;


//准备测试数据
$singleList = prepareTestData();
$tmpList = $singleList;

//反转单链表
reverseSingleList($tmpList);

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


function prepareTestData() {
    $singleList = new SingleList();
    $singleList->add(1);
    $singleList->add(2);
    $singleList->add(3);
    $singleList->add(4);

    return $singleList;
}