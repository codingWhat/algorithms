<?php
namespace hashTable;


//基于链表法的解决哈希冲突
//缺点:
//1.数组的大小会影响冲突概率,
//2.冲突大了以后，单链表查询速度会影响查询效率
class HashTable {

    private $size;
    /**
     * @var array
     */
    private $items;
    private $count;


    public function __construct($size)
    {
        $this->size = $size;
        $this->items = [];
        $this->count = 0;
    }

    public function set($key, $value)
    {

    }

    public function del($key)
    {

    }

    public function isExists(LinkedList $linkedList, $key)
    {
        return (bool)$this->find($linkedList, $key);
    }


    public function makeHash($key)
    {
        return crc32($key) % $this->size;
    }
}
