<?php

/*
// С помощью сессий выводим переменные
session_start();
$ads = $_SESSION['array'];
*/

$ads        = require_once('config/data-lots.php');
$categories = require_once('config/categories.php');

$timer = get_time('next day, 12:00 AM');

?>

<section class="promo">
    <h2 class="promo__title">Нужен стафф для катки?</h2>
    <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное
                           снаряжение.</p>
    <ul class="promo__list">
        <?php foreach ($categories as $category) : ?>
            <li class="promo__item promo__item--boards">
                <a class="promo__link" href="all-lots.html"><?= $category ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</section>
<section class="lots">
    <div class="lots__header">
        <h2>Открытые лоты</h2>
    </div>
    <ul class="lots__list">
        <?php foreach ($ads['items'] as $key => $item): ?>
            
            <li class="lots__item lot">
                <div class="lot__image">
                    <img src="<?= $item['img']; ?>" width="350" height="260" alt="Сноуборд">
                </div>
                <div class="lot__info">
                    <span class="lot__category"><?= $item['category']; ?></span>
                    <h3 class="lot__title"><a class="text-link" href="lot.php?id=<?= $key ?>"><?= $item['title']; ?></a>
                    </h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount">Стартовая цена</span>
                            <span class="lot__cost"><?= format_price($item['price']) ?><b class="rub">р</b></span>
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
