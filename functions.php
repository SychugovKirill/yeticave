<?php

//подключает блок
function get_template($path, $array = [])
{
    $output = null;
    
    
    if ($path) {
        extract($array);
        ob_start();
        require_once $path;
        $output = ob_get_clean();
    }
    
    return $output;
};

//Время до конца текущего дня
function get_time($day)
{
    date_default_timezone_set("Europe/Moscow");
    $timer = null;
    
    if ($day) {
        $time     = time();
        $tomorrow = strtotime($day);
        $result   = floor($tomorrow - $time);
        $timer    = gmdate('h:i', $result);
    }
    
    return $timer;
};


function format_price($price){
    return number_format(ceil($price), 0, false, ' ');
};

function clear_data($value) {
    $value = trim($value); // удаляет пробелы
    $value = stripcslashes($value); // удаляет экранирование (слеши)
    $value = strip_tags($value, '<br>'); // Удаляет теги HTML и PHP
    $value = htmlspecialchars($value); // Преобразует специальные символы в HTML-сущности
    return $value;
}







