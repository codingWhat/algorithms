<?php

//实现一个二叉查找树，并且支持插入、删除、查找操作


class BTreeNode{
    public $left;
    public $right;
    public $value;

    /**
     * BTreeNode constructor.
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }
}


class BinaryTree {

    public $root;

    public function __construct()
    {
        $this->root = new BTreeNode(null);
    }

    public function find()
    {

    }

    public function remove()
    {

    }

    public function insert()
    {

    }
}