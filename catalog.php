<?php


require 'models/Category.php';
// require 'models/Goods.php';



$allCategorie = Category::getCategoryList();

$goodsList = Goods::getAllGoods();

if(isset($_POST['id']) && $_POST['id'] !== 0) {
    $id = (int)$_POST['id'];
    $goodsList = Category::getCategories($id);
} elseif(isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $goodsList = Category::getCategories($id);
} elseif (isset($_POST['word'])) {
    $word = htmlspecialchars(trim($_POST['word']));
    $goodsList = Category::getSearch($word);
} else {
    $goodsList = Goods::getAllGoods();
}


require 'views/catalog_view.php';

?>