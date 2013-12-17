<?php

require_once 'loader.php';


function l($data, $file = 'log.txt') {

    if (is_array($data) || is_object($data)) {
        $data = print_r($data, true);
    }


    $trace = debug_backtrace();

    $path = '/data/www/forms/log/' . $file;
    $current = 'Called on File :' . $trace[0]['file'] . ', Line :' . $trace[0]['line'] . "\n";
    $current .= "$data\n";
    $current.='___________________________________________________________________________________________________________________' . "\n";


    $writer = new Zend_Log_Writer_Stream($path);
    $logger = new Zend_Log($writer);

    $logger->info($current);
}

l(array(1,2,3,4,5));

