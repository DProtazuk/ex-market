<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/backend/MyFunction.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/backend/entry_system/EntrySystem.php");

$my_function = new MyFunction();
$EntrySystem = new EntrySystem();


$arrayPost = [
    'password',
    'second_password',
    'link'
];


if ($my_function->checking_array_post($arrayPost)) {
    $link_error = "/page/unauthorized/return_password?key=" . $_POST['link'] . "&error=";

    $password = $_POST['password'];
    $second_password = $_POST['second_password'];
    $link = $_POST['link'];


    $link_error = "/page/unauthorized/return_password?key=" . $link . "&error=";

    $result = $EntrySystem->save_new_password($link, $password, $second_password);

    switch ($result) {
        case "password":
        case "link":
            header('Location: '.$link_error.$result);
            break;
        case "save":
            header('Location: /page/unauthorized/authorization?status=forgot_save');
            break;
    }
}
else header("Location: /page/unauthorized/return_password?key=" . $_POST['link'] . "&error=info");