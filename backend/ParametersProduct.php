<?php

require_once $_SERVER['DOCUMENT_ROOT']."/backend/DB.php";

class ParametersProduct
{
    public function SelectParametersCategory($category){
        $query = "SELECT * FROM `parameters_product` WHERE `id_categories` = ?";
        $sth = DB::connect()->prepare($query);
        $sth->execute(array($category));
        $array = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $array;
    }
}