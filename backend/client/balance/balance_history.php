<?php

require_once $_SERVER['DOCUMENT_ROOT']."/backend/DB.php";

$start = $_POST['start'];
$start = date('Y-m-d', strtotime($start));

$finish = $_POST['finish'];
$finish = date('Y-m-d', strtotime($finish));


$type = $_POST['type'];

$sql = "SELECT `status`.`name`, `balance_history`.`data`, `balance_history`.`payment_details`, `balance_history`.`amount` FROM `balance_history` INNER JOIN `status` ON `balance_history`.`status` = `status`.`id` WHERE data >= :start_date AND data <= :end_date AND `type` = :type AND `balance_history`.`unique_id` = :unique_id";
$stmt = DB::connect()->prepare($sql);


// Выполнение запроса и получение результатов
$stmt->execute(array(
    "start_date" => $start,
    "end_date" => $finish,
    "type" => $type,
    "unique_id" => $_COOKIE['unique_id']
));
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($results);