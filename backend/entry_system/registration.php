<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/backend/entry_system/EntrySystem.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/backend/MyFunction.php");

$my_function = new MyFunction();
$EntrySystem = new EntrySystem();


$arrayPost = [
    'name',
    'email',
    'password',
    'second_password'
];


if($my_function->checking_array_post($arrayPost)){

    $link_error = "/page/unauthorized/registration?name=".$_POST['name']."&email=".$_POST['email']."&password=".$_POST['password']."&second_password=".$_POST['second_password']."&error=";


    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $second_password = $_POST['second_password'];

    if(!isset($_POST['second_password'])){
        $referral_program = $_POST['referral_program'];
    }
    else $referral_program = NULL;


    $result = $EntrySystem->registration($name, $email, $password, $second_password, $referral_program);

    switch ($result) {
        case "password":
        case "referral_link":
        case "email":
            header('Location: '.$link_error.$result);
            break;
        case "registration":
            header('Location: /page/client/main');
            break;
    }
}
else header('Location: /page/unauthorized/registration?error=info');


