<?php

require_once $_SERVER['DOCUMENT_ROOT']."/backend/DB.php";

class ReferralProgram
{
    public function NumberOfReferrals() {
        $unique_id = $_COOKIE['unique_id'];
        $sql = "SELECT `referral_link` FROM `user` WHERE `unique_id` = ?";
        $array = DB::connect()->prepare($sql);
        $array->execute(array($unique_id));
        $array = $array->fetch(PDO::FETCH_ASSOC);
        $referral_link = $array['referral_link'];

        $sql = "SELECT * FROM `user` WHERE `referral_program` = ?";
        $array = DB::connect()->prepare($sql);
        $array->execute(array($referral_link));
        $array = $array->fetchAll(PDO::FETCH_ASSOC);
        return count($array);
    }

    public function ReturnReferralBalance() {
        $unique_id = $_COOKIE['unique_id'];
        $sql = "SELECT `balance_referral` FROM `balance` WHERE `unique_id` = ?";
        $array = DB::connect()->prepare($sql);
        $array->execute(array($unique_id));
        $array = $array->fetch(PDO::FETCH_ASSOC);
        return $array['balance_referral'];
    }

    public function ReturnReferralLink() {
        $unique_id = $_COOKIE['unique_id'];
        $sql = "SELECT `referral_link` FROM `user` WHERE `unique_id` = ?";
        $array = DB::connect()->prepare($sql);
        $array->execute(array($unique_id));
        $array = $array->fetch(PDO::FETCH_ASSOC);
        return $array['referral_link'];
    }
}