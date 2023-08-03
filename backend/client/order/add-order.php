<?php

require_once $_SERVER['DOCUMENT_ROOT']."/backend/DB.php";
require_once $_SERVER['DOCUMENT_ROOT']."/backend/Product.php";

function CheckProduct() {
    if(isset($_POST['id'])) {
        $product = new Product();
        $product = $product->selectOneProduct($_POST['id']);

        if($product) {
            return $product;
        }
        else return false;
    }
    else return false;
}

if(isset($_COOKIE['unique_id'])){
    $sth = DB::connect()->prepare("SELECT `user`.`referral_program`, `balance`.`balance_client` FROM `user` 
        INNER JOIN `balance` ON `user`.`unique_id` = `balance`.`unique_id` 
         WHERE `user`.`unique_id` = ?");
    
    $sth->execute(array($_COOKIE['unique_id']));
    $ArrayUser = $sth->fetch(PDO::FETCH_ASSOC);

    if($ArrayUser) {

        if(CheckProduct()){
            $product = CheckProduct();
            $quantity = $_POST['quantity'];

            if($product['quantity'] <= $quantity ) {
                echo json_encode($_POST['quantity']);
            }
        }
        else {

        }

    }
    else {

    }
}

function Referal(){

}