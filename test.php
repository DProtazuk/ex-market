<?php

require_once $_SERVER['DOCUMENT_ROOT']."/backend/MyFunction.php";
require_once $_SERVER['DOCUMENT_ROOT']."/backend/Product.php";
require_once $_SERVER['DOCUMENT_ROOT']."/backend/Shop.php";

$Shop = new Shop();
$product = new Product();
$MyFunction = new MyFunction();
$array = $product->new_products();
echo "<pre>";
print_r($array);

echo $Shop->rating(1);

echo $MyFunction->create_rating($Shop->rating(1));