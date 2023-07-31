<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once $_SERVER['DOCUMENT_ROOT'] . '/PHPMailer/src/Exception.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/PHPMailer/src/PHPMailer.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/PHPMailer/src/SMTP.php';


require_once($_SERVER['DOCUMENT_ROOT'] . "/backend/DB.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/backend/Balance.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/backend/MyFunction.php");


class EntrySystem
{
    public function authorization($email, $password)
    {
        $db = DB::connect();

        $sth = $db->prepare("SELECT * FROM `user` WHERE `email` = ?");
        $sth->execute(array($email));
        $array = $sth->fetch(PDO::FETCH_ASSOC);

        if ($array) {
            if (password_verify($password, $array['password'])) {
                setcookie("unique_id", $array['unique_id'], time() + 3600, "/");
                setcookie("role", "client", time() + 3600, "/");
                return "authorization";
            } else return "password";
        } else return "email";
    }

    public function registration($name, $email, $password, $second_password, $referral_program)
    {
        $db = DB::connect();
        $my_function = new MyFunction();

        $sth = $db->prepare("SELECT * FROM `user` WHERE `email` = ?");
        $sth->execute(array($email));
        $array = $sth->fetch(PDO::FETCH_ASSOC);

        if ($array) {
            return "email";
        } else {
            if ($password !== $second_password) {
                return "password";
            } else {
                if (empty($_POST['referral_link'])) {
                    $referral_program = NULL;
                    $this->save_registration($name, $email, $password, $referral_program);
                    return "registration";
                } else {
                    $sth = $db->prepare("SELECT * FROM `user` WHERE `referral_link` = ?");
                    $sth->execute(array($_POST['referral_link']));
                    $array = $sth->fetch(PDO::FETCH_ASSOC);

                    if (!$array) {
                        return "referral_link";
                    } else {
                        $referral_program = $_POST['referral_link'];
                        $this->save_registration($name, $email, $password, $referral_program);
                        return "registration";
                    }
                }

            }

        }
    }

    private function save_registration($name, $email, $password, $referral_program){
        $db = DB::connect();

        $my_function = new MyFunction();
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $referral_link = '';
        for ($i = 0; $i < 15; $i++) {
            $referral_link .= $characters[rand(0, strlen($characters) - 1)];
        }

        $unique_id = $my_function->random_unique_id();
        $password = password_hash($password, PASSWORD_DEFAULT);

        $sth = $db->prepare("INSERT INTO `user` SET `unique_id` = :unique_id, `name` = :name, `password` = :password, `email` = :email, `2FA` = NULL, `link` = NULL, `time` = NULL, `referral_link` = :referral_link, `referral_program` = :referral_program");
        $sth->execute(array(
            'unique_id' => $unique_id,
            'name' => $name,
            'password' => $password,
            'email' => $email,
            'referral_link' => $referral_link,
            'referral_program' => $referral_program
        ));

        $sth = $db->prepare("INSERT INTO `role` SET `unique_id` = :unique_id, `client` = :client, `seller` = :seller");
        $sth->execute(array(
            'unique_id' => $unique_id,
            'client' => 1,
            'seller' => 0
        ));


        $arrayBalance = [
            'unique_id'=>$unique_id,
            'balance_seller' => 0,
            'balance_client' => 0,
            'balance_referral' => 0
        ];
        $balance = new Balance();
        $balance->create($arrayBalance);


        setcookie("unique_id", $unique_id, time() + 3600, "/");
        setcookie("referral_link", "", time() - 3600, "/");
        setcookie("role", "client", time() + 3600, "/");
    }



    public function password_reset($email)
    {
        $db = DB::connect();

        $sth = $db->prepare("SELECT * FROM `user` WHERE `email` = ?");
        $sth->execute(array($email));
        $array = $sth->fetch(PDO::FETCH_ASSOC);

        if ($array) {
            $time_start = $array['time'];
            $time_finish = time();

            $time = $time_finish - $time_start;

            if ($array['time'] !== NULL) {
                if ($time > 300) {
                    $this->send_email($email, $array['unique_id']);
                    return "send";
                } else {
                    setcookie("time", $time_start + 300, time() + 3600, "/");
                    return "time";
                }
            } else {
                $this->send_email($email, $array['unique_id']);
                return "send";
            }

        } else return "email";
    }


    private function send_email($email, $unique_id)
    {
        $db = DB::connect();

        $my_function = new MyFunction();
        $hash = $my_function->random_link();
        $link = "ts/page/unauthorized/return_password?key=" . $hash;

        $mail = new PHPMailer();
        $mail->CharSet = 'UTF-8';
        $mail->ContentType = "text/html";

// Настройки SMTP
        $mail->isSMTP();
        $mail->SMTPAuth = true;

        $mail->Host = 'ssl://smtp.rambler.ru';
        $mail->Port = 465;
        $mail->Username = 'exmrkt';
        $mail->Password = 'qwrwesdfs21321Q';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

// От кого
        $mail->setFrom('exmrkt@rambler.ru', 'EX_MRKT');

// Кому
        $mail->addAddress($email);

// Тема письма
        $mail->Subject = "Возврат пароля";

// Тело письма
        $body = '<p><strong>Ваша ссылка для восстановления пароля: <a href="' . $link . '">Ссылка</a> </strong></p>';
        $mail->msgHTML($body);

        $mail->send();


        $sth = $db->prepare("UPDATE `user` SET `link` = :link, `time` = :time WHERE `unique_id` = :unique_id");
        $sth->execute(array(
            'unique_id' => $unique_id,
            'link' => $hash,
            'time' => time()
        ));
    }

    public function save_new_password($link, $password, $second_password)
    {
        $db = DB::connect();

        $sth = $db->prepare("SELECT * FROM `user` WHERE `link` = ?");
        $sth->execute(array($link));
        $array = $sth->fetch(PDO::FETCH_ASSOC);

        if ($array) {
            $time_start = $array['time'];
            $time_finish = time();

            $time = $time_finish - $time_start;

            if ($array['time'] !== NULL) {
                if ($time < 300) {
                    if ($password === $second_password) {
                        $password = password_hash($password, PASSWORD_DEFAULT);

                        $sth = $db->prepare("UPDATE `user` SET  `password` = :password, `time` = NULL, `link` = NULL WHERE `link` = :link");
                        $sth->execute(array(
                            'link' => $link,
                            'password' => $password
                        ));
                        return "save";
                    } else return "password";
                } else return "link";

            } else return "link";
        } else return "link";
    }
}