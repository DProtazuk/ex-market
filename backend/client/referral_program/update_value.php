<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/backend/DB.php";

if (isset($_POST['value'])) {
    if (isset($_COOKIE['unique_id'])) {
        $sql = "UPDATE `payment_details` SET `value`= ? WHERE `unique_id` = ?";
        $sql = DB::connect()->prepare($sql);
        $sql->execute(array($_POST['value'], $_COOKIE['unique_id']));
        echo "save";
    }
}