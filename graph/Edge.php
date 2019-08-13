<?php
namespace graph;


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

    /**
     * @return Vertex
     */
    public function getStart(): Vertex
    {
        return $this->start;
    }

    /**
     * @return Vertex
     */
    public function getTerminal(): Vertex
    {
        return $this->terminal;
    }

    /**
     * @return int
     */
    public function getWeight(): int
    {
        return $this->weight;
    }

}