<?php include($_SERVER['DOCUMENT_ROOT'] . "/print.php"); ?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Баланс</title>
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
<input type="hidden" class="active_menu" data-type="header" value="a-header-balance">
<!--<input type="hidden" class="active_menu" data-type="header" value="a-header-favorites">-->
<!--<input type="hidden" class="active_menu" data-type="header" value="a-header-return_product">-->
<!--<input type="hidden" class="active_menu" data-type="header" value="a-header-referral_program">-->


<div class="col-12 d-flex h-100">
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/markup/components/client/sidebar.php"); ?>

    <div class="my-content">
        <?php include($_SERVER['DOCUMENT_ROOT'] . "/markup/components/client/header.php"); ?>

        <div class="col-12 content-body">
            <div class="myContainer mx-auto my-2">

                <div class="col-12 my-4 shadow_status bg-silver rounded-4 py-4">

                    <div class="col-11 mx-auto border border-0 border-bottom border-secondary border-opacity-50 d-flex pb-3">
                        <div class="col-2 border border-0 border-end border-secondary border-opacity-50 py-2">
                            <h5 class="px-2 text-20">Мой баланс</h5>
                        </div>

                        <div class="d-flex my-auto px-4">
                            <h5 class="">1000 р.</h5>
                        </div>
                    </div>

                    <div class="col-11 mx-auto d-flex">

                        <div class="col-7">
                            <h6 class="text-14 my-4">Выберете способ оплаты</h6>

                            <input type="hidden" value="" class="input_payment_method">

                            <div class="col-10 d-flex flex-wrap justify-content-between">
                                <img height="85" src="/res/img/qiwi.png" class="w-30 rounded rounded-1 cursor border border-white border-2 img-payment-method">
                                <img height="85" src="/res/img/Moneyp.png" class="w-30 rounded rounded-1 cursor border border-white border-2 img-payment-method">
                                <img height="85" src="/res/img/tether.png" class="w-30 rounded rounded-1 cursor border border-white border-2 img-payment-method">

                                <img height="85" src="/res/img/Binance.png" class="w-30 my-3 rounded rounded-1 cursor border border-white border-2 img-payment-method">
                                <img height="85" src="/res/img/Capitalist.png" class="w-30 my-3 rounded rounded-1 cursor border border-white border-2 img-payment-method">
                                <img height="85" src="/res/img/Bitcoin.png" class="w-30 my-3 rounded rounded-1 cursor border border-white border-2 img-payment-method">
                            </div>
                        </div>

                        <div class="col-5">
                            <h6 class="fs-6 my-4">Выберете сумму платежа</h6>
                            <h6 class="text-14 my-4">Пополните на определённую сумму</h6>

                            <div class="col-8 d-flex flex-wrap justify-content-between">
                                <button data-amount="100" class="text-white text-14 text-center d-flex border border-opacity-50 border-secondary rounded-3 bg-silver px-3 my-2 but_amount">100 р.</button>
                                <button data-amount="500" class="text-white text-14 text-center d-flex border border-opacity-50 border-secondary rounded-3 bg-silver px-3 my-2 but_amount">500 р.</button>
                                <button data-amount="1000" class="text-white text-14 text-center d-flex border border-opacity-50 border-secondary rounded-3 bg-silver px-3 my-2 but_amount">1000 р.</button>
                                <button data-amount="1500" class="text-white text-14 text-center d-flex border border-opacity-50 border-secondary rounded-3 bg-silver px-3 my-2 but_amount">1500 р.</button>
                                <button data-amount="2000" class="text-white text-14 text-center d-flex border border-opacity-50 border-secondary rounded-3 bg-silver px-3 my-2 but_amount">2000 р.</button>
                                <button data-amount="5000" class="text-white text-14 text-center d-flex border border-opacity-50 border-secondary rounded-3 bg-silver px-3 my-2 but_amount">5000 р.</button>
                            </div>

                            <h6 class="text-14 my-4">Сумма пополнения, руб</h6>

                            <div class="input-price-seller col-7">
                                <input placeholder="Введите сумму платежа" class="text-white bg-silver col-12 text-14 py-1 rounded-2 text-center border_input input-payment-amount" type="number"
                                       style=" outline:none; background-color: rgba(255, 255, 255, 0.1) !important; min-height: 28px; !important;">
                            </div>

                            <button class="btn bg-transparent border_blue btn_buy my-4 px-4 text-14 lh-1 text-white bottom-0 button-top-up">Пополнить</button>

                        </div>

                    </div>


                </div>

                <div class="col-12 bg-silver rounded-4 m-auto my-4 p-4 shadow_status">

                    <div class="col-12 d-flex justify-content-between">
                        <div class="col-12 text-white d-flex align-items-center">
                            <span class="text-secondary text-14 span_coming cursor" style="font-weight: 600;">Приход</span>
                            <span class="text-secondary text-14 mx-4">|</span>
                            <span class="text-white text-14 span_orders cursor">Расход</span>


                            <span class="text-secondary text-14 fw-bolder mx-4">|</span>

                            <span class="text-14 mx-2">Даты</span>

                            <input value="2023-01-01" type="date" class="text-14 text-white mx-3 input-price-seller px-2 py-1 rounded-2 border_input" style="background-color: rgba(255, 255, 255, 0.1) !important; min-height: 28px; !important; border: 1px solid rgba(255, 255, 255, 0.4);">

                            <input value="2023-01-01" type="date" class="text-14 text-white mx-3 input-price-seller px-2 py-1 rounded-2 border_input" style="background-color: rgba(255, 255, 255, 0.1) !important; min-height: 28px; !important; border: 1px solid rgba(255, 255, 255, 0.4);">
                        </div>

                        <div class="dropdown">

                        </div>
                    </div>

                    <table class="col-12 my-3 table_orders">
                        <tr class="border-bottom border-secondary text-secondary text-12 fw-bolder">
                            <td class="col-2 lh-lg">Дата</td>
                            <td class="col-6">Платежные данные</td>
                            <td class="col-2">Сумма</td>
                            <td class="col-2">Исполнение</td>
                        </tr>

                        <tr class="text-white Regular" style="font-weight: 400; font-size: 14px; line-height: 20px;">
                            <td class="col-2 lh-lg">12.12.2022</td>
                            <td class="col-6">USDT 666vh654gcjtrhhc64cfhkjghjhvf65fhgvyt677877thjb</td>
                            <td class="col-2">$123 930</td>
                            <td class="col-2">
                                <div class="col-12 mx-auto d-flex justify-content-start align-items-center py-3">
                                    <div class="rounded-circle" style="width: 6px; height: 6px; background: #95A4FC;">

                                    </div>

                                    <span class="text-12 mx-2" style="color: #95A4FC;">In Progress</span>
                                </div>
                            </td>

                        </tr>

                        <tr class="text-white Regular" style="font-weight: 400; font-size: 14px; line-height: 20px;">
                            <td class="col-2 lh-lg">12.12.2022</td>
                            <td class="col-6">USDT 666vh654gcjtrhhc64cfhkjghjhvf65fhgvyt677877thjb</td>
                            <td class="col-2">$123 930</td>
                            <td class="col-2">
                                <div class="col-12 mx-auto d-flex justify-content-start align-items-center py-3">
                                    <div class="rounded-circle" style="width: 6px; height: 6px; background: #A1E3CB;">

                                    </div>

                                    <span class="text-12 mx-2" style="color: #A1E3CB;">Competed</span>
                                </div>
                            </td>

                        </tr>
                    </table>

                    <table class="col-12 my-3 d-none table_coming">
                        <tr class="border-bottom border-secondary text-secondary text-12 fw-bolder">
                            <td class="col-2 lh-lg">Дата</td>
                            <td class="col-3">Сумма покупки</td>
                            <td class="col-3">Процент отчислений</td>
                            <td class="col-2">Приход</td>
                            <td class="col-2">Исполнение</td>
                        </tr>

                        <tr class="text-white" style="font-weight: 400; font-size: 14px; line-height: 20px;">
                            <td class="col-2 lh-lg">12.12.2022</td>
                            <td class="col-3">100 р.</td>
                            <td class="col-3">5%</td>
                            <td class="col-2">5р.</td>
                            <td class="col-2">
                                <div class="col-12 mx-auto d-flex justify-content-start align-items-center py-3">
                                    <div class="rounded-circle" style="width: 6px; height: 6px; background: #A1E3CB;"></div>
                                    <span class="text-12 mx-2" style="color: #A1E3CB;">Competed</span>
                                </div>
                            </td>

                        </tr>

                        <tr class="text-white" style="font-weight: 400; font-size: 14px; line-height: 20px;">
                            <td class="col-2 lh-lg">12.12.2022</td>
                            <td class="col-3">100 р.</td>
                            <td class="col-3">5%</td>
                            <td class="col-2">5р.</td>
                            <td class="col-2">
                                <div class="col-12 mx-auto d-flex justify-content-start align-items-center py-3">
                                    <div class="rounded-circle" style="width: 6px; height: 6px; background: #95A4FC;"></div>
                                    <span class="text-12 mx-2" style="color: #95A4FC;">In Progress</span>
                                </div>
                            </td>

                        </tr>
                    </table>

                </div>

                <div class="col-12 d-flex justify-content-between my-4 rounded-4 bg-silver" style="min-height: 250px;">

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js"></script>
<script src="/js/client/balance.js"></script>

<style>

    input[type=date]::-webkit-calendar-picker-indicator {
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 24 24"><path fill="%23bbbbbb" d="M20 3h-1V1h-2v2H7V1H5v2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 18H4V8h16v13z"/></svg>');
    }
</style>

<style>
    input::placeholder {color: #BDBDBD;}

</style>
</body>
</html>