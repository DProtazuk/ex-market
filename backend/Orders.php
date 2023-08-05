<?php

require_once $_SERVER['DOCUMENT_ROOT']."/backend/DB.php";
class Orders
{
    function ReturnOrderNum($id) {
        $stmt = DB::connect()->prepare("SELECT COUNT(*) as count FROM orders WHERE product_id = :product_id");
        $stmt->bindParam(':product_id', $id);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'];
    }
}