<?php

namespace graph;

class GraphWeight extends Base
{

    private $size;

    public function __construct($size)
    {
        $this->size = $size;
        $this->items = [];
    }


    public function addEdge($start, $terminal, $weight)
    {
        $edge = new Edge($start, $terminal, $weight);

        if (isset($this->items[$start])) {
            $this->items[$start]->add($terminal);
        } else {
            $list = new SingleList();
            $list->add($edge);
            $this->items[$start] = $list;
        }
    }
}