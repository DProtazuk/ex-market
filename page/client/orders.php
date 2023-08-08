<?php include($_SERVER['DOCUMENT_ROOT'] . "/print.php"); ?>
<?php require_once $_SERVER['DOCUMENT_ROOT']."/backend/DB.php";?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Товар</title>
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
<input type="hidden" class="active_menu" data-type="header" value="a-header-orders">
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
                                <input class="px-5 text-white col-12 input_search_orders text-14 rounded-2 shadow-none border_input" type="text"
                                       style="background: url('/res/img/search.svg') no-repeat left;background-position: 3% 100%; background-position-y: center; background-size: 5% 55%; outline:none; background-color: rgba(255, 255, 255, 0.1) !important; min-height: 28px; !important;">
                            </div>

                            <span class="text-14 mx-5">Даты</span>

                            <input id="start_data" value="<?php echo date('Y-m-d', strtotime('-1 month')); ?>" type="date" class="text-14 text-white mx-3 input-price-seller px-2 py-1 rounded-2 border_input input-data" style="background-color: rgba(255, 255, 255, 0.1) !important; min-height: 28px; !important;">

                            <input id="finish_data" value="<?php echo date('Y-m-d'); ?>" type="date" class="text-14 text-white mx-3 input-price-seller px-2 py-1 rounded-2 border_input input-data" style="background-color: rgba(255, 255, 255, 0.1) !important; min-height: 28px; !important;">
                        </div>

                        <div class="dropdown">

                        </div>
                    </div>

                    <table class="col-12 my-3 table_orders">


                        <tr class="text-white border border-0 border-bottom border-secondary text-14 Regular" style="">
                            <td class="col-1">
                                <div class="col-12">
                                    24536236
                                    <span class="opacity-0">fdgdfg</span>
                                </div>
                            </td>
                            <td class="col-1">
                                <div class="col-12">
                                    26.12.2023
                                    <span class="opacity-0">fdgdfg</span>
                                </div>
                            </td>

                            <td class="col-6">
                                <div class="col-11">
                                    [UKR] [Ручной фарм] Фарм до 60 дней, Интересы+
                                    ,FP, SMS, 2FA, почта, токен EAAB, cookies, User
                                    Agent,  Pro Mode
                                </div>
                            </td>

                            <td class="col-5">
                                <div class="col-12 d-flex justify-content-between">
                                    <div class="col-4 my-auto">
                                        Facebook <br> Фарм акканты
                                    </div>
                                    <div class="col-3 my-auto">
                                        100 шт.
                                        <span class="opacity-0">fdgdfg</span>
                                    </div>

                                    <div class="col-2 my-auto">
                                        600 р.
                                        <span class="opacity-0">fdgdfg</span>
                                    </div>

                                    <div class="col-3 py-4">

                                        <svg class="border-1 my-auto rounded-1 border_blue mx-2"  width="23" height="23" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.7781 7.39956V3.83706C17.7781 3.50914 17.511 3.24331 17.1816 3.24331C16.8522 3.24331 16.5852 3.50914 16.5852 3.83706V6.80581H13.6028C13.2734 6.80581 13.0064 7.07164 13.0064 7.39956C13.0064 7.72748 13.2734 7.99331 13.6028 7.99331H17.1816C17.511 7.99331 17.7781 7.72748 17.7781 7.39956Z" fill="white"/>
                                            <path d="M16.7604 7.82011C16.8723 7.93108 17.0237 7.99331 17.1816 7.99331L17.1825 7.9934C17.3407 7.99317 17.4923 7.93039 17.604 7.81887C17.7154 7.70758 17.7781 7.55673 17.7781 7.39956L17.778 7.39877C17.7778 7.2413 17.7147 7.09037 17.6027 6.97919L15.0678 4.46317C14.0628 3.46131 12.7478 2.91852 12.7478 2.91852C11.4327 2.37573 10.0091 2.37573 10.0091 2.37573C8.58555 2.37573 7.27051 2.91852 7.27051 2.91852C5.95549 3.46131 4.94959 4.46409 4.94959 4.46409C4.83792 4.57542 4.77519 4.72631 4.77519 4.88363C4.77531 5.04111 4.83826 5.19252 4.9502 5.30378C5.06203 5.41495 5.21361 5.47738 5.37166 5.47738C5.52985 5.47727 5.68195 5.4146 5.79372 5.30317C6.6318 4.46769 7.72743 4.01546 7.72743 4.01546C8.82306 3.56323 10.0091 3.56323 10.0091 3.56323C11.1952 3.56323 12.2909 4.01546 12.2909 4.01546C13.3865 4.46769 14.2255 5.3041 14.2255 5.3041L16.7604 7.82011Z" fill="white"/>
                                            <path d="M2.24023 11.6005V15.163C2.24023 15.4909 2.50728 15.7567 2.8367 15.7567C3.16611 15.7567 3.43316 15.4909 3.43316 15.163V12.1942H6.41546C6.74488 12.1942 7.01192 11.9284 7.01192 11.6005C7.01192 11.2725 6.74488 11.0067 6.41546 11.0067H2.8367C2.50728 11.0067 2.24023 11.2725 2.24023 11.6005Z" fill="white"/>
                                            <path d="M5.7928 13.696L3.25784 11.18C3.14603 11.069 2.99458 11.0067 2.8367 11.0067L2.83582 11.0067C2.67763 11.0069 2.52601 11.0697 2.41431 11.1812C2.30283 11.2925 2.24023 11.4433 2.24023 11.6005L2.24024 11.6013C2.24047 11.7588 2.30353 11.9097 2.41556 12.0209L4.95052 14.5369C5.95549 15.5388 7.27052 16.0816 7.27052 16.0816C8.58555 16.6244 10.0091 16.6244 10.0091 16.6244C11.4327 16.6244 12.7478 16.0816 12.7478 16.0816C14.0628 15.5388 15.0687 14.536 15.0687 14.536C15.1804 14.4247 15.2431 14.2738 15.2431 14.1165C15.243 13.959 15.18 13.8076 15.0681 13.6963C14.9562 13.5852 14.8047 13.5227 14.6466 13.5227C14.4884 13.5228 14.3363 13.5855 14.2246 13.6969C13.3865 14.5324 12.2909 14.9846 12.2909 14.9846C11.1952 15.4369 10.0091 15.4369 10.0091 15.4369C8.82306 15.4369 7.72743 14.9846 7.72743 14.9846C6.6318 14.5324 5.7928 13.696 5.7928 13.696Z" fill="white"/>
                                        </svg>

                                        <svg class="border-1 my-auto rounded-1 border_blue" width="23" height="23" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.87145 2.96875V16.0312C9.87145 16.3592 10.1381 16.625 10.4671 16.625C10.796 16.625 11.0627 16.3592 11.0627 16.0312V2.96875C11.0627 2.64083 10.796 2.375 10.4671 2.375C10.1381 2.375 9.87145 2.64083 9.87145 2.96875Z" fill="white"/>
                                            <path d="M10.8883 16.4511L16.249 11.1073C16.3607 10.996 16.4234 10.845 16.4234 10.6875C16.4234 10.53 16.3607 10.379 16.249 10.2677C16.1373 10.1563 15.9858 10.0938 15.8278 10.0938C15.6698 10.0938 15.5183 10.1563 15.4066 10.2677L10.4671 15.1916L5.52755 10.2677C5.41585 10.1563 5.26435 10.0938 5.10638 10.0938C4.9484 10.0938 4.7969 10.1563 4.6852 10.2677C4.5735 10.379 4.51074 10.53 4.51074 10.6875C4.51074 10.845 4.5735 10.996 4.6852 11.1073L10.0459 16.4511C10.2785 16.683 10.6556 16.683 10.8883 16.4511Z" fill="white"/>
                                        </svg>

                                        <span class="opacity-0">fdgdfg</span>

                                    </div>
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
<script src="/js/client/orders/select.js"></script>

<style>
    input[type=date]::-webkit-calendar-picker-indicator {
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 24 24"><path fill="%23bbbbbb" d="M20 3h-1V1h-2v2H7V1H5v2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 18H4V8h16v13z"/></svg>');
    }
</style>
</body>
</html>