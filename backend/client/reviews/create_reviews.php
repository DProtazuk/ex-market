<?php

require_once $_SERVER['DOCUMENT_ROOT']."/backend/DB.php";

$DB = DB::connect();

$rating = $_POST['rating'];
$product_id = $_POST['product_id'];
$order_id = $_POST['order'];

if ($_POST['dignities']) {
    $dignities = $_POST['dignities'];
}
else {
    $dignities = NULL;
}

if ($_POST['disadvantages']) {
    $disadvantages = $_POST['disadvantages'];
}
else {
    $disadvantages = NULL;
}

if ($_POST['comment']) {
    $comment = $_POST['comment'];
}
else {
    $comment = NULL;
}



$sql = "INSERT INTO `reviews`(`unique_id`, `product_id`, `order_id`, `rating`, `dignities`, `disadvantages`, `comment`) VALUES (?, ?, ?, ?, ?, ?, ?)";
$pdo = $DB->prepare($sql);
$pdo->execute(array($_COOKIE['unique_id'], $product_id, $order_id, $rating, $dignities, $disadvantages, $comment));
$idReviews = $DB->lastInsertId();

function ImageTransfer($array) {
    foreach ($array as $item) {
        $sourcePath = $_SERVER['DOCUMENT_ROOT'].'/temp/'.$item;
        $destinationPath = $_SERVER['DOCUMENT_ROOT'].'/res/img/reviews/'.$item;
        rename($sourcePath, $destinationPath);
    }
}

if ($_POST['arrayImg']) {
    $arrayImg = json_decode($_POST['arrayImg']);
    ImageTransfer($arrayImg);

    $parameters = [];

    $sql = "INSERT INTO `reviews_img` (`id_reviews`, `img`) VALUES ";

    foreach ($arrayImg as $item) {
        $sql .= "(?, ?), ";

        array_push($parameters, $idReviews);
        array_push($parameters, $item);

    }
    $sql = substr(trim($sql), 0, -1);

    $pdo = $DB->prepare($sql);
    $pdo->execute($parameters);
}

echo json_encode("save");