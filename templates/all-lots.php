<?php
require_once 'functions.php';

$categories = require_once('config/categories.php');
$ads        = require_once('config/data-lots.php');

$ids = null;
$lot_id = null;
$lots = null;

if (isset($_COOKIE['id'])) {
    $ids = unserialize($_COOKIE['id']);
}

foreach ($ids as $id) {
    $lots[] = $ads['items'][$id];
    
    
}

?>

<main>
    <nav class="nav">
        <ul class="nav__list container">
            <?php foreach ($categories as $category) : ?>
                <li class="nav__item">
                    <a href="all-lots.html"><?= $category ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
    <div class="container">
        <section class="lots">
            <h2>История просмотров</h2>
            <ul class="lots__list">
                <?php foreach ($lots as $lot) : ?>
                    <li class="lots__item lot">
                        <div class="lot__image">
                            <img src="<?= $lot['img'] ?>" width="350" height="260" alt="Сноуборд">
                        </div>
                        <div class="lot__info">
                            <span class="lot__category"><?= $lot['category'] ?></span>
                            <h3 class="lot__title"><a class="text-link" href="lot.html"><?= $lot['title'] ?></a></h3>
                            <div class="lot__state">
                                <div class="lot__rate">
                                    <span class="lot__amount">Стартовая цена</span>
                                    <span class="lot__cost"><?= format_price($lot['price']) ?><b class="rub"
                                        >р</b></span>
                                </div>
                                <div class="lot__timer timer">
                                    <?= $timer ?? false ?>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>
        <ul class="pagination-list">
            <li class="pagination-item pagination-item-prev"><a>Назад</a></li>
            <li class="pagination-item pagination-item-active"><a>1</a></li>
            <li class="pagination-item"><a href="#">2</a></li>
            <li class="pagination-item"><a href="#">3</a></li>
            <li class="pagination-item"><a href="#">4</a></li>
            <li class="pagination-item pagination-item-next"><a href="#">Вперед</a></li>
        </ul>
    </div>
</main>
