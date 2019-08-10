<?php

namespace Heap;



class HeapFactory {

    static $instance;

    public static function make($heapType = 'normal')
    {
        if (isset(static::$instance[$heapType])) return static::$instance[$heapType];

        if ($heapType == 'vertex') {
            static::$instance[$heapType] = new HeapVertex();
        }else {
            static::$instance[$heapType] = new Heap();
        }

       return static::$instance[$heapType];
    }
}