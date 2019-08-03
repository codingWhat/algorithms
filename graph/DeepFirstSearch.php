<?php


require __DIR__ . '/../list/queue.php';
//深度优先搜索-BFS

/**
 * [
 *  [1, 2, 3, 4]
 *  [5, 6, 7, 8]
 *  [9, 10, 11, 12]
 * ]
 */

/**
 * Class DeepFirstSearch
 * 1.基于邻接表构建图
 * 2.搜索实现方式(基于队列数据结构)
 */

class DeepFirstSearch {

    /**
     * @var Graph
     */
    private $graph;
    /**
     * @var Queue
     */
    private $queue;

    private $prev;

    private $visited;

    /**
     * DeepFirstSearch constructor.
     * @param Graph $graph
     */
    public function __construct(Graph $graph)
    {
        $this->graph = $graph;
        $this->queue =  new Queue(100);
        $this->visited = [];
        $this->prev = [];
    }

    public function makeNeighborTable()
    {
        $demoData = [
          1 => [2, 5],
          2 => [3, 6],
          5 => [6, 9],
        ];
        
    }


    public function do(int $start, int $terminal)
    {
        if ($start == $terminal)  return ;

        $this->visited[$start] = true;
        $prev = [];
        $this->queue->enqueue($start);

        while ($this->queue->size()) {

            $fItem = $this->queue->dequeue();

            for ($i = 0; $i < $this->graph[$fItem]->szie(); $i++) {
                $sitem = $this->graph[$fItem]->get($i);
                if (!$this->visited[$sitem]) {
                    $prev[$sitem] = $fItem;
                    if ($sitem == $terminal) {
                        return $this->prev;
                    }
                    //$this->visited[$sitem] = true;
                    $this->do($sitem, $terminal);
                }
            }
        }
    }

    public function do1($start, $terminal)
    {
        $this->recurDfs($start, $terminal);
    }

    private function recurDfs($start, $terminal)
    {
        $this->visited[$start] = true;

        if ($start == $terminal) {
            return ;
        }

        for ($i = 0; $i < $this->graph[$start]->size(); $i++) {
            $sItem = $this->graph[$start]->get($i);
            if (!isset($this->visited[$sItem])) {
                if ($sItem == $terminal) {
                    return $this->prev;
                }

                $this->prev[$sItem] = $start;
                $this->recurDfs($sItem, $terminal);
            }
        }
    }
}