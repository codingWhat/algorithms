<?php

class SingleListNode {
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
    public $tail;

    /**
     * @var int
     */
    private $size;

    public function __construct($size = 0)
    {
        $this->size = $size;
        $this->head = new SingleListNode(null);
        $this->tail = new SingleListNode(null);
    }

    public function add($item)
    {
        $newNode = new SingleListNode($item);

        if (!$this->head->next && !$this->tail->next) {
            $this->head->next = $this->tail->next = $newNode;
        }else {
            $this->tail->next->next = $newNode;
            $this->tail->next = $newNode;
        }

        $this->size++;
    }

    public function printListItem()
    {
        $cur = $this->head->next;

        while ($cur) {
            echo $cur->value . PHP_EOL;
            $cur = $cur->next;
        }
    }
}