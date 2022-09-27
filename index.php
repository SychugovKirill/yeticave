<?php
require_once 'functions.php';

$main = get_template('templates/index.php');

$layout = get_template('templates/layout.php', [
    'content' => $main,
]);


print($layout);



