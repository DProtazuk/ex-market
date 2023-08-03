<?php
if (empty($_GET['id'])) {
    header('Location: /page/client/product/products');
}
?>

<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/backend/DB.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/backend/MyFunction.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/backend/Product.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/backend/Favorite.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/print.php");

$role = new MyFunction();
$MyFunction = new MyFunction();
$product = new Product();
$array = $product->selectWhiteProduct($_GET['id']);

$arrayProduct = $array['arrayProduct'];
$arrayparameter_table = $array['arrayparameter_table'];

if (!$arrayProduct) {
    header('Location: /page/client/product/products');
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Товар №<?php echo $_GET['id']; ?></title>
    <link rel="icon" href="/favicon.svg">
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/link/client/link.php"); ?>
</head>
<body>

<!--Скрытый input активного меню-->

<!--<input type="hidden" class="active_menu" data-type="sidebar" value="menu_sidebar_main" data-mini="menu_sidebar_active_uniq_mini">-->

<!--<input type="hidden" class="active_menu" data-type="sidebar" value="menu_sidebar_analytics" data-mini="menu_sidebar_analytics_mini">-->

<!--<input type="hidden" class="active_menu" data-type="sidebar" value="menu_sidebar_shops" data-mini="menu_sidebar_shops_mini">-->

<input type="hidden" class="active_menu" data-type="sidebar" value="menu_sidebar_product"
       data-mini="menu_sidebar_product_mini">


<!--Скрытый input Шапки меню-->
<!--<input type="hidden" class="active_menu" data-type="header" value="a-header-orders">-->
<!--<input type="hidden" class="active_menu" data-type="header" value="a-header-balance">-->
<!--<input type="hidden" class="active_menu" data-type="header" value="a-header-favorites">-->
<!--<input type="hidden" class="active_menu" data-type="header" value="a-header-return_product">-->
<!--<input type="hidden" class="active_menu" data-type="header" value="a-header-referral_program">-->


<div class="col-12 d-flex h-100">
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/markup/components/client/sidebar.php"); ?>

    <div class="my-content">
        <?php

        $role = $role->return_role(DB::connect());

        if ($role === "unauthorized")
            include($_SERVER['DOCUMENT_ROOT'] . "/markup/components/unauthorized/header.php");
        else include($_SERVER['DOCUMENT_ROOT'] . "/markup/components/client/header.php");
        ?>
        <div class="col-12 content-body">
            <div class="myContainer mx-auto my-2">

                <div class="col-12 d-flex justify-content-between my-4">
                    <div class="col-4 rounded-4">
                        <div class="col-12 position-relative">
                            <!--                            <img src="/res/img/img-category/-->
                            <?php //echo $arrayProduct['img'] ?><!--"-->
                            <!--                                 class="position-absolute fixed_product_img_category">-->
                            <img style="max-height: 270px !important; min-height: 270px !important; object-fit: cover;"
                                 class="col-12 rounded-4"
                                 src="/res/img/imgProducts/<?php echo $arrayProduct['cover'] ?>">
                        </div>
                    </div>

                    <div class="col-8 d-flex justify-content-end">
                        <div class="w-95 bg-silver rounded-4 px-4">
                            <div class="col-12 mx-auto">
                                <h6 class="text-white mt-4 py-1 col-10 text-16" style="line-height: 20px !important;">
                                    <?php echo $arrayProduct['name'] ?> </h6>

                                <div class="col-12 d-flex  mt-3 py-1">

                                    <?php
                                    $num = count($arrayparameter_table);

                                    $half = (int)($num / 2); // целая часть от деления на 2
                                    $remainder = $num - $half * 2; // остаток от деления на 2

                                    if ($remainder !== 0) {
                                        if ($remainder == 1) {
                                            $half1 = $half + 1; // первое число больше
                                            $half2 = $half; // второе число меньше
                                        } else {
                                            $half1 = $half; // первое число меньше или равно второму
                                            $half2 = $half + 1; // второе число больше
                                        }
                                    } else {
                                        $half1 = $half; // первое число меньше или равно второму
                                        $half2 = $half; // второе число больше
                                    }
                                    ?>

                                    <div class="col-3">
                                        <?php
                                        for ($i = 0; $i < $half2; $i++) {
                                            echo '<h6 class="text-14 my-2">' . $arrayparameter_table[$i]['name'] . '</h6>';
                                        }
                                        ?>


                                    </div>

                                    <div class="col-3 mx-4">
                                        <?php
                                        for ($i = $half2; $i < $num; $i++) {
                                            echo '<h6 class="text-14 my-2">' . $arrayparameter_table[$i]['name'] . '</h6>';
                                        }
                                        ?>
                                    </div>

                                    <div class="col-4 mx-1">
                                        <div class="col-12 d-flex">
                                            <h6 class="text-14 d-flex col-6 mt-2">Цена</h6><h6
                                                    class="mx-1 mt-2"><?php echo $arrayProduct['price'] ?> ₽</h6>
                                        </div>

                                        <div class="col-12 d-flex">
                                            <h6 class="text-14 d-flex col-6">В наличии</h6><h6
                                                    class="mx-1"><?php echo $arrayProduct['quantity']; ?>
                                                шт.</h6>
                                        </div>

                                        <div class="col-12 d-flex">
                                            <h6 class="text-14 d-flex col-6">Продано</h6><h6 class="mx-1">1689 шт.</h6>
                                        </div>

                                        <div class="col-12 d-flex mt-2 mb-3">
                                            <?php
                                            if ($role === "unauthorized") {
                                                echo '<a href="/page/unauthorized/registration.php" class="btn text-white lh-1 col-6 my-auto text-16 bg-transparent border-secondary border-0 bg_blue text-center">
                                                Купить
                                            </a>';
                                            } else {
                                                echo '<button data-bs-toggle="modal" data-bs-target="#purchaseModal" class="btn text-white lh-1 col-6 my-auto text-16 bg-transparent border-secondary border-0 bg_blue text-center">
                                                Купить
                                            </button>';
                                            }
                                            ?>

                                            <?php
                                            if ($role !== "unauthorized") {
                                                ?>
                                                <div class="mx-2 rounded-2 cursor" style="border: 1px solid #1877F2;">

                                                    <?php
                                                    $favorite = new Favorite();
                                                    if ($favorite->check($_GET['id'])) {
                                                        echo '<div data-id=' . $arrayProduct['id'] . ' class="delete-to-favorites">
                                                    <svg class="m-1" version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22" width="20" height="20">
                                                        <title>h-svg</title>
                                                        <defs>
                                                            <image  width="22" height="20" id="img1" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAUCAMAAAC+oj0CAAAAAXNSR0IB2cksfwAAANtQTFRFGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfygts5ngAAAEl0Uk5TACyowKtSKXevmjcCpf8TD7WTCPb+9fj9/JdA8/Sf4unv2+vQ6ufNkY82M7axLfchlvlw1fIa2tELzvDJDcX7+gd6gjLW3TCVhaA6YQUAAADLSURBVHicZZDZVsJAEEQLA8pWUaDNDBhF9lWURcGVHf3/LyIhxEByn2ru6dNnqgEgdmEY8YQTcHmVNFJpNyGT5YGkeX3jpVze0TkWhBThrUUqUisWgRLvvBlhQBpxZfsP0X64x0OZER4rsFVUqypq9ahuNNGKWrKNDnVYCrtAT8m5VdJ36jyFx63Bs9v+hcNzPzocJT+WyantweP1LWhucTo7apjv+sP/xKeJf76+3dvxZ87sAidkltrWw4KsEGK9Ibe7sHUW/f4FC/YX+BmUB15izgAAAABJRU5ErkJggg=="/>
                                                        </defs>
                                                        <style>
                                                        </style>
                                                        <use id="Layer" href="#img1" x="0" y="1"/>
                                                    </svg>
                                                </div> 
                                                <div data-id="' . $arrayProduct['id'] . '" class="add-to-favorites  d-none">
                                                    <svg class="m-1" width="20" height="20" viewBox="0 0 22 20" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                              d="M13.0109 0.965066C13.0109 0.965066 11.7849 1.61787 11 2.67185C11 2.67185 10.2151 1.61787 8.98914 0.965066C8.98914 0.965066 7.06619 -0.0588944 4.92992 0.36836C4.92992 0.36836 2.79364 0.795615 1.41245 2.4804C1.41245 2.4804 0.03125 4.16519 0.03125 6.34378C0.03125 6.34378 0.03125 11.022 5.37834 15.8344C5.37834 15.8344 7.00766 17.3008 8.95929 18.6149C8.95929 18.6149 9.93912 19.2747 10.603 19.6464C10.8497 19.7846 11.1503 19.7846 11.3971 19.6464C11.3971 19.6464 12.0637 19.2729 13.044 18.6127C13.044 18.6127 14.9957 17.2982 16.6246 15.8317C16.6246 15.8317 21.9688 11.0207 21.9688 6.34377C21.9688 6.34377 21.9688 4.16519 20.5876 2.4804C20.5876 2.4804 19.2064 0.795615 17.0701 0.36836C17.0701 0.36836 14.9338 -0.0588941 13.0109 0.965066ZM8.22537 2.39939C8.22537 2.39939 9.63553 3.15029 10.25 4.62502C10.3324 4.82285 10.4897 4.9801 10.6876 5.06255L10.6904 5.06371C10.8885 5.14531 11.1112 5.14542 11.3094 5.06383L11.3125 5.06252C11.5103 4.9801 11.6676 4.82285 11.75 4.62502C11.75 4.62502 12.3645 3.15029 13.7746 2.39939C13.7746 2.39939 15.1848 1.64848 16.7514 1.9618C16.7514 1.9618 18.318 2.27512 19.3309 3.51064C19.3309 3.51064 20.3438 4.74615 20.3438 6.34377C20.3438 6.34377 20.3438 10.2971 15.5374 14.624C15.5374 14.624 13.9933 16.0142 12.1363 17.2648C12.1363 17.2648 11.4911 17.6994 11 17.9966C11 17.9966 10.5107 17.7005 9.86689 17.267C9.86689 17.267 8.00991 16.0166 6.46541 14.6266C6.46541 14.6266 1.65625 10.2983 1.65625 6.34378C1.65625 6.34378 1.65625 4.74615 2.66913 3.51064C2.66913 3.51064 3.682 2.27512 5.24861 1.9618C5.24861 1.9618 6.81521 1.64848 8.22537 2.39939Z"
                                                              fill="#1877F2"/>
                                                    </svg>
                                                </div>';
                                                    } else {
                                                        echo '<div data-id=' . $arrayProduct['id'] . ' class="delete-to-favorites d-none">
                                                    <svg class="m-1" version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22" width="20" height="20">
                                                        <title>h-svg</title>
                                                        <defs>
                                                            <image  width="22" height="20" id="img1" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAUCAMAAAC+oj0CAAAAAXNSR0IB2cksfwAAANtQTFRFGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfyGHfygts5ngAAAEl0Uk5TACyowKtSKXevmjcCpf8TD7WTCPb+9fj9/JdA8/Sf4unv2+vQ6ufNkY82M7axLfchlvlw1fIa2tELzvDJDcX7+gd6gjLW3TCVhaA6YQUAAADLSURBVHicZZDZVsJAEEQLA8pWUaDNDBhF9lWURcGVHf3/LyIhxEByn2ru6dNnqgEgdmEY8YQTcHmVNFJpNyGT5YGkeX3jpVze0TkWhBThrUUqUisWgRLvvBlhQBpxZfsP0X64x0OZER4rsFVUqypq9ahuNNGKWrKNDnVYCrtAT8m5VdJ36jyFx63Bs9v+hcNzPzocJT+WyantweP1LWhucTo7apjv+sP/xKeJf76+3dvxZ87sAidkltrWw4KsEGK9Ibe7sHUW/f4FC/YX+BmUB15izgAAAABJRU5ErkJggg=="/>
                                                        </defs>
                                                        <style>
                                                        </style>
                                                        <use id="Layer" href="#img1" x="0" y="1"/>
                                                    </svg>
                                                </div> 
                                                <div data-id="' . $arrayProduct['id'] . '" class="add-to-favorites">
                                                    <svg class="m-1" width="20" height="20" viewBox="0 0 22 20" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                              d="M13.0109 0.965066C13.0109 0.965066 11.7849 1.61787 11 2.67185C11 2.67185 10.2151 1.61787 8.98914 0.965066C8.98914 0.965066 7.06619 -0.0588944 4.92992 0.36836C4.92992 0.36836 2.79364 0.795615 1.41245 2.4804C1.41245 2.4804 0.03125 4.16519 0.03125 6.34378C0.03125 6.34378 0.03125 11.022 5.37834 15.8344C5.37834 15.8344 7.00766 17.3008 8.95929 18.6149C8.95929 18.6149 9.93912 19.2747 10.603 19.6464C10.8497 19.7846 11.1503 19.7846 11.3971 19.6464C11.3971 19.6464 12.0637 19.2729 13.044 18.6127C13.044 18.6127 14.9957 17.2982 16.6246 15.8317C16.6246 15.8317 21.9688 11.0207 21.9688 6.34377C21.9688 6.34377 21.9688 4.16519 20.5876 2.4804C20.5876 2.4804 19.2064 0.795615 17.0701 0.36836C17.0701 0.36836 14.9338 -0.0588941 13.0109 0.965066ZM8.22537 2.39939C8.22537 2.39939 9.63553 3.15029 10.25 4.62502C10.3324 4.82285 10.4897 4.9801 10.6876 5.06255L10.6904 5.06371C10.8885 5.14531 11.1112 5.14542 11.3094 5.06383L11.3125 5.06252C11.5103 4.9801 11.6676 4.82285 11.75 4.62502C11.75 4.62502 12.3645 3.15029 13.7746 2.39939C13.7746 2.39939 15.1848 1.64848 16.7514 1.9618C16.7514 1.9618 18.318 2.27512 19.3309 3.51064C19.3309 3.51064 20.3438 4.74615 20.3438 6.34377C20.3438 6.34377 20.3438 10.2971 15.5374 14.624C15.5374 14.624 13.9933 16.0142 12.1363 17.2648C12.1363 17.2648 11.4911 17.6994 11 17.9966C11 17.9966 10.5107 17.7005 9.86689 17.267C9.86689 17.267 8.00991 16.0166 6.46541 14.6266C6.46541 14.6266 1.65625 10.2983 1.65625 6.34378C1.65625 6.34378 1.65625 4.74615 2.66913 3.51064C2.66913 3.51064 3.682 2.27512 5.24861 1.9618C5.24861 1.9618 6.81521 1.64848 8.22537 2.39939Z"
                                                              fill="#1877F2"/>
                                                    </svg>
                                                </div>';
                                                    }

                                                    ?>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 rounded-4 bg-silver px-4 py-3 my-4">
                    <a href="" class="text-white text-decoration-none opacity-50 text-14">Шопы</a>
                    <a href=""
                       class="text-white text-decoration-none opacity-50 mx-5 text-14"><?php echo $arrayProduct['global_categories']; ?></a>
                    <a href=""
                       class="text-white text-decoration-none opacity-50 text-14"><?php echo $arrayProduct['name']; ?></a>
                </div>

                <div class="col-12 rounded-4 bg-silver px-4 py-4 my-4 text-14 Regular">
                    <?php echo $arrayProduct['description'] ?>
                </div>

                <div class="col-12 d-flex justify-content-between my-5">
                    <div class="col-8 rounded-4 bg-silver p-3 px-4 ">
                        <div class="d-flex">
                            <h6 class="text-white text-16 mt-2">Отзывы</h6>
                        </div>


                        <div class="col-9 mt-3">
                            <div class="col-12 d-flex">
                                <div class="d-flex col-6">
                                    <img src="/res/img/elipse.png" width="29" height="29">
                                    <h6 class="text-15 my-auto mx-3">Имя пользователя</h6>
                                </div>

                                <div class="col-5 d-flex align-items-center">
                                    <h6 class="my-auto text-15 mx-3">Оценка</h6>
                                    <h6 class="my-auto text-15">5.0</h6>

                                    <div class="d-flex col-3 mx-1 my-auto mx-1">
                                        <img class="w-22 my-auto" src="/res/img/star.png">
                                        <img class="w-22" src="/res/img/star.png">
                                        <img class="w-22" src="/res/img/star.png">
                                        <img class="w-22" src="/res/img/star.png">
                                        <img class="w-22" src="/res/img/star.png">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 my-2 mt-4">
                                <h6 class="text-white-75 text-15 my-3">Достоинства:</h6>
                                <p class="text-14 text-white-75 Regular">Зарегистрирован на реальный индийский номер (в
                                    случае чека смс не выдаю)
                                    Прокси регистрации Мобильные ИндияПол женскийИмя на латиницеТокена нет
                                    Рекламного кабинета нет
                                </p>
                            </div>

                            <div class="col-12 my-2 mt-4">
                                <h6 class="text-white-75 text-15 my-3">Недостатки:</h6>
                                <p class="text-14 text-white-75 Regular">Зарегистрирован на реальный индийский номер (в
                                    случае чека смс не выдаю)
                                    Прокси регистрации Мобильные ИндияПол женскийИмя на латиницеТокена нет
                                    Рекламного кабинета нет
                                </p>
                            </div>

                            <div class="col-12 my-2 mt-4">
                                <h6 class="text-white-75 text-15 my-3">Комментарий:</h6>
                                <p class="text-14 text-white-75 Regular">Зарегистрирован на реальный индийский номер (в
                                    случае чека смс не выдаю)
                                    Прокси регистрации Мобильные ИндияПол женскийИмя на латиницеТокена нет
                                    Рекламного кабинета нет
                                </p>
                            </div>
                        </div>

                    </div>

                    <div class="col-4 d-flex justify-content-end">
                        <div class="col-10">
                            <div class="col-12 rounded-4 bg-silver px-5 py-4 mb-4">

                                <?php
                                if ($role !== "unauthorized") {
                                    echo '<button class="mx-auto text-dark fs-6 rounded-3 mb-4 border_blue bg-transparent text-white py-1 d-block">
                                    &nbsp; Оставить отзыв &nbsp;
                                </button>';
                                }
                                ?>

                                <div class="col-8 mx-auto d-flex align-items-center">
                                    <h6 class="my-auto text-14 mx-3">Оценка</h6>
                                    <h6 class="my-auto text-14"><?php
                                        if ($arrayProduct['product_fake_rating'] === "0") {
                                            echo $arrayProduct['product_rating'];
                                        } else echo $arrayProduct['product_fake_rating'];
                                        ?></h6>

                                    <div class="d-flex col-8 mx-1 my-auto mx-1">
                                        <img class="w-22 my-auto" src="/res/img/star.png">
                                    </div>
                                </div>

                                <div class="col-12 d-flex my-2 mt-3 justify-content-around">
                                    <div class="d-flex col-4 mx-1 my-auto">
                                        <img class="w-22 my-auto" src="/res/img/star.png">
                                        <img class="w-22" src="/res/img/star.png">
                                        <img class="w-22" src="/res/img/star.png">
                                        <img class="w-22" src="/res/img/star.png">
                                        <img class="w-22" src="/res/img/star.png">
                                    </div>

                                    <h6 class="my-auto mx-3 text-12">250 отзывов</h6>
                                </div>

                                <div class="col-12 d-flex my-2 justify-content-around">
                                    <div class="d-flex col-4 mx-1 my-auto">
                                        <img class="w-22 my-auto" src="/res/img/star.png">
                                        <img class="w-22" src="/res/img/star.png">
                                        <img class="w-22" src="/res/img/star.png">
                                        <img class="w-22" src="/res/img/star.png">
                                        <img class="w-22" src="/res/img/star.png">
                                    </div>

                                    <h6 class="my-auto mx-3 text-12">50 отзывов</h6>
                                </div>

                                <div class="col-12 d-flex my-2 justify-content-around">
                                    <div class="d-flex col-4 mx-1 my-auto">
                                        <img class="w-22 my-auto" src="/res/img/star.png">
                                        <img class="w-22" src="/res/img/star.png">
                                        <img class="w-22" src="/res/img/star.png">
                                        <img class="w-22" src="/res/img/star.png">
                                    </div>

                                    <h6 class="my-auto mx-3 text-12">250 отзывов</h6>
                                </div>

                                <div class="col-12 d-flex my-2 justify-content-around">
                                    <div class="d-flex col-4 mx-1 my-auto">
                                        <img class="w-22 my-auto" src="/res/img/star.png">
                                        <img class="w-22" src="/res/img/star.png">
                                        <img class="w-22" src="/res/img/star.png">
                                    </div>

                                    <h6 class="my-auto mx-3 text-12">50 отзывов</h6>
                                </div>
                            </div>

                            <div class="col-12 rounded-4 bg-silver px-5 py-2" style="min-height: 400px">

                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-12 d-flex justify-content-between my-4 rounded-4 bg-silver" style="min-height: 250px;">

                </div>

                <div class="col-12 rounded-4 bg-silver p-4">
                    <div class="col-12 d-flex justify-content-between align-items-center">
                        <div class="d-flex">
                            <h6 class="text-white text-16 my-auto">Похожие товары</h6>
                        </div>

                        <div class="dropdown">
                                <span class="text-white d-block text-14 fw-bolder cursor" id="dropdownMenuButton3"
                                      data-bs-toggle="dropdown" aria-expanded="false">&bull;&bull;&bull;</span>
                            <ul class="dropdown-menu dropdown-menu-dark border-light border-opacity-25"
                                aria-labelledby="dropdownMenuButton3">
                                <li><a class="dropdown-item active_point_menu" href="#">Категория</a></li>
                                <li><a class="dropdown-item" href="#">Категория</a></li>
                            </ul>
                        </div>
                    </div>


                    <div class="col-12 mx-auto carousel-product my-5">
                        <div class="col-12 d-flex flex-wrap justify-content-between">
                        </div>

                        <div class="col-12 d-flex flex-wrap justify-content-between">
                        </div>

                        <div class="col-12 d-flex flex-wrap justify-content-between">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js"></script>
<script src="/js/client/product.js"></script>

<script>

    $(function () {

        $('.carousel-product').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 2000,
            arrows: false,
            dots: true,
        });

        $(".div-product")
            .on("mouseover", function () {
                $(this).css("min-height", "329px");
                $(this).css("max-height", "329px");

                $(this).find(".div-product-description").css("margin-top", "97px");

                $(this).find(".div_none").css("height", "73px");
                $(this).find(".div-product-h6").css("max-height", "50px");
                $(this).find(".div-product-h6").css("overflow", "hidden");

                $(this).find(".div-product-img .div-product-img-img").css("transform", "scale(1.3)");
                $(this).find(".div-product-description").css("background", "#343434");
            })
            .on("mouseout", function () {
                $(this).css("min-height", "314px");
                $(this).css("max-height", "314px");

                $(this).find(".div_none").css("height", "88px");

                $(this).find(".div-product-description").css("margin-top", "82px");
                $(this).find(".div-product-h6").css("max-height", "35px");
                $(this).find(".div-product-h6").css("overflow", "hidden");

                $(this).find(".div-product-img img").css("transform", "scale(1)");
                $(this).find(".div-product-description").css("background", "transparent");
            });
    });
</script>

</body>
</html>

<!-- Modal -->
<div class="modal fade" id="purchaseModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="purchaseModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-transparent text-white">
            <div class="modal-header modal_bg border-0 p-0">
                <div class="col-11 m-auto p-0 mt-5 my-3 border-bottom border-white border-2 border-opacity-10">
                    <h1 class="fs-5 fw-bold">Купить товар</h1>
                </div>
            </div>
            <div class="modal-body modal_bg p-0 border-0 rounded-bottom">
                <div class="col-11 m-auto p-0">
                    <p class="text-14 my-fw opacity-75 copy_product_id">ID <?php echo $arrayProduct['id'] ?></p>
                    <p class="text-14 opacity-75 copy_product_name"><?php echo $arrayProduct['name'] ?></p>

                    <div class="d-flex col-12">
                        <div class="col-4">
                            <input type="hidden" id="max-quantity" value="<?php echo $arrayProduct['quantity'] ?>">
                            <input type="hidden" id="price" value="<?php echo $arrayProduct['price'] ?>">
                            <input type="hidden" id="discount" value="<?php echo $arrayProduct['discount'] ?>">


                            <p class="text-14 opacity-75 text-light fw-light copy_product_quantity">В
                                наличии <?php echo $arrayProduct['quantity'] ?> шт.</p>
                            <p class="text-14 opacity-75 copy_product_price">Цена <?php echo $arrayProduct['price']; ?>
                                ₽</p>
                        </div>
                        <div>
                            <p class="text-14 opacity-75 text-light fw-light">Рейтинг
                                <?php
                                if ($arrayProduct['product_fake_rating'] !== NULL) {
                                    echo $arrayProduct['product_fake_rating'];
                                } else  echo $arrayProduct['product_rating'];
                                ?>
                            </p>

                            <div class="d-flex justify-content-center">
                                <?php
                                if ($arrayProduct['product_fake_rating'] !== NULL) {
                                    echo $MyFunction->create_ratingShop($arrayProduct['product_fake_rating']);
                                } else  echo $MyFunction->create_ratingShop($arrayProduct['product_rating']);
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex col-12 m-auto align-items-center mt-4">
                        <div class="d-flex align-items-center col-4">
                            <h6 class="text-white text-14 fw-bolder d-block my-auto">Количество </h6>
                        </div>
                        <input type="number" id="quantity" oninput="ChekInputAmount()" max="10" class="col-4 text-white border-0 input-price-seller px-3">
                    </div>

                    <div class="d-flex col-12 m-auto align-items-center my-3">
                        <div class="d-flex align-items-center col-4">
                            <h6 class="text-white text-14 fw-bolder d-block my-auto">Купон </h6>
                        </div>

                        <input id="name" name="name" class="col-4 text-white border-0 input-price-seller px-3">
                    </div>

                    <?php
                    if ($arrayProduct['discount'] !== 0) {
                        echo '<div class="d-flex col-12 m-auto align-items-center my-3">
                        <div class="d-flex align-items-center col-4">
                            <h6 class="text-white text-14 fw-bolder d-block my-auto">Скидка </h6>
                        </div>

                        <div class="d-flex align-items-center col-3">
                            <h6 class="text-white text-14 fw-bolder d-block my-auto">' . $arrayProduct['discount'] . '%</h6>
                        </div>
                    </div>';
                    }
                    ?>

                    <div class="d-flex col-12 m-auto align-items-center my-3">
                        <div class="d-flex align-items-center col-4">
                            <h6 class="text-white text-14 fw-bolder d-block my-auto">Сумма </h6>
                        </div>

                        <div class="d-flex align-items-center col-3">
                            <h6 class="text-white text-14 fw-bolder d-block my-auto span-amount">0 ₽</h6>
                        </div>
                    </div>

                    <div class="col-12 m-auto d-flex py-3">
                        <button onclick="Purchase()" id="save_order" data-id="" type="button"
                                class="btn bg_blue fw-bold small_shadow col-2 text-white button_loading_modal">Купить
                        </button>
                        <button type="button" class="btn btn-dg-danger fw-bold small_shadow col-2 mx-4 text-white "
                                data-bs-dismiss="modal">отмена
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    .modal-lg, .modal-xl {
        --bs-modal-width: 550px;
    }

    .btn-dg-danger, .btn-dg-danger:hover {
        background-color: #C74C4D;
    }
</style>

