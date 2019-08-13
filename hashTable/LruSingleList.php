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

    static private $cache = [];

    public function __construct($size = 0)
    {
        $this->size = $size;
        $this->head = new LruLinkedNode('head', null);
        $this->tail = new LruLinkedNode('tail', null);
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

    private function isExists($key)
    {
        return (bool) isset(static::$cache[$key]);
    }

    private function getNodePtrByKey($key)
    {
        if ($this->isExists($key)) {
            return $this->getItem($key)['cur'];
        }

        return null;
    }

    private function getPrevPtrByKey($key)
    {
        if ($this->isExists($key)) {
            return $this->getItem($key)['prev'];
        }

        return null;
    }

    private function getItem($key)
    {
        return static::$cache[$key];
    }

    private function clearItem($key)
    {
        unset(static::$cache[$key]);
    }

    /**
     * @param $key
     * @return LruLinkedNode
     */
    public function find($key)
    {
        if ($this->isExists($key)) {
            return $this->getNodePtrByKey($key);
        }

        /** @var LruLinkedNode $cur */
        $cur = $this->head->getHnext();
        $prev = $this->head;

        while ($cur) {

            if ($cur->getKey() == $key) {
                static::$cache[$cur->getKey()]['prev'] = $prev;
                static::$cache[$cur->getKey()]['cur'] = $cur;
                break;
            }
            $prev = $cur;
            $cur = $cur->getHnext();
        }


        return $cur;
    }


    public function remove($key)
    {
        if ($this->isExists($key)) {
           return  $this->removeFully($key);
        }

        $resNode = $this->find($key);
        if (is_null($resNode))  return false;

         return  $this->removeFully($key);
    }

    private function removeFully($key)
    {
        $curNodeInfo = $this->getItem($key);
        $cur = $curNodeInfo['cur'];
        $prev = $curNodeInfo['prev'];

        if ($this->head->getHnext() === $cur && $this->tail->getHnext() === $cur) {
            $this->tail->setHnext(null);
        }
        $prev->setHnext($cur->getHnext());


        $this->clearItem($key);
        return true;

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
            echo str_repeat("-", $i) . $cur->getKey(). ", value: {$cur->getValue()}".PHP_EOL;

            $cur = $cur->getHnext();
            $i++;
        }
    }

}