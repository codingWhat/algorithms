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
        $index = $this->makeHash($key);

        if ($this->count > $this->size) {
            return false;
        }

        if (isset($this->items[$index])) {
               $this->items[$index]->add($key, $value);
        } else {
            $list = new SingleList();
            $list->add($key, $value);
            $this->items[$index] = $list;
        }

        $this->count++;
        return true;
    }

    public function del($key)
    {
        $index = $this->makeHash($key);

        if (!isset($this->items[$index]))  return false;

        /** @var SingleList $list */
        $list = $this->items[$index];

        $list->del($key);

        return true;
    }

    public function isExists(LinkedList $linkedList, $key)
    {
        return (bool)$this->find($linkedList, $key);
    }

    public function find(LinkedList $linkedList, $key)
    {
        /** @var LinkedNode $cur */
        $cur = $linkedList->getHead();
        $prev = null;
        while ($cur->getNext()) {
            if ($cur->getKey() == $key) {
                return $prev;
            }
            $prev = $cur;
            $cur = $cur->getNext();
        }

        return false;
    }

    public function makeHash($key)
    {
        return crc32($key) % $this->size;
    }
}

class HashTable1 {

    private $size;
    /**
     * @var array
     */
    private $items;

    public function __construct($size)
    {
        $this->size = $size;
        $this->items = [];
    }
}