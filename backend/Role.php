<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/backend/DB.php");

class Role
{
    public function create($array) {
        $sth = DB::connect()->prepare("INSERT INTO `role` SET `unique_id` = :unique_id, `client` = :client, `seller` = :seller");
        $sth->execute($array);
    }

    public function update($array) {
        $sth = DB::connect()->prepare("UPDATE `role` SET `seller` = :seller WHERE `unique_id` = :unique_id");
        $sth->execute($array);
    }
}