<?php

//本脚本实现方案未考虑线程安全问题
//总结: 该方案缺点就是每次出队，都需要进行一次数据搬移，影响性能.
class ArrayQueue {
    private $size;
    /**
     * @var array
     */
    private $items;

    private $count;

    /**
     * Queue constructor.
     * @param $size
     */
    public function __construct($size)
    {
        $this->size = $size - 1;
        $this->items = [];
        $this->count = 0;
    }


    public function enQueue($item)
    {

        if ($this->count > $this->size) return false;

        $this->items[$this->count++] = $item;

        return true;
    }


    public function deQueue()
    {
        if ($this->count <= 0)  return false;

        $pollItem =  $this->items[0];

        for ($i = 0; $i < $this->count -1; $i++) {
            $this->items[$i] = $this->items[$i+1];
        }
        $this->count--;
        return $pollItem;
    }
}




//该方案弥补了每次出队需要数据搬移，提高性能， 缺点；代码复杂了
class ArrayQueueAdvanced {
    private $size;
    /**
     * @var array
     */
    private $items;
    /**
     * @var int
     */
    private $count;
    /**
     * @var int
     */
    private $head;
    /**
     * @var int
     */
    private $tail;


    /**
     * ArrayQueueAdvanced constructor.
     * @param $size
     */
    public function __construct($size)
    {
        $this->size = $size;
        $this->items = [];
        $this->count = 0;
        $this->head = 0;
        $this->tail = 0;
    }


    public function enqueue($item)
    {
        if ($this->tail > $this->size)  return false;


        if ($this->tail == $this->size) {

            if ($this->head) {
                for ($i = 0; $i < $this->tail - $this->head; $i++) {
                    $this->items[$i] = $this->items[$this->head + $i];
                }
                $this->tail = $this->tail - $this->head;
                $this->head = 0;
            } else {
                return false;
            }
        }

        $this->items[$this->tail++] = $item;

        return true;
    }

    public function dequeue()
    {
        if ($this->head > $this->tail || $this->head > $this->size) return false;

        $dequeueItem = $this->items[$this->head++];

        return $dequeueItem;
    }

    public function printItems()
    {
         print_r($this->items);
    }

    public function isFull()
    {
        var_dump($this->tail == $this->size);
    }
}

