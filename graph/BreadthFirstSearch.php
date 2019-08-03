<?php

require __DIR__ . '/../list/queue.php';
//广度优先搜索-BFS

/**
 * [
 *  [1, 2, 3, 4]
 *  [5, 6, 7, 8]
 *  [9, 10, 11, 12]
 * ]
 */

/**
 * Class BreadthFirstSearch
 * 1.基于邻接表构建图
 * 2.搜索实现方式(基于队列数据结构)
 */

class BreadthFirstSearch {

    /**
     * @var Queue
     */
    private $queue;
    /**
     * @var Graph
     */
    private $graph;

    public function __construct(Graph $graph)
    {
        $this->queue = new Queue(100);
        $this->graph = $graph;
    }

    public function do($start, $terminal)
    {
        if ($start == $terminal) return  ;

        $visited[$start]= true;

        $prev = [];
        $this->queue->enqueue($start);

        while ($this->queue->size()) {
            $fItem = $this->queue->dequeue();

            for ($i = 0; $this->graph[$fItem]->size(); $i++) {
                    $sItem = $this->queue[$fItem]->get($i);

                if (!isset($visted[$sItem])) {
                    $prev[$sItem] = $fItem;
                    if ($sItem == $terminal) {
                        $this->printSearchPath($prev, $sItem, $terminal);
                        return ;
                    }
                    $visited[$sItem] = true;
                    $this->queue->enqueue($sItem);
                }
            }

        }
    }

    private function printSearchPath(array $prev, $sItem, $terminal)
    {
        if (isset($prev[$sItem])) {
            $this->printSearchPath($prev, $prev[$sItem], $terminal);
        }
        echo $prev[$sItem] . PHP_EOL;
    }


}