<?php
namespace hashTable;

class LinkedList {

    private $head;
    private $tail;
    private $size;

    public function __construct()
    {
        $this->head = new LinkedNode(null);
        $this->tail = new LinkedNode(null);
    }

    public function add(LinkedNode $newNode)
    {
        if (!$this->head->value && !$this->tail->value) {
            $this->head->setNext($newNode);
        } else {
          $newNode->setPrev($this->tail->getNext());
          $this->tail->getNext()->setNext($newNode);
        }

        $this->tail->setNext($newNode);

        $this->size++;
        return true;
    }


    public function remove(LinkedNode $node)
    {
        if ($this->size == 0)  return false;

        if (is_null($node->getPrev()) && is_null($node->getNext()) && is_null($node->getHnext())) return false;

        if ($this->head->getNext() === $node) {
            $this->head->setNext($node->getNext());
            $node->getNext()->setPrev(null);
        }else if ($this->tail->getNext() === $node) {
            $this->tail->setNext($node->getPrev());
            $node->getPrev()->setNext(null);
            $node->setPrev(null);
        } else if($node->getPrev() && $node->getNext()) {

            $node->getPrev()->setNext($node->getNext());
            $node->getNext()->setPrev($node->getPrev());
        }

        $this->size--;

        return true;
    }

    /**
     * @return mixed
     */
    public function getHead()
    {
        return $this->head;
    }

    /**
     * @param mixed $head
     */
    public function setHead($head)
    {
        $this->head = $head;
    }

    /**
     * @return mixed
     */
    public function getTail()
    {
        return $this->tail;
    }

    /**
     * @param mixed $tail
     */
    public function setTail($tail)
    {
        $this->tail = $tail;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param mixed $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }
}