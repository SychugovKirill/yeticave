<?php

// Время до конца текущего дня
date_default_timezone_set("Europe/Moscow");
$time = time();
$tomorrow = strtotime("next day, 12:00 AM");
$result = floor($tomorrow - $time);
$timer = gmdate('h:i', $result );

$ads = [
        [
                'title'    => '2014 Rossignol District Snowboard',
                'category' => 'Доски и лыжи',
                'price'    => '10999',
                'img'      => 'img/lot-1.jpg',
        ],
        [
                'title'    => 'DC Ply Mens 2016/2017 Snowboard',
                'category' => 'Доски и лыжи',
                'price'    => '159999',
                'img'      => 'img/lot-2.jpg',
        ],
        [
                'title'    => 'Крепления Union Contract Pro 2015 года размер L/XL ',
                'category' => 'Крепления',
                'price'    => '8000',
                'img'      => 'img/lot-3.jpg',
        ],
        [
                'title'    => 'Ботинки для сноуборда DC Mutiny Charocal ',
                'category' => 'Ботинки',
                'price'    => '10999',
                'img'      => 'img/lot-4.jpg',
        ],
        [
                'title'    => 'Куртка для сноуборда DC Mutiny Charocal',
                'category' => 'Одежда',
                'price'    => '7500',
                'img'      => 'img/lot-5.jpg',
        ],
        [
                'title'    => 'Маска Oakley Canopy',
                'category' => 'Разное',
                'price'    => '5400',
                'img'      => 'img/lot-6.jpg',
        ],
];

function format_price($price){
    return number_format(ceil($price), 0, false, ' ');
}

?>

<section class="promo">
    <h2 class="promo__title">Нужен стафф для катки?</h2>
    <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное
                           снаряжение.</p>
    <ul class="promo__list">
        <li class="promo__item promo__item--boards">
            <a class="promo__link" href="all-lots.html">Доски и лыжи</a>
        </li>
        <li class="promo__item promo__item--attachment">
            <a class="promo__link" href="all-lots.html">Крепления</a>
        </li>
        <li class="promo__item promo__item--boots">
            <a class="promo__link" href="all-lots.html">Ботинки</a>
        </li>
        <li class="promo__item promo__item--clothing">
            <a class="promo__link" href="all-lots.html">Одежда</a>
        </li>
        <li class="promo__item promo__item--tools">
            <a class="promo__link" href="all-lots.html">Инструменты</a>
        </li>
        <li class="promo__item promo__item--other">
            <a class="promo__link" href="all-lots.html">Разное</a>
        </li>
    </ul>
</section>
<section class="lots">
    <div class="lots__header">
        <h2>Открытые лоты</h2>
    </div>
    <ul class="lots__list">
        <?php foreach ($ads as $key => $item): ?>
            <li class="lots__item lot">
                <div class="lot__image">
                    <img src="<?= $item['img']; ?>" width="350" height="260" alt="Сноуборд">
                </div>
                <div class="lot__info">
                    <span class="lot__category"><?= $item['category']; ?></span>
                    <h3 class="lot__title"><a class="text-link" href="lot.html"><?= $item['title']; ?></a>
                    </h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount">Стартовая цена</span>
                            <span class="lot__cost"><?= format_price($item['price']) ?><b class="rub">р</b></span>
                        </div>
                        <div class="lot__timer timer">
                        <?= $timer ?? false ?>
                        <?= $timer2 ?? false ?>
                        </div>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</section>
