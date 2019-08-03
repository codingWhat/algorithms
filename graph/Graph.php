<?php
require __DIR__ . '/Base.php';
require __DIR__ . '/SingleList.php';


//边
class Edge
{
    /** @var Vertex $start */
    private $start;

    /** @var Vertex $terminal */
    private $terminal;

    /** @var int $weight */
    private $weight;

    public function __construct(Vertex $start, Vertex $terminal, int $weight = 1)
    {
        $this->start = $start; //边的起始顶点
        $this->terminal = $terminal;  //边的尾顶点
        $this->weight = $weight;  //权重，默认1：即无权重，
    }

}

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


//实现有向图、无向图、有权图、无权图的邻接矩阵和邻接表表示方法
//图这种数据结构存储有两种方式，1：邻接矩阵，2:邻接表
//有向/无向图，在用邻接表时，底层存储一致，
//而邻接矩阵方式上，无向图需要在两个顶点的位置标上记号，而有向图需要根据顶点之间的方向，在相应的位置标上记号即可


class Graph extends Base
{

    /**
     * size of graph
     * @var int $size
     */
    private $size;

    /**
     * container for saving data
     * @var array $items
     */
    protected $items;

    public function __construct($size)
    {
        $this->size = $size;
        $this->items = [];
    }

    public function addEdge($start, $terminal)
    {
        if (isset($this->items[$start])) {
            $this->items[$start]->add($terminal);
        } else {
            $list = new SingleList();
            $list->add($terminal);
            $this->items[$start] = $list;
        }
    }
}