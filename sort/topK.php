<?php
//时间复杂度:o(n) 实现TopK
//建堆, 分两种:1.边插入,边构造堆; 2.堆静态数据, 构造堆



class Heap {

    private  $items = [];
    private  $capcity;
    private  $count;

    public function __construct($size = 0)
    {
        $this->capcity = $size;
        $this->items = [];
        $this->count = 0;
    }


    public function topK($arr, $capacity)
    {
        //$this->items = $arr;
        $this->capcity = $capacity;
        $this->count = 0;

        foreach ($arr as $item) {

            if ($this->count <= $this->capcity-1) {
                $this->items[$this->count++] = $item;
                continue;
            }

            $this->tmpHeapify();

            if ($item > $this->items[0]) {
                $this->items[0] = $item;
            }
        }
    }

    function tmpHeapify() {

        $father = (int)(($this->count - 1) / 2);
        for (; $father >=0; $father-- ) {
            $this->topKHeapify($father);
        }

    }

    function topKHeapify($index) {
        while (true) {
            $leftNodeIndex = 2 * $index + 1;
            $rightNodeIndex = 2 * $index + 2;
            $minNode = null;
            if (isset($this->items[$leftNodeIndex]) && $this->items[$leftNodeIndex] <  $this->items[$index]) {
                $minNode = $leftNodeIndex;
            }

            if (isset($this->items[$rightNodeIndex]) && $minNode && $this->items[$rightNodeIndex] < $this->items[$minNode]) {
                $minNode = $rightNodeIndex;
            }

            if ($minNode == null) break;

            $tmp = $this->items[$minNode];
            $this->items[$minNode] = $this->items[$index];
            $this->items[$index] = $tmp;
            $index = $minNode;
        }
    }

    //边插入元素, 边堆化
    //单个节点, 堆化时间复杂度:log(N)
    public function insert($item)
    {
        if ($this->count == $this->capcity) return false;

        $this->items[++$this->count] = $item;

        $this->smallHeapify();
    }

    private function smallHeapify()
    {
        $index = $this->count;

        while (true) {
            $father = (int) ($index / 2);
            if ($father > 0 && $this->items[$father] > $this->items[$index]) {
                $tmp = $this->items[$father];
                $this->items[$father] = $this->items[$index];
                $this->items[$index] = $tmp;
                $index = $father;
            }else {
                break;
            }

        }
    }


    private function bigHeapify()
    {
        $index = $this->count;

        while (true) {
            $father = (int)($index / 2);
            if ($father > 0 && $this->items[$father] < $this->items[$index]) {
                $tmp = $this->items[$father];
                $this->items[$father] = $this->items[$index];
                $this->items[$index] = $tmp;
                $index = $father;
            } else {
                break;
            }
        }
    }

    //静态数组的堆化, 时间复杂度,粗糙计算, nLog(N)
    //但是, 不涉及叶子节点堆化(叶子结点不会交换，涉及比较), 堆化 是跟树的高度有关系
    //h = lgN,
    //2^0 节点数:0  高度h
    //2^1 , 节点数 2, 高度h-1
    //……
    //2^k , 节点数 , 高度 h-k
    //k 记为深度
    //节点数和: s1 = h + 2^1*(h-1) + …… + 2^k(h-k) +……+ 2^h-1 * 1
    // 2s1 = 2h + 2^2(h-1) + …… + 2^k(h-k+1) +……+ 2^h-1 *2 + 2^h
    //相减, s1 = 2^h -h -2, 由于h=lgN
    //时间复杂度: O(n) ,
    public function fixedArr($arr)
    {
        $this->items = $arr;
        $len = count($arr);
        $this->capcity = $len;
        $father = ($len - 1) /2;

        //非叶子节点, 需要和左右节点比较
        for ($i = $father; $i >= 0; $i--) {
            $this->fixedArrHeapify($i, $len);
        }

    }

    public function fixedArrHeapify($index, $len)
    {
        while (true) {
            $leftNode = $index * 2 +1;
            $rightNode = $index*2 + 2;
            $min = null;
            if ($leftNode < $len && $this->items[$leftNode] < $this->items[$index]) {
                $min = $leftNode;
            }

            if ($rightNode < $len && !is_null($min) && $this->items[$rightNode] < $min) {
                $min = $rightNode;
            }

            if ($min == null) {
                break;
            }

            $tmp = $this->items[$min];
            $this->items[$min] = $this->items[$index];
            $this->items[$index] = $tmp;
            $index = $min;
        }
    }

    public function getItems()
    {
        var_dump($this->items);

    }

}
//静态数据 , 实现Top K 算法
/*$arr = [9, 4, 2, 1, 6, 3];

$heap = new Heap();
$heap->fixedArr($arr);
$heap->getItems();*/

//topk

$arr = [9, 4, 2, 1, 6, 3, 21312,22323, 32132];
$heap = new Heap();
$heap->topK($arr, 3);
$heap->getItems();

function bigHeap($arr, &$tmp) {
    foreach ($arr as $index => $item) {
        $tmp[$index+1] = $item;
        bigHeapify($tmp, $index+1);
    }
}
function bigHeapify(&$tmp, $index) {

    if (empty($tmp)) return;

    while (true) {
        //若父节点存在&当前节点大于父节点
        $father = (int)($index / 2);
        if ($father > 0 && $tmp[$father] > $tmp[$index]) {
            $temp = $tmp[$father];
            $tmp[$father] = $tmp[$index];
            $tmp[$index] = $temp;
            $index = $father;
        }else{
            break;
        }

    }

}

