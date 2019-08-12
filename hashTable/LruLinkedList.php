<?php
namespace hashTable;

use listx\LinkedNode;

class LruLinkedList {


    /**
     * @var LruLinkedNode
     */
    private $head;


    /** @var int */
    private $size;
    /**
     * @var LruLinkedNode
     */
    private $tail;

    public function __construct()
    {
        $this->head = new LruLinkedNode(null, null);
        $this->tail = new LruLinkedNode(null, null);
        $this->size = 0;
    }

    public function add(LruLinkedNode $node)
    {
        if (!$this->head->getNext() && !$this->tail->getPrev()) {
            $this->head->setNext($node);
            $node->setPrev($this->head);
        } else {
            $this->tail->getPrev()->setNext($node);
            $node->setPrev($this->tail->getPrev());
        }

        $node->setNext($this->tail);
        $this->tail->setPrev($node);
        $this->size++;
        return true;
    }


    public function remove(LruLinkedNode $node)
    {
        $node->getPrev()->setNext($node->getNext());
        $node->getNext()->setPrev($node->getPrev());
        $node->setNext(null);
        $node->setPrev(null);
        return true;
    }

    public function moveToTail(LruLinkedNode $node, $value)
    {
        $this->remove($node);

        $this->tail->getPrev()->setNext($node);
        $node->setNext($this->tail);
        $node->setPrev($this->tail->getPrev());
        $node->setValue($value);
        $this->tail->setPrev($node);

        return true;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @param int $size
     */
    public function setSize(int $size)
    {
        $this->size = $size;
    }


    /**
     * @return LruLinkedNode
     */
    public function getHead(): LruLinkedNode
    {
        return $this->head;
    }

    /**
     * @return LruLinkedNode
     */
    public function getTail(): LruLinkedNode
    {
        return $this->tail;
    }

}