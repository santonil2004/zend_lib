<?php

require 'loader.php';

/**
 * data base params
 */
$dbconfig = array(
    'host' => 'localhost',
    'username' => 'root',
    'password' => '',
    'dbname' => 'fhf');



/**
 * database connectoin and setting default adapter
 */
$db = Zend_Db::factory('PDO_MYSQL', $dbconfig);
Zend_Db_Table_Abstract::setDefaultAdapter($db);




$db = Zend_Db_Table::getDefaultAdapter();

$sql = $db->select()
        ->from(array('vmnk' => 'vehicle_master_nada_keyed'), array('idvehicle', 'application_id'))
        ->joinInner(array('vp' => 'vehicle_pricing'), 'vp.vehicle_id = vmnk.idvehicle')
        ->where('vmnk.is_applying_for = ?', 1)
        ->where('vmnk.is_coapplicant = ?', 0)
        ->where('vmnk.application_id = ?', (int) 1);

$result = $db->fetchAll($sql);

r($result);