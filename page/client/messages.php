<?php include($_SERVER['DOCUMENT_ROOT'] . "/print.php"); ?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Мои сообщения</title>
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

                    <div class="col-12 d-flex justify-content-between">
                        <div class="col-9 text-white d-flex align-items-center">
                            <div class="input-price-seller col-5" style="min-height: 28px; !important;">
                                <input class="px-5 text-white col-12 input_search_product text-14 rounded-2 shadow-none border_input" type="text"
                                       style="background: url('/res/img/search.svg') no-repeat left;background-position: 3% 100%; background-position-y: center; background-size: 5% 55%; outline:none; background-color: rgba(255, 255, 255, 0.1) !important; min-height: 28px; !important;">
                            </div>

                            <span class="text-14 mx-5">Даты</span>

                            <input value="2023-01-01" type="date" class="text-14 text-white mx-3 input-price-seller px-2 py-1 rounded-2 border_input" style="background-color: rgba(255, 255, 255, 0.1) !important; min-height: 28px; !important;">

                            <input value="2023-01-01" type="date" class="text-14 text-white mx-3 input-price-seller px-2 py-1 rounded-2 border_input" style="background-color: rgba(255, 255, 255, 0.1) !important; min-height: 28px; !important;">
                        </div>

                        <div class="dropdown">
                            <a href="/page/client/new_message.php" class="rounded-3 px-4 text-white bg-transparent border_blue bg_blue bg-transparent text-decoration-none text-center d-flex align-items-center justify-content-center text-14" style=" min-height: 28px; !important;">
                                Cоздать
                            </a>
                        </div>
                    </div>

                    <table class="col-12 my-3">
                        <tr class="border-bottom border-secondary text-secondary text-12 fw-bolder">
                            <td class="col-1 lh-lg">ID тикета</td>
                            <td class="col-1 lh-lg">Дата</td>
                            <td class="col-2">ID заказа</td>
                            <td class="col-3">Заголовок</td>
                            <td class="col-3">Статус</td>
                            <td class="col-1"></td>
                        </tr>

                        <tr class="text-white border border-0 border-bottom border-secondary Regular" style="font-weight: 400; font-size: 14px; line-height: 20px;">
                            <td class="col-1 lh-lg">24536236</td>
                            <td class="col-1 lh-lg">26.12.2023</td>
                            <td class="col-2">1231242344</td>
                            <td class="col-3">Возврат товара</td>
                            <td class="col-3 py-3 ">
                                <div class="col-12 d-flex justify-content-between">
                                    <div class="d-flex justify-content-start align-items-center py-3">
                                        <div class="rounded-circle" style="width: 6px; height: 6px; background: #A1E3CB;">

                                        </div>

                                        <span class="text-12 mx-2" style="color: #A1E3CB;">Competed</span>
                                    </div>
                                    <a href="/page/client/open_ticket.php" class="d-flex my-auto text-decoration-none mx-3">
                                        <img class="my-auto rounded-2 cursor" width="28" height="25" src="/res/img/markup/header/mess.png">
                                    </a>
                                </div>


                            </td>
                            <td class="col-1">
                                <div class="col-12 d-flex justify-content-end">
                                    <a href="/page/client/open_ticket.php" class="btn text-white text-center lh-1 d-flex px-4 my-auto text-14 bg-transparent border_blue btn_buy justify-content-center"><span>Открыть</span></a>
                                </div>
                            </td>
                        </tr>

                        <tr class="text-white border border-0 border-bottom border-secondary Regular" style="font-weight: 400; font-size: 14px; line-height: 20px;">
                            <td class="col-1 lh-lg">24536236</td>
                            <td class="col-1 lh-lg">26.12.2023</td>
                            <td class="col-2">1231242344</td>
                            <td class="col-3">Возврат товара</td>
                            <td class="col-3 py-3">
                                <div class="d-flex justify-content-start align-items-center py-3">
                                    <div class="rounded-circle" style="width: 6px; height: 6px; background: #95A4FC;">

                                    </div>

                                    <span class="text-12 mx-2 text_blue">In Progress</span>
                                </div>
                            </td>
                            <td class="col-1">
                                <div class="col-12 d-flex justify-content-end">
                                    <a href="/page/client/open_ticket.php" class="btn text-white text-center lh-1 d-flex px-4 my-auto text-14 bg-transparent border_blue btn_buy justify-content-center"><span>Открыть</span></a>
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

<style>

    input[type=date]::-webkit-calendar-picker-indicator {
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 24 24"><path fill="%23bbbbbb" d="M20 3h-1V1h-2v2H7V1H5v2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 18H4V8h16v13z"/></svg>');
    }
</style>


<script>
    $(function () {
        $(".svg_message_header_active").removeClass("d-none");
        $(".svg_message_header").addClass("d-none");
    });

</script>

</body>
</html>