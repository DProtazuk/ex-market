<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/backend/DB.php");

class Balance
{
    public function create($array) {
        $sth = DB::connect()->prepare("INSERT INTO `balance` SET `unique_id` = :unique_id, `balance_seller` = :balance_seller, `balance_client` = :balance_client, `balance_referral` = :balance_referral");
        $sth->execute($array);
    }

    public function BalanceClient($id) {
        $sth = DB::connect()->prepare("SELECT `balance_client` FROM `balance` WHERE `unique_id` = ?");
        $sth->execute(array($id));
        $sth = $sth->fetch(PDO::FETCH_ASSOC);
        return $sth['balance_client'];
    }

    public function BalanceSeller($id) {
        $sth = DB::connect()->prepare("SELECT `balance_seller` FROM `balance` WHERE `unique_id` = ?");
        $sth->execute(array($id));
        $sth = $sth->fetch(PDO::FETCH_ASSOC);
        return $sth['balance_seller'];
    }

    public function BalanceReferral($id) {
        $sth = DB::connect()->prepare("SELECT `balance_referral` FROM `balance` WHERE `unique_id` = ?");
        $sth->execute(array($id));
        $sth = $sth->fetch(PDO::FETCH_ASSOC);
        return $sth['balance_referral'];
    }
}