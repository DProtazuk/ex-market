<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/backend/MyFunction.php" ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/backend/Global_categories.php" ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/backend/Shop.php" ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/backend/Product.php" ?>

<?php

$Global_categories = new Global_categories();
$MyFunction = new MyFunction();
$Shop = new Shop();
$Product = new Product();

if ($MyFunction->return_role() !== "multi_user") {
    header('Location: /page/seller/test');
}

?>


<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/backend/DB.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/backend/MyFunction.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/backend/Shop.php");
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Товары</title>
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/link/client/link.php"); ?>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
</head>
<body>

<!--Скрытый input активного меню-->

<input type="hidden" class="active_menu" data-type="sidebar" value="menu_sidebar_products"
       data-mini="menu_sidebar_products_mini">

<!--<input type="hidden" class="active_menu" data-type="sidebar" value="menu_sidebar_shops" data-mini="menu_sidebar_shops_mini">-->
<?php include($_SERVER['DOCUMENT_ROOT'] . "/page/seller/product/modal.php"); ?>


<div class="col-12 d-flex h-100">
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/markup/components/seller/sidebar.php"); ?>

    <div class="my-content">
        <?php
        $role = new MyFunction();
        $role = $role->return_role(DB::connect());

        if ($role === "unauthorized")
            include($_SERVER['DOCUMENT_ROOT'] . "/markup/components/unauthorized/header.php");
        else include($_SERVER['DOCUMENT_ROOT'] . "/markup/components/seller/header.php");
        ?>

        <div class="col-12 content-body">
            <div class="myContainer mx-auto my-2">

                <?php
                    if(!$Shop->SelectMyShop($_COOKIE['unique_id'])) {
                        echo '<div class="col-9 mx-auto rounded-4 bg-silver p-4">
    <div class="col-12 d-flex justify-content-between"">
    <svg width="45" height="45" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M22.5 4.21875C22.5 4.21875 26.2184 4.21875 29.6163 5.65596C29.6163 5.65596 32.8973 7.04369 35.4268 9.5732C35.4268 9.5732 37.9563 12.1027 39.344 15.3837C39.344 15.3837 40.7812 18.7816 40.7812 22.5C40.7812 22.5 40.7812 26.2184 39.344 29.6163C39.344 29.6163 37.9563 32.8973 35.4268 35.4268C35.4268 35.4268 32.8973 37.9563 29.6163 39.344C29.6163 39.344 26.2184 40.7812 22.5 40.7812C22.5 40.7812 18.7816 40.7812 15.3837 39.344C15.3837 39.344 12.1027 37.9563 9.5732 35.4268C9.5732 35.4268 7.04369 32.8973 5.65596 29.6163C5.65596 29.6163 4.21875 26.2184 4.21875 22.5C4.21875 22.5 4.21875 18.7816 5.65596 15.3837C5.65596 15.3837 7.04369 12.1027 9.57321 9.5732C9.57321 9.5732 12.1027 7.04369 15.3837 5.65596C15.3837 5.65596 18.7816 4.21875 22.5 4.21875ZM22.5 7.03125C22.5 7.03125 19.352 7.03125 16.4793 8.24628C16.4793 8.24628 13.7036 9.42032 11.5619 11.5619C11.5619 11.5619 9.42032 13.7036 8.24628 16.4793C8.24628 16.4793 7.03125 19.352 7.03125 22.5C7.03125 22.5 7.03125 25.648 8.24628 28.5207C8.24628 28.5207 9.42032 31.2964 11.5619 33.4381C11.5619 33.4381 13.7036 35.5797 16.4793 36.7537C16.4793 36.7537 19.352 37.9688 22.5 37.9688C22.5 37.9688 25.648 37.9688 28.5207 36.7537C28.5207 36.7537 31.2964 35.5797 33.4381 33.4381C33.4381 33.4381 35.5797 31.2964 36.7537 28.5207C36.7537 28.5207 37.9688 25.648 37.9688 22.5C37.9688 22.5 37.9688 19.352 36.7537 16.4793C36.7537 16.4793 35.5797 13.7036 33.4381 11.5619C33.4381 11.5619 31.2964 9.42031 28.5207 8.24628C28.5207 8.24628 25.648 7.03125 22.5 7.03125Z" fill="white"/>
<path d="M22.5 32.3438H23.9062C24.6829 32.3438 25.3125 31.7141 25.3125 30.9375C25.3125 30.1609 24.6829 29.5312 23.9062 29.5312V21.0938C23.9062 20.3171 23.2766 19.6875 22.5 19.6875H21.0938C20.3171 19.6875 19.6875 20.3171 19.6875 21.0938C19.6875 21.8704 20.3171 22.5 21.0938 22.5V30.9375C21.0938 31.7141 21.7234 32.3438 22.5 32.3438Z" fill="white"/>
<path d="M24.2578 14.7656C24.2578 15.9306 23.3133 16.875 22.1484 16.875C20.9835 16.875 20.0391 15.9306 20.0391 14.7656C20.0391 13.6006 20.9835 12.6562 22.1484 12.6562C23.3133 12.6562 24.2578 13.6006 24.2578 14.7656Z" fill="white"/>
</svg>

<div class="col-11">
Прежде чем приступить к заполнению товаров, требуется создать шоп в вкладке Оформление
</div>

</div>

<div class="col-9 mx-auto">
    <a class="bg_blue text-white border-0 text-16 text-center rounded-3 text-decoration-none d-block mx-auto col-3 py-1" href="/page/seller/decoration">Создать шоп</a>
</div>
</div>';
                        return false;
                    }
                ?>

                <input type="hidden" id="idShop" value="<?php echo $Shop->ReturnIdShop(); ?>">

                <div class="col-12 d-flex justify-content-between text-dark">

                    <div class="w-23 p-3 px-4 rounded-4" style="background-color: #E3F5FF;">
                        <h6 class="fw-bolder my-2">Кол-во товаров</h6>
                        <h3 class="my-3 fw-bolder quantity_h3">
                            <?php
                            if ($Product->ProductQuantity()) {
                                echo $Product->ProductQuantity();
                            } else echo 0;
                            ?>
                        </h3>
                    </div>

                    <div class="w-23 p-3 px-4 rounded-4" style="background-color: #F7F9FB;">
                        <h6 class="fw-bolder my-2">Товаров на сумму</h6>
                        <h3 class="my-3 fw-bolder price_h3">
                            <?php
                            if ($Product->ProductAmount()) {
                                echo $Product->ProductAmount();
                            } else echo 0;
                            ?>
                        </h3>
                    </div>

                    <div class="w-23 p-3 px-4 rounded-4" style="background-color: #E3F5FF;">
                        <h6 class="fw-bolder my-2">Покупок сегодня</h6>
                        <h3 class="my-3 fw-bolder">0</h3>
                    </div>

                    <div class="w-23 p-3 px-4 rounded-4" style="background-color: #F7F9FB;">
                        <h6 class="fw-bolder my-2">Сумма продаж</h6>
                        <h3 class="my-3 fw-bolder">0</h3>
                    </div>
                </div>

                <div class="col-12 bg-silver rounded-4 m-auto mt-4 p-4 shadow_status">
                    <div class="col-12 d-flex justify-content-between align-items-center">
                        <span class="text-white fw-bolder text-14 cursor">Товары</span>
                        <span class="text-white opacity-25 fw-light fw-bolder">|</span>

                        <div class="input-price-seller col-4">
                            <input placeholder="Введите название или id:"
                                   class="px-5 text-white border-0 col-12 input_search_product text-14" type="text"
                                   style="background: url('/res/img/search.svg') no-repeat left;background-position: 3% 100%; background-position-y: center; background-size: 5% 55%; outline:none;">
                        </div>

                        <span class="text-white opacity-25 fw-light fw-bolder">|</span>


                        <div class="col-3">

                            <div class=" selectGlCat input-price-seller w-75">
                                <input class=" select__inputGlCat" type="hidden" name="global_category"
                                       id="global_category">
                                <div class=" select__headGlCat p-1 text-white px-2">Выбрать категорию</div>
                                <ul class=" select__listGlCat p-1 bg-opacity-50" style="display: none;">
                                    <?php
                                    foreach ($Global_categories->select_Global_categories() as $arrayGlobCat) {
                                        echo '<li id="' . $arrayGlobCat['id'] . '" class=" select__itemGlCat p-1">' . $arrayGlobCat['name'] . '</li>';
                                    }
                                    //                                    ?>
                                </ul>
                            </div>
                        </div>

                        <div class="col-2 d-flex justify-content-end">
                            <a class="text-decoration-none" href="/page/seller/product/create_product">
                                <button class="btn p-1 px-3 text-decoration-none bg_blue small_shadow rounded d-flex justify-content-center align-items-center lh-1 fs-6 text-white">
                                    создать
                                </button>
                            </a>
                        </div>

                    </div>


                    <div class="col-12 mt-3">
                        <table class="col-12">
                            <tr class="border-bottom border-secondary text-secondary text-12">
                                <td class="col-1 lh-lg">ID товара</td>
                                <td class="col-3 lh-lg ">Наименование</td>
                                <td class="col-2 p-2">Категория</td>
                                <td class="col-1">Кол-во</td>
                                <td class="col-1 text-center">Цена</td>
                                <td class="col-1 text-center">Сумма</td>
                                <td class="col-1 text-center">Покупок</td>
                                <td class="col-2"></td>
                            </tr>
                        </table>

                        <table class="col-12 table_product text-14 fw-bolder">

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div

</body>

<script>
    jQuery(($) => {
        $('.select_Gl_Cat').on('click', '.select__head_Gl_Cat', function () {
            if ($(this).hasClass('open')) {
                $(this).removeClass('open');
                $(this).next().fadeOut();
            } else {
                $('.select__head_Gl_Cat').removeClass('open');
                $('.select__list_Gl_Cat').fadeOut();
                $(this).addClass('open');
                $(this).next().fadeIn();
            }
        });

        $('.select_Gl_Cat').on('click', '.select__item_Gl_Cat', function () {
            $('.select__head_Gl_Cat').removeClass('open');
            $(this).parent().fadeOut();
            $(this).parent().prev().text($(this).text());
            $(this).parent().prev().prev().val($(this).attr('id'));
            let id = $(this).attr('id');

            write(id);
        });

        $(document).click(function (e) {
            if (!$(e.target).closest('.select_Gl_Cat').length) {
                $('.select__head_Gl_Cat').removeClass('open');
                $('.select__list_Gl_Cat').fadeOut();
            }
        });
    });
</script>

<style>
    .input-price-seller {
        background: linear-gradient(269.89deg, #151515 0.08%, #202020 99.91%);
        box-shadow: 0px 0px 4px 0.5px rgba(255, 249, 249, 0.1), inset 0px 4px 2px rgba(0, 0, 0, 0.25);
        border-radius: 5px;
    }

    .select_products {
        position: relative;
    }

    .select__head_products {
        width: 100%;
        max-width: 100%;
        border-radius: 10px;
        font-size: 14px;
        line-height: 18px;
        color: rgba(66, 67, 72, 0.8);
        cursor: pointer;
    }

    .select__head_products::after {
        width: 8px;
        height: 8px;
        background: transparent url("/res/img/arrow.png") no-repeat center / cover;
        position: absolute;
        right: 20px;
        bottom: 50%;
        transform: translateY(50%);
        content: '';
        display: block;
        transition: .2s ease-in;
    }

    .select__head_products.open::after {
        transform: translateY(50%) rotate(180deg);
    }

    .select__list_products {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: #fff;
        box-shadow: 0 0 4px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        margin-top: 5px;
        overflow-x: hidden;
        overflow-y: auto;
        z-index: 100;
        margin: 0;
        padding: 0;
        font-size: 14px;
        color: #424348;
        scrollbar-width: thin;
        overscroll-behavior: contain;
    }

    .select__list_products::-webkit-scrollbar-thumb {
        border-radius: 5px;
        background-color: #D9D9D9;
    }

    .select__list_products .select__item_products {
        position: relative;
        border-top: 1px solid rgba(224, 229, 231, 0.5);
        cursor: pointer;
        list-style-type: none;
    }

    .select__list_products .select__item_products:hover {
        background-color: #282828;
        color: white;
        border-radius: 5px;
    }

    .btn_down:hover, .btn_upload:hover, .btn_update:hover, .btn_copy:hover, .btn_del:hover {
        margin-top: 2px;
    }

    .btn_down {
        background: url('/res/img/btn_down.svg');
        background-size: 100% 100%;
        border: unset;
    }

    .btn_upload {
        background: url('/res/img/btn_upload.svg');
        background-size: 100% 100%;
        border: unset;
    }

    .btn_update {
        background: url('/res/img/btn_update.svg');
        background-size: 100% 100%;
        border: unset;
    }

    .btn_copy {
        background: url('/res/img/btn_copy.svg');
        background-size: 100% 100%;
        border: unset;
    }

    .btn_del {
        background: url('/res/img/btn_del.svg');
        background-size: 100% 100%;
        border: unset;
    }

    .modal_bg {
        background-color: #282828 !important;
    }

    .btn-bg-seller {
        background-color: #47A38E;
    }

    .btn-bg-seller[disabled] {
        background-color: #47A38E;
        color: white;
    }

    .btn-dg-danger, .btn-dg-danger:hover {
        background-color: #C74C4D;
    }

    .btn-bg-seller:hover {
        background-color: #47A38E;
        --bs-backdrop-opacity: .8;
    }

</style>

<style>
    .selectGlCat, .select_Cat, .select_standard2 {
        position: relative;
    }

    .select__headGlCat, .select__head_Cat, .select__head_standard2 {
        width: 100%;
        max-width: 100%;
        border-radius: 10px;
        font-size: 14px;
        line-height: 18px;
        color: rgba(66, 67, 72, 0.8);
        cursor: pointer;
    }

    .select__headGlCat::after, .select__head_Cat::after, .select__head_standard2::after {
        width: 8px;
        height: 8px;
        background: transparent url("/res/img/arrow.png") no-repeat center / cover;
        position: absolute;
        right: 20px;
        bottom: 50%;
        transform: translateY(50%);
        content: '';
        display: block;
        transition: .2s ease-in;
    }

    .select__headGlCat.open::after, .select__head_Cat.open::after, .select__head_standard2.open::after {
        transform: translateY(50%) rotate(180deg);
    }

    .select__listGlCat, .select__list_Cat, .select__list_standard2 {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: #fff;
        box-shadow: 0 0 4px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        margin-top: 5px;
        overflow-x: hidden;
        overflow-y: auto;
        z-index: 100;
        margin: 0;
        padding: 0;
        font-size: 14px;
        color: #424348;
        scrollbar-width: thin;
        overscroll-behavior: contain;
    }

    .select__listGlCat::-webkit-scrollbar-thumb, .select__list_Cat::-webkit-scrollbar-thumb, .select__list_standard2::-webkit-scrollbar-thumb {
        border-radius: 5px;
        background-color: #D9D9D9;
    }

    .select__listGlCat .select__itemGlCat, .select__list_Cat .select__item_Cat, .select__list_standard2 .select__item_standard2 {
        position: relative;
        border-top: 1px solid rgba(224, 229, 231, 0.5);
        cursor: pointer;
        list-style-type: none;
    }

    .select__listGlCat .select__itemGlCat:hover, .select__list_Cat .select__item_Cat:hover, .select__list_standard2 .select__item_standard2:hover {
        background-color: #282828;
        color: white;
        border-radius: 5px;
    }

    .border-colors {
        border-color: #C74C4D !important;
    }

</style>

<script src="/js/seller/products.js"></script>
</html>
