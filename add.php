<?php

require_once 'functions.php';


$add_lot = get_template('templates/add-lot.php');

$layout = get_template('templates/layout.php', [
    'active_logo' => true,
    'content' => $add_lot,
]);




print($layout );