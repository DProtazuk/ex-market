<?php include($_SERVER['DOCUMENT_ROOT'] . "/print.php"); ?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Мой Профиль</title>
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/link/client/link.php"); ?>
</head>
<body>

<!--Скрытый input активного меню-->

<!--<input type="hidden" class="active_menu" data-type="sidebar" value="menu_sidebar_main" data-mini="menu_sidebar_active_uniq_mini">-->

<!--<input type="hidden" class="active_menu" data-type="sidebar" value="menu_sidebar_analytics" data-mini="menu_sidebar_analytics_mini">-->

<!--<input type="hidden" class="active_menu" data-type="sidebar" value="menu_sidebar_shops" data-mini="menu_sidebar_shops_mini">-->

<!--<input type="hidden" class="active_menu" data-type="sidebar" value="menu_sidebar_product"-->
<!--       data-mini="menu_sidebar_product_mini">-->


<!--Скрытый input Шапки меню-->
<!--<input type="hidden" class="active_menu" data-type="header" value="a-header-orders">-->
<!--<input type="hidden" class="active_menu" data-type="header" value="a-header-balance">-->
<!--<input type="hidden" class="active_menu" data-type="header" value="a-header-favorites">-->
<!--<input type="hidden" class="active_menu" data-type="header" value="a-header-return_product">-->
<!--<input type="hidden" class="active_menu" data-type="header" value="a-header-referral_program">-->


<div class="col-12 d-flex h-100">
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/markup/components/client/sidebar.php"); ?>

    <div class="my-content">
        <?php include($_SERVER['DOCUMENT_ROOT'] . "/markup/components/client/header.php"); ?>

        <div class="col-12 content-body">
            <div class="myContainer mx-auto my-2">

                <div class="col-12 bg-silver rounded-4 m-auto my-4 p-4 shadow_status">

                    <div class="col-10 d-flex align-items-center justify-content-between mt-4 px-3">
                        <div class="col-7 border border-secondary px-4 py-2 rounded-4 border-opacity-50" style="background: rgba(255, 255, 255, 0.1);">
                            <span class="opacity-50 text-14">Имя</span>
                            <br>

                            <div class="input-price-seller col-10">
                                <input class="text-white  col-12 input_search_product text-15 fw-medium  rounded-2 border-0 bg-transparent" type="text"
                                       style=" outline:none;">
                            </div>
                        </div>

                        <div class="col-5 px-5">
                            <h6 class="opacity-50 text-14">Имя отображаемое в системе</h6>
                        </div>
                    </div>

                    <div class="col-10 d-flex align-items-center justify-content-between mt-4 px-3">
                        <div class="col-7 border border-secondary px-4 py-2 rounded-4 border-opacity-50" style="background: rgba(255, 255, 255, 0.1);">
                            <span class="opacity-50 text-14">Email</span>
                            <br>

                            <div class="input-price-seller col-10">
                                <input class="text-white  col-12 input_search_product text-13  rounded-2 border-0 bg-transparent" type="text"
                                       style=" outline:none;">
                            </div>
                        </div>

                        <div class="col-5 px-5">
                            <h6 class="opacity-50 text-14">Email для логина на сайте</h6>
                        </div>
                    </div>

                    <div class="col-10 d-flex align-items-center justify-content-between mt-4 px-3">
                        <div class="col-7 border border-secondary px-4 py-2 rounded-4 border-opacity-50" style="background: rgba(255, 255, 255, 0.1);">
                            <span class="opacity-50 text-14">Пароль</span>
                            <br>

                            <div class="input-price-seller col-10">
                                <input class="text-white  col-12 input_search_product text-13  rounded-2 border-0 bg-transparent" type="text"
                                       style=" outline:none;">
                            </div>
                        </div>

                        <div class="col-5 px-5">
                            <h6 class="opacity-50 text-14">Пароль для логина на сайте</h6>
                        </div>
                    </div>

                    <div class="col-10 d-flex align-items-center justify-content-between mt-4 px-3">
                        <div class="col-7 border border-secondary px-4 py-2 rounded-4 border-opacity-50" style="background: rgba(255, 255, 255, 0.1);">
                            <span class="opacity-50 text-14">Telegram</span>
                            <br>

                            <div class="input-price-seller col-10">
                                <input class="text-white  col-12 input_search_product text-13  rounded-2 border-0 bg-transparent" type="text"
                                       style=" outline:none;">
                            </div>
                        </div>

                        <div class="col-5 px-5">
                            <h6 class="opacity-50 text-14">Контакт для связи</h6>
                        </div>
                    </div>

                    <div class="col-10 d-flex align-items-center justify-content-between mt-4 px-3">
                        <div class="col-7 border border-secondary px-4 py-2 rounded-4 border-opacity-50" style="background: rgba(255, 255, 255, 0.1);">
                            <span class="opacity-50 text-14">2FA</span>
                            <br>

                            <div class="input-price-seller col-10">
                                <input class="text-white  col-12 input_search_product text-13  rounded-2 border-0 bg-transparent" type="text"
                                       style=" outline:none;">
                            </div>
                        </div>

                        <div class="col-5 px-5">
                            <h6 class="opacity-50 text-14">Контакт для связи</h6>
                        </div>
                    </div>

                    <div class="col-6">
                        <button style="border: 1px solid #1877F2 !important;" class="d-block mx-auto my-4 mt-5 text-dark text-14 rounded-3 bg-transparent border-0 text-white py-1 px-4">Сохранить</button>
                    </div>

                </div>

                <div class="col-12 d-flex justify-content-between my-4 rounded-4 bg-silver" style="min-height: 250px;">

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js"></script>

</body>
</html>