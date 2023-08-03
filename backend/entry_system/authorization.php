<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/backend/entry_system/EntrySystem.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/backend/MyFunction.php");

$my_function = new MyFunction();
$EntrySystem = new EntrySystem();

$arrayPost = [
    'email',
    'password'
];


if($my_function->checking_array_post($arrayPost)) {

    $link_error = "/page/unauthorized/authorization?email=".$_POST['email']."&password=".$_POST['password']."&error=";

    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $EntrySystem->authorization($email, $password);

    switch ($result) {
        case "password":
        case "email":
            header('Location: '.$link_error.$result);
            break;
        case "authorization":
            header('Location: /page/client/main');
            break;
    }
}
else header('Location: /page/unauthorized/authorization?error=info');
