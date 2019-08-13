<?php

//Dijkstra 算法上获取地图上两点之间的最短路径



class Dijkstra {

    /**
     * @var PriorityQueue $queue
     */
    private $queue;

    public function __construct(PriorityQueue $queue)
    {
        $this->queue = $queue;
    }

    public function do($start, $terminal)
    {
       $predecessor = [];

    }
}