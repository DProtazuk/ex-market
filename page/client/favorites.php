<?php include($_SERVER['DOCUMENT_ROOT'] . "/print.php"); ?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Избранные</title>
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
<input type="hidden" class="active_menu" data-type="header" value="a-header-favorites">
<!--<input type="hidden" class="active_menu" data-type="header" value="a-header-return_product">-->
<!--<input type="hidden" class="active_menu" data-type="header" value="a-header-referral_program">-->


<div class="col-12 d-flex h-100">
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/markup/components/client/sidebar.php"); ?>

    <div class="my-content">
        <?php include($_SERVER['DOCUMENT_ROOT'] . "/markup/components/client/header.php"); ?>

        <div class="col-12 content-body">
            <div class="myContainer mx-auto my-2">

                <div class="col-12 bg-silver rounded-4 m-auto my-4 p-4 shadow_status">
                    <div class="col-12 d-flex justify-content-between align-items-center">

                        <div class="input-price-seller col-6" style="min-height: 28px; !important;">

                            <input type="hidden" id="page" value="1">

                            <input oninput="WriteProductEndPagination()" class="px-5 text-white col-12 input_search_product text-14 rounded-2 shadow-none border_input" type="text"
                                   style="background: url('/res/img/search.svg') no-repeat left;background-position: 3% 100%; background-position-y: center; background-size: 5% 55%; outline:none; background-color: rgba(255, 255, 255, 0.1) !important; min-height: 28px; !important;">
                        </div>

                        <div class="col-3 d-flex justify-content-end">
                            <div class="select select_Filter_favorite input-price-seller rounded-2 w-75 text-13 bg_silver border_input" style="background-color: rgba(255, 255, 255, 0.1) !important; min-height: 28px !important; max-height: 28px; !important;">
                                <input class="select__input select__input_Filter_favorite" type="hidden" value="default">
                                <div class="select__head select__head_Filter_favorite text-white px-2 text-13 text-opacity-75 d-flex align-items-center" style="min-height: 28px; !important;"><h6 class="text-14 my-auto" >Фильтровать по</h6>
                                </div>
                                <ul class="select__list select__list_Filter_favorite p-1 bg-opacity-50 rounded-2" style="display: none;">
                                    <li id="ascending_price" class="select__item select__item_Filter_favorite py-1 mt-1 d-flex align-items-center">по цене &uarr;	</li>
                                    <li id="decreasing_price" class="select__item select__item_Filter_favorite py-1 d-flex align-items-center">по цене &darr;	</li>
                                    <li id="ascending_rating" class="select__item select__item_Filter_favorite py-1 mt-1 d-flex align-items-center">по рейтингу &uarr;	</li>
                                    <li id="decreasing_rating" class="select__item select__item_Filter_favorite py-1 d-flex align-items-center">по рейтингу &darr;	</li>
                                    <li id="ascending_name" class="select__item select__item_Filter_favorite py-1 d-flex align-items-center">по названию &uarr;	</li>
                                    <li id="decreasing_name" class="select__item select__item_Filter_favorite py-1 d-flex align-items-center">по названию &darr;	</li>
                                    <li id="ascending_quantity" class="select__item select__item_Filter_favorite py-1 d-flex align-items-center">по кол-ву &uarr;	</li>
                                    <li id="decreasing_quantity" class="select__item select__item_Filter_favorite py-1 d-flex align-items-center">по кол-ву &darr;	</li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-3 d-flex justify-content-end">
                            <div class="div_svg_table opacity-50 mx-2 cursor svg_table">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 5.5V3C1 1.89543 1.89543 1 3 1H5.5C6.60457 1 7.5 1.89543 7.5 3V5.5C7.5 6.60457 6.60457 7.5 5.5 7.5H3C1.89543 7.5 1 6.60457 1 5.5Z" stroke="white" />
                                    <path d="M9 13.5V11C9 9.89543 9.89543 9 11 9H13.5C14.6046 9 15.5 9.89543 15.5 11V13.5C15.5 14.6046 14.6046 15.5 13.5 15.5H11C9.89543 15.5 9 14.6046 9 13.5Z" stroke="white"/>
                                    <path d="M1 13.5V11C1 9.89543 1.89543 9 3 9H5.5C6.60457 9 7.5 9.89543 7.5 11V13.5C7.5 14.6046 6.60457 15.5 5.5 15.5H3C1.89543 15.5 1 14.6046 1 13.5Z" stroke="white"/>
                                    <path d="M9 5.5V3C9 1.89543 9.89543 1 11 1H13.5C14.6046 1 15.5 1.89543 15.5 3V5.5C15.5 6.60457 14.6046 7.5 13.5 7.5H11C9.89543 7.5 9 6.60457 9 5.5Z" stroke="white"/>
                                </svg>
                            </div>


                            <div class="cursor svg_spisok">
                                <svg width="23" height="16" viewBox="0 0 23 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 5.5V3C1 1.89543 1.89543 1 3 1H5.5C6.60457 1 7.5 1.89543 7.5 3V5.5C7.5 6.60457 6.60457 7.5 5.5 7.5H3C1.89543 7.5 1 6.60457 1 5.5Z" stroke="white"/>
                                    <path d="M9 13V11C9 10.4477 9.44772 10 10 10H21C21.5523 10 22 10.4477 22 11V13C22 13.5523 21.5523 14 21 14H10C9.44772 14 9 13.5523 9 13Z" stroke="white"/>
                                    <path d="M1 13.5V11C1 9.89543 1.89543 9 3 9H5.5C6.60457 9 7.5 9.89543 7.5 11V13.5C7.5 14.6046 6.60457 15.5 5.5 15.5H3C1.89543 15.5 1 14.6046 1 13.5Z" stroke="white"/>
                                    <path d="M9 5V3C9 2.44772 9.44772 2 10 2H21C21.5523 2 22 2.44772 22 3V5C22 5.55228 21.5523 6 21 6H10C9.44772 6 9 5.55228 9 5Z" stroke="white"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4 opacity-0">

                    <div class="col-12">

                        <input type="hidden" class="display_type" value="table_spisok">

                        <div class="col-12 div_print_product">

                        </div>

                        <button style="border: 1px solid #1877F2 !important;" class="d-block mx-auto my-4 mt-5 text-dark text-14 rounded-3 bg-transparent border-0 text-white py-1 ShowMore" onclick="ShowMoreProduct()">Показать еще</button>

                        <div class="col-12 d-flex justify-content-center mt-4">
                            <div id="pagination-container">
                                <!-- здесь будут отображаться элементы -->
                            </div>
                        </div>

                    </div>
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
</body>
<script type="text/javascript" src="/js/client/paginate.js"></script>
<script src="/js/client/favorite.js"></script>
</html>