<?php

ini_set('display_errors', 1);

function __autoload($classname) {
    $class_path = str_replace('_', '/', $classname);
    include_once($class_path . '.php');
}


function r($data) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

