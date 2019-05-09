<?php
//实现一个LRU缓存淘汰算法

//可以基于hashMap + 双向链表
//$res['key'] = 节点对象
//1. 查找/添加时 将操作节点置为head节点
//2. 添加满时, 去除最后一个节点
//3. 添加时，该节点已存在,更新值，并置为head

//也可以基于 hashMap + 小顶堆(有过期时间)

class LruNode{
    public $prev;
    public $next;

    public $key;
    public $value;

    public $hnext;
}


class LruLinkedList {
    public $head;
    public $tail;

}

class LruCache {

    public $nodes = [];

    public $list;

    public $capacity;

    public $used;

    public function __construct($size)
    {
        $this->capacity = $size;
    }
}

