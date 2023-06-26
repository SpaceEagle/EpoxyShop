<?php require 'Components/header.php'; ?>
    <main class="page-main">
        <div>
            <ul class="breadcrumbs">
                <li class="breadcrumbs__item"><a href="index.html">Главная</a></li>
                <li class="breadcrumbs__item"><a>Каталог</a></li>
            </ul>
        </div>
        <div class="filters-container">
            <form class="filters" method="POST">
                <fieldset>
                    <label>Выберете категорию:</label>
                    <select name="id">
                        <option name="id" value="0">Все</option>
                        <?php foreach($allCategorie as $category) :?>
                        <option value="<?= $category['category_id'] ?>"><?= $category['translation'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </fieldset>
                <fieldset>
                    <label>Поиск: </label>
                    <input type="search" name="word" placeholder="Что ищем?">
                </fieldset>

                <input type="submit" class="btn" name="action" value="Найти">

            </form>
        </div>
        <section class="goods goods-container">

        <?php foreach($goodsList as $good) :?>
            <a href="goods_detail.php?id=<?=$good['id']?>">
                <div class="goods__item">
                    <div>
                        <img class="good__img" src="<?= $good['title_photo']; ?>" width="100%" alt="<?= $good['title']; ?>">
                    </div>
                    <div>
                        <h3 class="good__title"><?= $good['title']; ?></h3>
                        <p class="good__price"><?= $good['price'] ?> <span class="rub">&#8381;</span></p>
                    </div>
                </div>
                </a>
                <?php endforeach;?>
        </section>
    </main>
    <?php require 'components/footer.php'; ?>