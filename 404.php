<?php

require_once 'functions.php';

$not_found = get_template('templates/not_found.php');

$layout = get_template('templates/layout.php', [
    'content' => $not_found,
]);


print($layout);
