<?php

namespace graph;

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

    /**
     * @param mixed $next
     */
    public function setNext($next): void
    {
        $this->next = $next;
    }

    /**
     * @return mixed
     */
    public function getNext()
    {
        return $this->next;
    }
}

class SingleList
{

    /** @var SingleListNode $head */
    public $head;

    /** @var SingleListNode $tail */
    private $tail;

    private $size;

    public function __construct()
    {
        $this->tail = new SingleListNode(null);
        $this->head = new SingleListNode(null);
        $this->size = 0;
    }

    public function add($item)
    {
        $newNode = new SingleListNode($item);

        if ($this->head->getNext() === null && $this->tail->getNext() === null) {
            $this->head->setNext($newNode);
        } else {
            $this->tail->getNext()->setNext($newNode);
        }

        $this->tail->setNext($newNode);

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

    /**
     * @return SingleListNode
     */
    public function getHead(): SingleListNode
    {
        return $this->head;
    }

    /**
     * @param SingleListNode $head
     */
    public function setHead(SingleListNode $head): void
    {
        $this->head = $head;
    }

    /**
     * @return SingleListNode
     */
    public function getTail(): SingleListNode
    {
        return $this->tail;
    }

    /**
     * @param SingleListNode $tail
     */
    public function setTail(SingleListNode $tail): void
    {
        $this->tail = $tail;
    }
}