<?php

require_once 'functions.php';


$add_lot = get_template('templates/all-lots.php');

$layout = get_template('templates/layout.php', [
        'active_logo' => true,
        'content' => $add_lot,
]);




print($layout );