<?php

//简单单链表实现，没有大小限制，采用"哨兵"模式，提供快速获取链表size, head, tail
class SingleListNode
{
    public $value;
    public $next;

    /**
     * SingleListNode constructor.
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }
}

class SingleList {

    public $head;
    private $tail;
    private $size;

    public function __construct()
    {
        $this->tail =  new SingleListNode(null);
        $this->head = new SingleListNode(null);
        $this->size = 0;
    }

    public function add($item)
    {
        $newNode = new SingleListNode($item);

        if ($this->head->next === null && $this->tail->next === null) {
            $this->head->next =  $newNode;
            $this->tail->next = $newNode;
        }else {
            $this->tail->next->next = $newNode;

            $this->tail->next = $newNode;
        }
        $this->size++;
    }

    public function get($index)
    {
        $cur = $this->head;

        $count = 0;
        while ($cur) {
            if ($count == $index) {
                return $cur->value;
            }
            $cur = $cur->next;
            $count++;
        }

        return -1;
    }

    public function size()
    {
        return $this->size;
    }
}