<?php


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

    public function makeNeighborTable()
    {
        $demoData = [
          1 => [2, 5],
          2 => [3, 6],
          5 => [6, 9],
        ];
        
    }
}