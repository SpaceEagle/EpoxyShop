<?php
session_start();

$admin_login = 'admin';
$admin_password = 'admin111';


if( isset($_SESSION['adminLogin']) ){

	if ('POST' === $_SERVER['REQUEST_METHOD']){ // если отправлена форма

		$login = htmlspecialchars( trim($_POST['login']) );
		$password = htmlspecialchars( trim($_POST['password']) );

		// проверяем, верны ли данные
		if($admin_login === $login){ 
			if($admin_password === $password){
				$_SESSION['adminLogin'] = $login;
				header('Location: admin.php');
				exit;
			}else{ // если пароль не ок
				echo 'Неверный пароль';
			}

		}else{ // если логин введен неверно
			echo 'Неверный логин';
		}
    }
}

require 'models/Category.php';

$newItems = Category::showCategoryNew();
$clock = Category::getCategoryById(1);
$boardGames = Category::getCategoryById(2);
$coster = Category::getCategoryById(3);
$kit = Category::getCategoryById(4);
$others = Category::getCategoryById(5);
$box = Category::getCategoryById(6);

require 'views/index_view.php';
