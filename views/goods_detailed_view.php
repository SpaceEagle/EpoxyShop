<?php require 'Components/header.php'; ?>
<main class="page-main">
        <div class="breadcrumbs-container">
            <ul class="breadcrumbs">
                <li class="breadcrumbs__item"><a href="index.php">Главная</a></li>
                <li class="breadcrumbs__item"><a href="catalog.php">Каталог</a></li>
                <li class="breadcrumbs__item"><a><?= $good['translation']?></a></li>
            </ul>
        </div>
        <section class="goods-detailed">
            <div class="goods-detailed__photos">
                <img src="<?= $good['title_photo']?>" alt="<?= $good['title']?>">
            </div>
            <div class="goods-detailed__info">
                <h3><?= $good['title']?></h3>
                <div>
                    <p><?= $good['description']?></p>
                </div>
                <div>
                    <p>Цена: </p>
                    <p><?= $good['price']?> <span class="rub">&#8381;</span></p>
                    <a class="btn">Написать продавцу</a>
                </div>
            </div>
        </section>
    </main>
<?php require 'Components/footer.php'; ?>