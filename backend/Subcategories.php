<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/backend/DB.php");

class Subcategories
{
    public function SelectAll($id) {
        $db = DB::connect();
        $query = "SELECT * FROM `subcategories` WHERE `id_global_categorie` = ?";
        $sth = $db->prepare($query);
        $sth->execute(array($id));
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    private function SelectParameters($id) {
        $sth = DB::connect()->prepare("SELECT * FROM `parameters_product` WHERE `id_categories` = ?");
        $sth->execute([$id]);
        $array = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $array;
    }

    public function SelectCategoryEndParameters($id) {
        $arrayCategory = $this->SelectAll($id);
        $arrayParameters = $this->SelectParameters($id);
        $array = array(
            "0" => $arrayCategory,
            "1" => $arrayParameters
        );

        return json_encode($array);
    }

}