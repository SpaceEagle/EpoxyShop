<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/admin.css">
    <title>Harmony in Art</title>
  </head>
  <body>
    <header class="page-header">
        <a href="index.php">
            <img class="page-header__logo-img" src="img/logo.png" width="146" height="87" alt="Harmony in Art">
        </a>
        <nav class="main-nav main-nav--closed main-nav--nojs">
            <button class="main-nav__toggle">Открыть меню</button>
            <ul class="main-nav__menu menu-list">
                <li><a href="index.php" class="menu-list__link">Главная</a></li>
                <li><a href="catalog.php" class="menu-list__link">Каталог</a></li>
                <li><a href="#" class="menu-list__link">О нас</a></li>
                <li><a href="#" class="menu-list__link">Доставка</a></li>
            </ul>
            <ul class="main-nav__user-menu">
                <li class="main-nav__user-item"><a href="admin.php" class="menu-list__link login-btn">Вход</a>
                    <div class="login-form user-form">
                        <form method="post">
                            <label class="visually-hidden" for="login-field">E-mail</label>
                            <input type="text" name="login" id="login-field" placeholder="Электронная почта">
                            <label class="visually-hidden" for="password-field">Пароль</label>
                            <input type="password" name="password" id="password-field" placeholder="Пароль">
                            <button type="submit" name="enter-btn" class="btn">Войти</button>
                        </form>
                    </div> 
                </li>
                <li><a class="menu-list__link">Корзина</a></li>
            </ul>
        </nav>
    </header>