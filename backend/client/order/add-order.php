<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/backend/DB.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/backend/Product.php";

function CheckProduct()
{
    if (isset($_POST['id'])) {
        $product = new Product();
        $product = $product->selectOneProduct($_POST['id']);

        if ($product) {
            return $product;
        } else return false;
    } else return false;
}

if (isset($_COOKIE['unique_id'])) {
    $sth = DB::connect()->prepare("SELECT `user`.`referral_program`, `balance`.`balance_client` FROM `user` 
        INNER JOIN `balance` ON `user`.`unique_id` = `balance`.`unique_id` 
         WHERE `user`.`unique_id` = ?");

    $sth->execute(array($_COOKIE['unique_id']));
    $ArrayUser = $sth->fetch(PDO::FETCH_ASSOC);

    //Проверка наличия клиента
    if ($ArrayUser) {
        //Проверка наличия продукта
        if (CheckProduct()) {
            $product = CheckProduct();

            $price = $product['price'];
            $discount = $product['discount'];

            if($discount) {
                $price = $price-($price/100)*$discount;
            }


            $quantity = $_POST['quantity'];
            //Проверка наличия колличества
            if ($product['quantity'] >= $quantity) {
                //Проверка Баланса
                if ($ArrayUser['balance_client'] >= $price * $quantity) {

                    //Изменить статус у аккаунтов
                    {
                        $db = DB::connect();
                        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

                        $parameters = [];
                        array_push($parameters, "acquired");
                        array_push($parameters, "new");
                        array_push($parameters, $quantity);

                        $sql = "UPDATE `accounts` SET `status` = ? WHERE `status` = ? LIMIT ?";
                        $stmt = $db->prepare($sql);
                        $stmt->execute($parameters);
                    }

                    //Добавить запись в таблицы заказов
                    {
                        $amount = $quantity * $price;

                        $sth = $db->prepare("INSERT INTO `orders` SET `unique_id` = :unique_id, `product_id` = :product_id, `price` = :price, `amount` = :amount, `quantity` = :quantity, `data` = :data");
                        $sth->execute(array(
                            'unique_id' => $_COOKIE['unique_id'],
                            'product_id' => $product['id'],
                            'price' => $price,
                            'amount' => $amount,
                            'quantity' => $quantity,
                            'data' => date('Y.m.d')
                        ));
                        $id_order = $db->lastInsertId();
                    }

                    //Добавить в связь купленных аккаунтов
                    {
                        $sql = "SELECT `id` FROM `accounts` WHERE `id_product` = ? AND `status` = ? LIMIT ?";
                        $sth = $db->prepare($sql);
                        $sth->execute(array($product['id'], "acquired", $quantity));
                        $array = $sth->fetchAll(PDO::FETCH_ASSOC);

                        $sql = "INSERT INTO `account_on_order` (`product_id`, `account_id`, `order_id`) VALUES ";

                        $parameters = [];

                        foreach ($array as $item) {
                            $sql .= "(?, ?, ?), ";

                            array_push($parameters, $product['id']);
                            array_push($parameters, $item['id']);
                            array_push($parameters, $id_order);
                        }
                        $sql = rtrim($sql);
                        $sql = substr($sql, 0, -1);

                        $sth = $db->prepare($sql);
                        $sth->execute($parameters);
                    }

                    //Изменить колличество товара
                    {
                        $stmt = $db->prepare("UPDATE product SET quantity = quantity - ? WHERE id = ?");
                        $stmt->execute([$quantity, $product['id']]);
                    }

                    //Добавить в историю баланса
                    {
                        $sql = "INSERT INTO `balance_history` SET `unique_id` = :unique_id, `data` = :data, `payment_details` = :payment_details, `amount` = :amount,
                              `status` = :status, `type` = :type";

                        $sth = DB::connect()->prepare($sql);
                        $sth->execute(array(
                            'unique_id' => $_COOKIE['unique_id'],
                            'data' => date('Y.m.d'),
                            'payment_details' => 'USDT     666vh654gcjtrhhc64cfhkjghjhvf65fhgvyt677877thjb',
                            'amount' => $amount,
                            'status' => 2,
                            'type' => 'expenditure'
                        ));
                    }

                    //Изменить баланс
                    {
                        $stmt = DB::connect()->prepare("UPDATE balance SET balance_client = balance_client - ? WHERE unique_id = ?");
                        $stmt->execute([$amount, $_COOKIE['unique_id']]);
                    }

                } else {

                }
            } else {

            }
        } else {

        }

    } else {

    }
}

function Referal()
{

}