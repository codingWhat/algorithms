<?php
//实现一个基于链表法解决冲突问题的散列表

//实现思路: 基于crc32对key进行hash运算, 并取余
//hash冲突:
//1.链表法(取出当前节点next ,将新节点next->head指针next, head指针指向新节点)
//2.开放寻址法, 若数组节点上存在数据，则往下继续探测到空闲节点为止(跳过删除节点)
//注意:删除节点时，是将节点标记为删除状态

