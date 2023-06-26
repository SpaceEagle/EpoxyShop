<?php require 'Components/header.php'; ?>
    <main class="page-main">
        <section class="categories">
            <div class="category-clock category">
                <a class="category__link" href="catalog.php?id=<?=$clock['category_id']?>">
                    <h3><?= $clock['translation'] ?></h3>
                </a>    
            </div>
            <div class="category-board-game category">
                <a class="category__link" href="catalog.php?id=<?=$boardGames['category_id']?>">
                    <h3><?= $boardGames['translation'] ?></h3>
                </a>
            </div>
            <div class="category-box category">
                <a class="category__link" href="catalog.php?id=<?=$box['category_id']?>">
                    <h3><?= $box['translation'] ?></h3>
                </a>
            </div>
            <div class="category-kit category">
                <a class="category__link" href="catalog.php?id=<?=$kit['category_id']?>">
                    <h3><?= $kit['translation'] ?></h3>
                </a>
            </div>
            <div class="category-others category">
                <a class="category__link" href="catalog.php?id=<?=$others['category_id']?>">
                    <h3><?= $others['translation'] ?></h3>
                </a>
            </div>
            <div class="category-coster category">
                <a class="category__link" href="catalog.php?id=<?=$coster['category_id']?>">
                    <h3><?= $coster['translation'] ?></h3>
                </a>
            </div>
        </section>
        <section class="new goods">
            <h3>Новинки</h3>
            <div class="goods-container">
                <?php foreach($newItems as $item) :?>
                    <a href="goods_detail.php?id=<?=$item['id']?>">
                <div class="goods__item">
                
                    <div>
                        <img class="good__img" src="<?= $item['title_photo']; ?>" width="100%" alt="<?= $item['title']; ?>">
                    </div>
                    <div>
                        <h3 class="good__title"><?= $item['title']; ?></h3>
                        <p class="good__price"><?= $item['price'] ?> <span class="rub">&#8381;</span></p>

                        <form>
                        <input type='hidden' name='id' value='<?= $item['id'] ?>'>
                        </form>
                    </div>
            
                </div>
                    </a>
                <?php endforeach;?>
            </div>
        </section>
    </main>
<?php require 'components/footer.php'; ?>