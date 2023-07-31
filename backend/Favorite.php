<?php

require_once $_SERVER['DOCUMENT_ROOT']."/backend/DB.php";
class Favorite
{
    public function select() {

    }

    public function Add($id_product) {
        $sth = DB::connect()->prepare("INSERT INTO `favorite` SET `unique_id` = :unique_id, `id_product` = :id_product");
        $sth->execute(array('unique_id' => $_COOKIE['unique_id'], 'id_product' => $id_product));
    }

    public function Delete($id_product) {
        $sth = DB::connect()->prepare("DELETE FROM `favorite` WHERE `unique_id` = :unique_id AND `id_product` = :id_product");
        $sth->execute(array('unique_id' => $_COOKIE['unique_id'], 'id_product' => $id_product));
    }

    public function check($id_product) {
        $sth = DB::connect()->prepare("SELECT * FROM `favorite` WHERE `unique_id` = :unique_id AND `id_product` = :id_product");
        $sth->execute(array('unique_id' => $_COOKIE['unique_id'], 'id_product' => $id_product));
        $array = $sth->fetch(PDO::FETCH_ASSOC);

        if($array){
            return true;
        }
        else {
            return false;
        }
    }
}