<?php

require_once $_SERVER['DOCUMENT_ROOT']."/backend/DB.php";

if(isset($_COOKIE['unique_id'])) {

    $db = DB::connect();
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $unique_id = $_COOKIE['unique_id'];

    $parameters = [];
    array_push($parameters, $unique_id);
    array_push($parameters, $_POST['start_data']);
    array_push($parameters, $_POST['finish_data']);

    $sql = "SELECT `orders`.`id`, `orders`.`price`, `orders`.`amount`, `orders`.`quantity`, `orders`.`data`, `product`.`name`, `subcategories`.`name` as subcategories, `global_categories`.`name` as global_categories FROM `orders` 
        INNER JOIN `product` ON `orders`.`product_id` = `product`.`id` 
        INNER JOIN `subcategories` ON `product`.`category` = `subcategories`.`id`
        INNER JOIN `global_categories` ON `subcategories`.`id_global_categorie` = `global_categories`.`id`
        WHERE `orders`.`unique_id` = ? AND `data` >= ? AND `data` <= ?";

    if (!empty($_POST['search'])) {
        $search = $_POST['search'];
        $sql .= " AND (`orders`.`id` LIKE ? OR `product`.`name` LIKE ?)";
        $key = '%' . $search . '%';
        array_push($parameters, $key);
        array_push($parameters, $key);
    }

    $pdo = $db->prepare($sql);
    $pdo->execute($parameters);
    $array = $pdo->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($array);
}