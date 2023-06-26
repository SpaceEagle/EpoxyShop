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
        <a href="#">
            <img class="page-header__logo-img" src="img/logo.png" width="146" height="87" alt="Harmony in Art">
        </a>
        <nav class="main-nav main-nav--closed main-nav--nojs">
            <button class="main-nav__toggle">Открыть меню</button>
            <ul class="main-nav__menu menu-list">
                <li><a href="exit.html" class="menu-list__link">Выход</a></li>
            </ul>
        </nav>
    </header>
    <main class="page-main">
        <div>
            <ul class="breadcrumbs">
                <li class="breadcrumbs__item"><a href="index.html">Главная</a></li>
                <li class="breadcrumbs__item"><a>Админ панель</a></li>
            </ul>
        </div>
        <article class="add-form-container form--close">
            <a  class="add-form__close-btn">X</a>
            <h3 class="add-form__title">Добавляем новый товар</h3>
            <form class="add-form" method="POST" enctype="multipart/form-data">

                <fieldset class="add-form-photo">
                    <legend class="add-form-photo__title">Загрузите обложку</legend>
                    <div class="add-form-photo__upload">
                        <div class="add-form-photo__preview">
                            <img src="img/title-photo.png" alt="Обложка товара" width="40" height="60">
                        </div>
                        <div class="add-form-photo__field">
                            <label class="add-form-photo__loading" for="title_photo">Жду обложку...</label>
                            <input class="add-form-photo__input visually-hidden" id="title_photo" type="file" name="title_photo" required>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="add-form__element">
                    <label class="add-form__label">Название:</label>
                    <input type="text" name="title" required>
                </fieldset>

                <fieldset class="add-form__element">
                    <label class="add-form__label" for="price">Цена:</label>
                    <input id="price" type="number" name="price" required>
                </fieldset>

                <fieldset class="add-form__element add-form__textaria">
                    <label class="add-form__label">Описание:</label>
                    <textarea name="description" width="100%"></textarea>
                </fieldset>

                <input class="add-form__btn btn" type="submit" name="action" value="Добавить">

            </form>
            <hr>
        </article>
        <section class="goods goods-container">
                <div class="goods__item goods-add">
                    <a class="goods__add-btn" href="#" height="100%">
                        <h3><span class="plus">+</span><br>Добавить<br>новый<br>товар</h3>
                    </a>
                </div>
                <?php foreach($goodsList as $good) :?>
                <div class="goods__item">
                    <div>
                        <img class="good__img" src="<?= $good['title_photo']; ?>" width="100%" alt="<?= $good['title']; ?>">
                    </div>
                    <div>
                        <h3 class="good__title"><?= $good['title']; ?></h3>
                        <p class="good__price"><?= $good['price'] ?> <span class="rub">&#8381;</span></p>

                        <form method='POST'>
                            <input type='hidden' name='id' value='<?= $good['id'] ?>'>

                            <input class="btn" type='submit' name='action' value='Удалить'>
                            <input class="btn" type='submit' name='action' value='Редактировать'>
                        </form>
                    </div>
                </div>
                <?php endforeach;?>
        </section>
    </main>
    <footer class="page-footer">
        <ul class="footer-social">
            <li>
                <a class="footer-social__link footer-social__link--vk" target="_blunk" href="https://vk.com/harmonyinart">
                    <span class="visually-hidden">VK</span>
                </a>
            </li>
            <li>
                <a class="footer-social__link footer-social__link--inst" target="_blunk" href="#">
                    <span class="visually-hidden">INST</span>

                </a>
            </li>
        </ul>
        <nav class="footer-menu">
            <ul>
                <li><a class="footer-menu__link" href="#">О нас</a></li>
                <li><a class="footer-menu__link" href="#">Доставка</a></li>
                <li><a class="footer-menu__link" href="#">Документы</a></li>
            </ul>
        </nav>
    </footer>
    <script src="js/main.js"></script>
    <script src="js/admin.js"></script>
  </body>
</html>