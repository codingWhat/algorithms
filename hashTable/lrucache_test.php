<?php
namespace hashTable;


require dirname(__DIR__). '/autoload.php';


$cache = new LruCache(3);

$cache->set('a', 1);
$cache->set('b', 1);
$cache->set('c', 1);
$cache->set('d', 1);
$cache->set('d', 2);
$cache->set('f', 3);
$cache->set('e', 2);
$cache->set('h', 6);
$cache->set('n', 6);

$cache->printItems();
//echo  $cache->getCount();