<?php
namespace graph;

//顶点
class Vertex
{
    //顶点编号
    private $id;
    //距离起始点之间的距离
    private $dist;

    public function __construct($id, $dist)
    {
        $this->id = $id;
        $this->dist = $dist;
    }
}