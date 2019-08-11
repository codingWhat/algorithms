<?php
namespace hashTable;

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
        } else {
            $this->tail->getPrev()->setNext($node);
            $node->setPrev($this->tail->getPrev());
        }

        $this->tail->setPrev($node);

        $this->size++;

        return true;
    }

    public function remove(LruLinkedNode $node)
    {
        $node->getPrev()->setNext($node->getNext());
        $node->setPrev($this->tail->getPrev());

        return true;
    }

    public function moveToTail(LruLinkedNode $node)
    {
        $this->remove($node);

        $this->tail->getPrev()->setNext($node);
        $node->setPrev($this->tail->getPrev());
        $this->tail->setNext($node);

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

    public function removeOldest()
    {
        if (is_null($this->head->getNext()) || is_null($this->head->getNext()->getNext())) return false;

        $this->head->getNext()->getNext()->setPrev($this->head);
        $this->head->setNext($this->head->getNext()->getNext());

        $this->size--;
        return true;
    }


}