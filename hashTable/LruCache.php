<?php
namespace hashTable;
//实现一个LRU缓存淘汰算法

//可以基于hashMap + 双向链表
//$res['key'] = 节点对象
//1. 查找/添加时 将操作节点置为head节点
//2. 添加满时, 去除最后一个节点
//3. 添加时，该节点已存在,更新值，并置为head

//也可以基于 hashMap + 小顶堆(有过期时间)



require dirname(__DIR__) . '/autoload.php';


class LruCache {

    private $capacity;
    /**
     * @var array
     */
    private $items;


    /**
     * LruCache constructor.
     * @param $capacity
     */
    public function __construct($capacity)
    {
        $this->capacity = $capacity;
        $this->items = [];
        $this->list = new LinkedList();
    }


    public function set($key, $value)
    {
        $newNode = new LinkedNode($key, $value);

        if ($this->list->getSize() > $this->getCapacity()) {
            $this->list->remove($this->list->getHead());
        }

        if (isset($this->items[$key])) {
            $cur = $this->items[$key];
            while ($cur->getHnext()) {
                $cur = $cur->getHnext();
            }
            $cur->setHnext($newNode);
        }else {
            $this->items[$key] = $newNode;
        }
    }


    /**
     * @return  int
     */
    public function getCapacity()
    {
        return $this->capacity;
    }


    public function incrCapacity()
    {
        $this->capacity++;
    }
}
