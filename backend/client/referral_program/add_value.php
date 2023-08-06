<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/backend/DB.php";

if (isset($_POST['value'])) {
    if (isset($_COOKIE['unique_id'])) {
        $sql = "INSERT INTO `payment_details`(`unique_id`, `value`) VALUES (?, ?)";

        $sql = DB::connect()->prepare($sql);
        $sql->execute(array($_COOKIE['unique_id'], $_POST['value']));
        echo "save";
    }
}