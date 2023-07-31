<?php

require_once $_SERVER['DOCUMENT_ROOT']."/backend/Favorite.php";

if(isset($_POST['action'])){
    $action = $_POST['action'];
    $Favorite = new Favorite();

    if($action === "add"){
        $Favorite->Add($_POST['id_product']);
    }
    if($action === "delete"){
        $Favorite->Delete($_POST['id_product']);
    }
}