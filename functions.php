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



date_default_timezone_set("Europe/Moscow");
$date = date('h:i:s');
$date1 = strtotime($date.'+ 1 days');
$date2 = date("h:i:s",$date1);


