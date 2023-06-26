<?php

require 'models/Goods.php';

$id = (int)$_GET['id'];
$good = Goods::getGoodById($id);


require 'views/goods_detailed_view.php'


?>