<?php

require 'models/Goods.php';

$goodsList = Goods::getAllGoods();

Goods::createNewTable();
Goods::createNewItem();
Goods::deleteItem();
Goods::updateItem();

require 'views/admin_view.php';
