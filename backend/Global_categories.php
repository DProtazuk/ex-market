<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/backend/DB.php");

class Global_categories
{
    public function select_Global_categories(){
        $query = "SELECT * FROM `global_categories`";
        $sth = DB::connect()->prepare($query);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function select_Global_categoriesID(){
        $query = "SELECT `id` FROM `global_categories`";
        $sth = DB::connect()->prepare($query);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    function SelectStartIdGlobal_categories() {
        $query = "SELECT `id` FROM `global_categories` LIMIT 1";
        $sth = DB::connect()->prepare($query);
        $sth->execute();
        $array = $sth->fetch(PDO::FETCH_ASSOC);
        return $array['id'];
    }
}