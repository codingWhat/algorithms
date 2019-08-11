<?php
namespace hashTable;


class LruSingleList {

    /** @var LruLinkedNode  */
    public $head;
    /**
     * @var int
     */
    private $size;
    /**
     * @var LruLinkedNode
     */
    private $tail;

    public function __construct($size = 0)
    {
        $this->size = $size;
        $this->head = new LruLinkedNode(null, null);
        $this->tail = new LruLinkedNode(null, null);
    }

    public function add(LruLinkedNode $node)
    {

        if (!$this->head->getHnext() && !$this->tail->getHnext()) {
            $this->head->setHnext($node);
        } else {
            $this->tail->getHnext()->setHnext($node);
        }

        $this->tail->setHnext($node);
        $this->size++;
        return true;
    }

    /**
     * @param $key
     * @return array
     */
    public function find($key)
    {

        $isExists = false;
        /** @var LruLinkedNode $cur */
        $cur = $this->head->getHnext();
        $prev = $cur;

        while ($cur) {

            if ($cur->getKey() == $key) {
                $isExists = true;
                break;
            }
            $prev = $cur;
            $cur = $cur->getHnext();
        }

        return [$cur, $isExists];
    }

    public function removeAfter(LruLinkedNode $node)
    {
        $node->setHnext($node->getHnext()->getHnext());
        $node->getHnext()->getHnext()->setHnext($node);
    }

    /**
     * @return LruLinkedNode
     */
    public function getHead(): LruLinkedNode
    {
        return $this->head;
    }

    public function printHnext()
    {
        $cur = $this->head->getHnext();


        $i = 0;
        while ($cur) {
            echo str_repeat("-", $i) . $cur->getKey().PHP_EOL;

            $cur = $cur->getHnext();
            $i++;
        }
    }

}