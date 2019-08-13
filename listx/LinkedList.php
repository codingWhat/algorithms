<?php
namespace listx;
//双向链表实现
class LinkedNode {
    public $value;
    public $prev;
    public $next;

    public function __construct($value)
    {
        $this->value = $value;
    }
}

class LinkedList {

    public $head;
    public $tail;
    private $size;

    public function __construct($size = 0)
    {
        $this->size = $size;
        $this->head = new LinkedNode(null);
        $this->tail = new LinkedNode(null);
    }

    public function add($item)
    {
        $newNode = new LinkedNode($item);
        if (!$this->head->next && !$this->tail->prev) {
            $this->head->next = $newNode;
            $newNode->prev = $this->head;
        }else {
            $newNode->prev = $this->tail->prev;
            $this->tail->prev->next = $newNode;
        }

        $this->tail->prev = $newNode;
        $this->size++;
    }

    public function del($item)
    {
        if (!$this->head->next || !$this->tail->prev) return false;

        $cur = $this->head->next;
        while ($cur) {
            if ($cur->value == $item) break;

            $cur = $cur->next;
        }

        $this->remove($cur);
        return true;
    }

    private function remove(LinkedNode $node)
    {
        $node->prev->next = $node->next;
        $node->next->prev = $node->prev;
    }

    public function printListItem()
    {
        if (!$this->head->next || !$this->tail->prev) return false;

        $cur = $this->head->next;


        while ($cur) {
            echo $cur->value . PHP_EOL;
            $cur = $cur->next;
        }
    }

}