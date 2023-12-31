<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/backend/Global_categories.php");

require_once($_SERVER['DOCUMENT_ROOT'] . "/backend/DB.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/backend/MyFunction.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/backend/Shop.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/print.php");

$myFunction =  new MyFunction();
$SelectStartIdGlobal_categories =  new Global_categories();

if(isset($_GET['id'])){
    $Shop = new Shop();
    $Shop = $Shop->SelectShop($_GET['id']);

    if(empty($Shop)){
        header('Location: /page/client/shop/shops');
    }
}
else header('Location: /page/client/shop/shops');

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Шоп <?php  echo $Shop['name']; ?></title>
    <?php include($_SERVER['DOCUMENT_ROOT']."/link/client/link.php"); ?>
</head>
<body>

<input type="hidden" id="page" value="1">

<input type="hidden" id="MaxPrice" value="">
<input type="hidden" id="MinPrice" value="">
<input type="hidden" id="ShopId" value="<?php echo $_GET['id']; ?>">
<input type="hidden" id="global_categories" value="<?php echo $SelectStartIdGlobal_categories->SelectStartIdGlobal_categories() ?>">

<input type="hidden" id="subcategories" class="clear_input">
<input type="hidden" id="array-parameters"class="clear_input">

<input type="hidden" id="array-parameters-uniq" class="clear_input">

<div class="div-array-select">

</div>

<!--Скрытый input активного меню-->

<!--<input type="hidden" class="active_menu" data-type="sidebar" value="menu_sidebar_main" data-mini="menu_sidebar_active_uniq_mini">-->

<!--<input type="hidden" class="active_menu" data-type="sidebar" value="menu_sidebar_analytics" data-mini="menu_sidebar_analytics_mini">-->

<input type="hidden" class="active_menu" data-type="sidebar" value="menu_sidebar_shops" data-mini="menu_sidebar_shops_mini">

<!--<input type="hidden" class="active_menu" data-type="sidebar" value="menu_sidebar_product" data-mini="menu_sidebar_product_mini">-->


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
        $role = new MyFunction();
        $role = $role->return_role(DB::connect());

        if ($role === "unauthorized")
            include($_SERVER['DOCUMENT_ROOT'] . "/markup/components/unauthorized/header.php");
        else include($_SERVER['DOCUMENT_ROOT'] . "/markup/components/client/header.php");
        ?>
        <div class="col-12 content-body">
            <div class="myContainer mx-auto my-2">

                <div class="col-12 d-flex justify-content-between rounded-4" style="background-color: rgba(217, 217, 217, 0.21); min-height: 365px; max-height: 365px">
                    <img class="col-12 rounded-4" src="/res/img/imgShop/<?php echo $Shop['cover']; ?>" alt="">
                </div>

                <div class="col-12 rounded-4 bg-silver px-4 py-3 my-4">
                    <a href="" class="text-white text-decoration-none opacity-50 text-14">Шопы</a>
                    <a href="" class="text-white text-decoration-none opacity-50 mx-5 text-14 name_gl_category">Facebook</a>
                </div>

                <div class="col-12 d-flex justify-content-between my-4">
                    <div class="w-23 bg-silver rounded-4">
                        <img src="/res/img/imgShop/<?php echo $Shop['logo']; ?>" class="col-7 d-block my-4 mx-auto" style="object-fit: cover;
  width: 150px;
  height: 150px;
  border-radius: 50%;">

                        <h6 class="text-white text-center"><?php echo $Shop['name']; ?></h6>
                        <h6 class="text-white text-center">
                            <?php if(empty($Shop['rating'])){
                                echo $Shop['rating'];
                            }
                            else {
                                echo $Shop['fake_rating'];
                            }
                            ?>
                        </h6>

                        <div class="d-flex col-5 mx-auto justify-content-center">
                            <?php if(empty($Shop['rating'])){
                                echo $myFunction->create_ratingShop($Shop['rating']);
                            }
                            else {
                                echo $myFunction->create_ratingShop($Shop['fake_rating']);
                            }
                                ?>
                        </div>

                        <h6 class="text-center my-3 text-opacity-75 text-15">100000 продаж </h6>
                    </div>

                    <div class="w-75 bg-silver py-5 rounded-4 px-5">
                        <h5 class="text-white"><?php echo $Shop['heading']; ?></h5>

                        <h6 class="my-4">
                            <?php echo $Shop['description']; ?>
                        </h6>
                    </div>
                </div>

                <div class="col-12 bg-silver rounded-4 m-auto my-4 p-4 shadow_status">
                    <div class="col-12 d-flex justify-content-between align-items-center">

                        <div class="input-price-seller col-6" style="min-height: 28px; !important;">
                            <input oninput="ApplyFilter()" class="px-5 text-white col-12 input_search_product text-14 rounded-2 shadow-none border_input clear_input" type="text"
                                   style="background: url('/res/img/search.svg') no-repeat left;background-position: 3% 100%; background-position-y: center; background-size: 5% 55%; outline:none; background-color: rgba(255, 255, 255, 0.1) !important; min-height: 28px; !important;">
                        </div>

                        <div class="col-3 d-flex justify-content-end">
                            <div class="select select_Filter_shops input-price-seller rounded-2 w-75 text-13 bg_silver border_input" style="background-color: rgba(255, 255, 255, 0.1) !important; min-height: 28px !important; max-height: 28px; !important;">
                                <input class="select__input select__input_Filter_shops" type="hidden" value="default">
                                <div class="select__head select__head_Filter_shops text-white px-2 text-13 text-opacity-75 d-flex align-items-center" style="min-height: 28px; !important;"><h6 class="text-14 my-auto" >Фильтровать по</h6>
                                </div>
                                <ul class="select__list select__list_Filter_shops p-1 bg-opacity-50 rounded-2" style="display: none;">
                                    <li id="ascending_price" class="select__item select__item_Filter_shops py-1 mt-1 d-flex align-items-center">по цене &uarr;	</li>
                                    <li id="decreasing_price" class="select__item select__item_Filter_shops py-1 d-flex align-items-center">по цене &darr;	</li>
                                    <li id="ascending_rating" class="select__item select__item_Filter_shops py-1 mt-1 d-flex align-items-center">по рейтингу &uarr;	</li>
                                    <li id="decreasing_rating" class="select__item select__item_Filter_shops py-1 d-flex align-items-center">по рейтингу &darr;	</li>
                                    <li id="ascending_name" class="select__item select__item_Filter_shops py-1 d-flex align-items-center">по названию &uarr;	</li>
                                    <li id="decreasing_name" class="select__item select__item_Filter_shops py-1 d-flex align-items-center">по названию &darr;	</li>
                                    <li id="ascending_quantity" class="select__item select__item_Filter_shops py-1 d-flex align-items-center">по кол-ву &uarr;	</li>
                                    <li id="decreasing_quantity" class="select__item select__item_Filter_shops py-1 d-flex align-items-center">по кол-ву &darr;	</li>
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

                        <button style="border: 1px solid #1877F2 !important;" class="d-block mx-auto my-4 mt-5 text-dark text-14 rounded-3 bg-transparent border-0 text-white py-1 ShowMore">Показать еще</button>

                        <div class="col-12 d-flex justify-content-center mt-4">
                            <div id="pagination-container">
                                <!-- здесь будут отображаться элементы -->
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 rounded-4 bg-silver px-5 py-4 my-5">
                    <?php echo $Shop['lower_description']; ?>
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

                <div class="col-12 d-flex justify-content-between my-4 rounded-4 bg-silver" style="min-height: 250px;">

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript" src="/js/client/paginate.js"></script>
<script type="text/javascript" src="/js/client/shop.js"></script>

</body>
</html>