<?php require_once $_SERVER['DOCUMENT_ROOT']. "/backend/MyFunction.php";

$MyFunction = new MyFunction();

if($MyFunction->return_role() === "client"){
    header('Location: /page/seller/test.php');
}
?>


<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/backend/DB.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/backend/MyFunction.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/print.php");
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главная</title>
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/link/client/link.php"); ?>
</head>
<body>

<!--Скрытый input активного меню-->

<input type="hidden" class="active_menu" data-type="sidebar" value="menu_sidebar_main"
       data-mini="menu_sidebar_active_uniq_mini">

<!--<input type="hidden" class="active_menu" data-type="sidebar" value="menu_sidebar_analytics" data-mini="menu_sidebar_analytics_mini">-->

<!--<input type="hidden" class="active_menu" data-type="sidebar" value="menu_sidebar_shops" data-mini="menu_sidebar_shops_mini">-->

<!--<input type="hidden" class="active_menu" data-type="sidebar" value="menu_sidebar_product" data-mini="menu_sidebar_product_mini">-->


<div class="col-12 d-flex h-100">
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/markup/components/seller/sidebar.php"); ?>

    <div class="my-content">
        <?php
        $role = new MyFunction();
        $role = $role->return_role(DB::connect());

        if($role === "unauthorized")
            include($_SERVER['DOCUMENT_ROOT'] . "/markup/components/unauthorized/header.php");
        else include($_SERVER['DOCUMENT_ROOT'] . "/markup/components/seller/header.php");
        ?>

        <div class="col-12 content-body">
            <div class="myContainer mx-auto my-2">



            </div>
        </div>
    </div>
</div>

</body>
</html>
