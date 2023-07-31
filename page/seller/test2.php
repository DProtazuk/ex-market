<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/backend/Shop.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/backend/Role.php");


$arrayRole = [
    'unique_id'=>$_COOKIE['unique_id'],
    'seller' => 1
];
$role = new Role();
$role->update($arrayRole);

header('Location: /page/seller/main');
