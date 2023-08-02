<?php

require_once $_SERVER['DOCUMENT_ROOT']."/backend/DB.php";
require_once $_SERVER['DOCUMENT_ROOT']."/backend/Balance.php";

if(!isset($_POST['amount'])){
    return false;
}
else {
    $amount = $_POST['amount'];
    date_default_timezone_set('Europe/Moscow');

    $sql = "INSERT INTO `balance_history` SET `unique_id` = :unique_id, `data` = :data, `payment_details` = :payment_details, `amount` = :amount,
                              `status` = :status, `type` = :type";

    try {
        $sth = DB::connect()->prepare($sql);
        $sth->execute(array(
            'unique_id' => $_COOKIE['unique_id'],
            'data' => date('Y.m.d'),
            'payment_details' => 'USDT     666vh654gcjtrhhc64cfhkjghjhvf65fhgvyt677877thjb',
            'amount' => $amount,
            'status' => 2,
            'type' => 'coming'
        ));

        $stmt = DB::connect()->prepare("UPDATE balance SET balance_client = balance_client + ? WHERE unique_id = ?");
        $stmt->execute([$amount, $_COOKIE['unique_id']]);

        header('Location: /page/client/balance');

    } catch (PDOException $e){
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}
