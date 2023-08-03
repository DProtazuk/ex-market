<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/backend/entry_system/EntrySystem.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/backend/MyFunction.php");

require_once($_SERVER['DOCUMENT_ROOT'] . "/backend/DB.php");

$my_function = new MyFunction();
$EntrySystem = new EntrySystem();

$arrayPost = [
    'email'
];

if ($my_function->checking_array_post($arrayPost)) {
    $email = $_POST['email'];

    $link_error = "/page/unauthorized/forgot_your_password?email=" . $email . "&error=";

    $result = $EntrySystem->password_reset($email);

    switch ($result) {
        case "time":
        case "email":
            header('Location: '.$link_error.$result);
            break;
        case "send":
            header('Location: /page/unauthorized/forgot_your_password?status=send');
            break;
    }

    //    switch ($result) {
//        case "password":
//        case "email":
//            header('Location: '.$link_error.$result);
//            break;
//        case "authorization":
//            header('Location: /page/client/main');
//            break;
//    }

//    $sth = $pdo->prepare("SELECT * FROM `user` WHERE `email` = ?");
//    $sth->execute(array($_POST['email']));
//    $array = $sth->fetch(PDO::FETCH_ASSOC);
//
//    if ($array) {
//        $time_start = $array['time'];
//        $time_finish = time();
//
//        $time = $time_finish-$time_start;
//
//        if($array['time'] !== NULL){
//            if($time > 300 ) {
//                send_message($pdo, $array['email'], $array['unique_id']);
//                header('Location: /page/unauthorized/forgot_your_password?status=send');
//            }
//            else {
//                $linkStatus = "time";
//                setcookie("time", $time_start+300, time()+3600, "/");
//                header('Location: ' . $link_error . $linkStatus);
//            }
//        }
//        else {
//            send_message($pdo, $array['email'], $array['unique_id']);
//            header('Location: /page/unauthorized/forgot_your_password?status=send');
//        }
//
//    } else {
//        $linkStatus = "email";
//        header('Location: ' . $link_error . $linkStatus);
//    }
} else {
    header('Location: /page/unauthorized/forgot_your_password?error=info');
}

//function send_message($pdo, $email, $unique_id) {
//    $my_function = new My_function();
//    $hash = $my_function->random_link();
//    $link = "ts/page/unauthorized/return_password?key=".$hash;
//
//    $mail = new PHPMailer();
//    $mail->CharSet = 'UTF-8';
//    $mail->ContentType = "text/html";
//
//// Настройки SMTP
//    $mail->isSMTP();
//    $mail->SMTPAuth = true;
//
//    $mail->Host = 'ssl://smtp.rambler.ru';
//    $mail->Port = 465;
//    $mail->Username = 'exmrkt';
//    $mail->Password = 'qwrwesdfs21321Q';
//    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
//
//// От кого
//    $mail->setFrom('exmrkt@rambler.ru', 'EX_MRKT');
//
//// Кому
//    $mail->addAddress($email);
//
//// Тема письма
//    $mail->Subject = "Возврат пароля";
//
//// Тело письма
//    $body = '<p><strong>Ваша ссылка для восстановления пароля: <a href="'.$link.'">Ссылка</a> </strong></p>';
//    $mail->msgHTML($body);
//
//    $mail->send();
//
//
//    $sth = $pdo->prepare("UPDATE `user` SET `link` = :link, `time` = :time WHERE `unique_id` = :unique_id");
//    $sth->execute(array(
//        'unique_id' => $unique_id,
//        'link' => $hash,
//        'time' => time()
//    ));
//}