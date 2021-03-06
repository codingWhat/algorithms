<?php
namespace hashTable;
//实现一个LRU缓存淘汰算法

//可以基于hashtable + 双向链表
//$res['key'] = 节点对象
//1. 查找/添加时 将操作节点置为head节点
//2. 添加满时, 去除最后一个节点
//3. 添加时，该节点已存在,更新值，并置为head

//也可以基于 hashMap + 小顶堆(有过期时间)


class LruCache {

    private $capacity;
    /**
     * @var array
     */
    private $items;
    /**
     * @var LruLinkedList
     */
    private $linkedList;
    /**
     * @var int
     */
    private $count;


    /**
     * LruCache constructor.
     * @param $capacity
     */
    public function __construct($capacity)
    {
        $this->capacity = $capacity;
        $this->count = 0;
        $this->items = [];
        $this->linkedList = new LruLinkedList();
    }


    /**
     * @param $key
     * @param $value
     * @return bool
     */
    public function set($key, $value)
    {
        if (!$key && !is_string($key) && !is_int($key))  return false;

        //计算hash
        $hashIndex = $this->makeHash($key);

        //判断hashKey是否存在
        $newNode = new LruLinkedNode($key, $value);
        $singleList = new LruSingleList();

        //若存在，则将其置为尾节点
        if (isset($this->items[$hashIndex]) ) {

            /** @var LruSingleList $singleList */
            $singleList = $this->items[$hashIndex];
            /** @var LruLinkedNode $curNode */
            $curNode = $singleList->find($key);
            if ($curNode) {
                return  $this->linkedList->moveToTail($curNode, $value);
            }
        }

        //淘汰逻辑-LRU
        while ($this->count >= $this->getCapacity()) {
            $lastNode = $this->linkedList->getHead()->getNext();
            $this->del($lastNode->getKey());
        }

        //若有空闲空间时，添加元素
        $this->linkedList->add($newNode);
        $singleList->add($newNode);
        $this->items[$hashIndex] = $singleList;
        $this->count++;
        return true;
    }

    public function del($key)
    {
        if ($this->count <= 0) return false;

        if (!$key && !is_string($key) && !is_int($key))  return false;

        //计算hash
        $hashIndex = $this->makeHash($key);
        if (isset($this->items[$hashIndex])) {
            /** @var LruSingleList $singleList */
            $singleList = $this->items[$hashIndex];
            $curNode = $singleList->find($key);
            if ($curNode) {
                $this->count--;
                $singleList->remove($key);
                return $this->linkedList->remove($curNode);
            }
        }

        return false;
    }


    /**
     * @return  int
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param $key
     * @return int
     */
    private function makeHash($key)
    {
        return abs(crc32($key) % ($this->getCapacity() - 1));
    }

    public function printItems()
    {
        for ($i = 0; $i < $this->capacity; $i++) {
            if (isset($this->items[$i])) {
                /** @var LruSingleList $list */
                $list = $this->items[$i];
                /** @var LruLinkedNode $cur */
                $list->printHnext();
            }
        }
    }
}
