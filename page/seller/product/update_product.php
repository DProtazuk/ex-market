<?php $idProduct = $_GET['id']; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/backend/MyFunction.php" ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/backend/Global_categories.php" ?>

<?php

$Global_categories = new Global_categories();
$MyFunction = new MyFunction();

if ($MyFunction->return_role() !== "multi_user") {
    header('Location: /page/seller/test');
}

$sql = "SELECT * FROM `shop` INNER JOIN `product` ON `shop`.`id` = `product`.`shop_id` WHERE `shop`.`seller_id` = ? AND `product`.`id` = ?";
$query = DB::connect()->prepare($sql);
$query->execute(array($_COOKIE['unique_id'], $idProduct));
$query = $query->fetch(PDO::FETCH_ASSOC);
if(!$query){
    header('Location: /page/seller/product/products');
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
    <title>Товар <?php echo $idProduct ?></title>
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/link/client/link.php"); ?>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
</head>
<body>

<!--Скрытый input активного меню-->

<input type="hidden" class="active_menu" data-type="sidebar" value="menu_sidebar_products"
       data-mini="menu_sidebar_products_mini">

<!--<input type="hidden" class="active_menu" data-type="sidebar" value="menu_sidebar_shops" data-mini="menu_sidebar_shops_mini">-->


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
                <form class="d-none" id="form_product" action="/backend/seller/update_product.php" method="post"
                      enctype="multipart/form-data">
                    <input type="hidden" class="idProduct" name="idProduct" value="<?php echo $idProduct ?>">
                    <input type="hidden" name="action" value="update_product">
                    <div class="col-12 d-flex justify-content-between m-auto mt-4">
                        <div class="shadow_status bg-silver rounded-4 d-flex justify-content-center align-items-center w-22">
                            <div class="bg-transparent div_imgLogo col-9 bg-danger Content justify-content-center position-relative">
                                <div class="img_div_imgLogo mx-auto"
                                     style="background: url('/res/img/testImgProduct.svg') no-repeat center center; border-radius: 50%;"></div>
                            </div>

                        </div>

                        <div class="shadow_status bg-silver rounded-4 p-3 py-5 w-75">
                            <div class="d-flex col-11 m-auto justify-content-between align-items-center">
                                <div class="d-flex justify-content-center align-items-center">
                                    <h6 class="text-white text-14 fw-bolder d-block my-auto">Наименование </h6>
                                    <a data-title="Наименование" class="d-flex align-items-center"><img
                                                class="cursor mx-2" width="20" src="/res/img/info.svg"></a>
                                </div>

                                <input id="name" name="name" class="col-8 text-white border-0 input-price-seller px-3">
                            </div>

                            <div class="d-flex col-11 m-auto justify-content-between align-items-center mt-3">
                                <div class="d-flex justify-content-center align-items-center">
                                    <h6 class="text-white text-14 fw-bolder d-block my-auto">Обложка</h6>
                                    <a data-title="Обложка" class="d-flex align-items-center"><img class="cursor mx-2"
                                                                                                   width="20"
                                                                                                   src="/res/img/info.svg"></a>
                                </div>

                                <div class="d-flex col-8 div-imgCover input-price-seller text-white px-2 p-1 d-flex">
                                    <label>
                                        <label class="cursor text-14" for="imgCover">Выбрать файл</label>
                                        <input id="imgCover" name="imgCover" type="file"/>
                                    </label>
                                    <span class="mx-4 text-secondary"
                                          id="fileInfo_imgCover">Расширения: png, jpg/jpeg</span>
                                </div>
                            </div>


                            <div class="d-flex col-11 m-auto justify-content-between align-items-center mt-3">
                                <div class="d-flex justify-content-center align-items-center">
                                    <h6 class="text-white text-14 fw-bolder d-block my-auto">Глобальная категория</h6>
                                    <a data-title="Глобальная категория" class="d-flex align-items-center"><img
                                                class="cursor mx-2" width="20" src="/res/img/info.svg"></a>
                                </div>

                                <div class=" selectGlCat input-price-seller col-8 div_GlobalCat">
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

                            <div class="d-flex col-11 m-auto justify-content-between align-items-center mt-3">
                                <div class="d-flex justify-content-center align-items-center">
                                    <h6 class="text-white text-14 fw-bolder d-block my-auto">Категория</h6>
                                    <a data-title="Категория" class="d-flex align-items-center"><img class="cursor mx-2"
                                                                                                     width="20"
                                                                                                     src="/res/img/info.svg"></a>
                                </div>

                                <div class="select_Cat input-price-seller col-8 div_Cat">
                                    <input class=" select__input_Cat" type="hidden" name="category" id="category">
                                    <div class=" select__head_Cat p-1 text-white px-2">Выбрать категорию</div>
                                    <ul class=" select__list_Cat select__item_standardCat p-1 bg-opacity-50"
                                        style="display: none;">
                                    </ul>
                                </div>
                            </div>

                            <div class="d-flex col-11 m-auto justify-content-between align-items-center mt-3">
                                <div class="d-flex justify-content-center align-items-center">
                                    <h6 class="text-white text-14 fw-bolder d-block my-auto">Цена</h6>
                                    <a data-title="Цена" class="d-flex align-items-center"><img class="cursor mx-2"
                                                                                                width="20"
                                                                                                src="/res/img/info.svg"></a>
                                </div>
                                <input name="price" min="0" id="price" type="number"
                                       class="col-8 text-white border-0 input-price-seller px-3 div_price price_input">
                            </div>

                            <div class="d-flex col-11 m-auto justify-content-between align-items-center mt-3 div_discount d-none">
                                <div class="d-flex justify-content-center align-items-center">
                                    <h6 class="text-white text-14 fw-bolder d-block my-auto">Скидка</h6>
                                    <a data-title="Цена" class="d-flex align-items-center"><img class="cursor mx-2"
                                                                                                width="20"
                                                                                                src="/res/img/info.svg"></a>
                                </div>
                                <div class="col-8 d-flex">
                                    <input name="discount" min="0" id="discount" type="number"
                                           class="col-2 text-white border-0 input-price-seller div_discounts px-3">
                                    <span class="mx-3 text-14">Цена со скидкой: <span class="discount_span"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-12 shadow_status bg-silver rounded-4 m-auto mt-4 p-4">
                        <div class="col-12 d-flex justify-content-between align-items-center">
                            <div class="col-6 d-flex">
                            <span data-block="update-product-1" onclick="parameter_product.call(this)"
                                  class="span_cr_red_product d-block text-white fw-bolder text-14 cursor">Описание товара</span>

                                <span class="d-block mx-4 text-white opacity-25 fw-light fw-bolder">|</span>

                                <span data-block="update-product-2" onclick="parameter_product.call(this)"
                                      class="span_cr_red_product d-block text-white fw-bolder text-14 opacity-25 cursor">Параметры товара</span>

                                <span class="d-block mx-4 text-white opacity-25 fw-light fw-bolder">|</span>

                                <span data-block="update-product-3" onclick="parameter_product.call(this)"
                                      class="span_cr_red_product d-block text-white fw-bolder text-14 opacity-25 cursor">Добавить товары</span>
                            </div>

                            <div class="col-2 d-flex justify-content-center">
                                <button type="button" form="form_product" onclick="but_update_product.call(this)"
                                        class="btn p-1 text-14 px-3 bg_blue shadow_status rounded d-flex justify-content-center align-items-center lh-1 fs-6 text-white">
                                    Изменить
                                </button>
                            </div>
                        </div>

                        <hr class="border-bottom my-5">

                        <div class="col-12 bg-dark bg-opacity-25 rounded">
                            <div class="col-12 rounded shadow">
                                <div class="update-product bg-silver update-product-1 col-12">
                                    <div class="col-12">
                                        <input type="hidden" name="txt_description_product"
                                               id="txt_description_product">
                                        <div id="summernote"></div>
                                    </div>
                                </div>

                                <div class="update-product d-none update-product-2 col-12">
                                    <div class="col-12 d-flex">
                                        <div class="col-6 left_parameters_category">

                                        </div>

                                        <div class="col-4 right_parameters_category">

                                        </div>
                                    </div>
                                    <br><br><br><br>
                                </div>

                                <div class="update-product d-none update-product-3 col-12">
                                    <textarea placeholder="Догрузить товары:" class="col-12 input-price-seller text-white p-2 border-0" name="textarea" id="" cols="30" rows="10"></textarea>

                                    <div class="col-12 p-3 rounded text-white input-price-seller div_account mt-4" style="max-height: 400px; overflow-y:scroll;">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div

</body>
<style>
    .img_div_imgLogo {
        position: absolute !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        bottom: 0 !important;
        background-size: cover !important;
        background-repeat: no-repeat !important;
        background-position: center center !important;
    }

    .Content:before {
        content: "" !important;
        display: block !important;
        padding-top: 100% !important;
    }

    .input-price-seller {
        background: linear-gradient(269.89deg, #151515 0.08%, #202020 99.91%);
        box-shadow: 0px 0px 4px 0.5px rgba(255, 249, 249, 0.1), inset 0px 4px 2px rgba(0, 0, 0, 0.25);
        border-radius: 5px;
    }

    input[type=date]::-webkit-calendar-picker-indicator {
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 24 24"><path fill="%23bbbbbb" d="M20 3h-1V1h-2v2H7V1H5v2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 18H4V8h16v13z"/></svg>');
    }

    #imgCover {
        display: none;
        opacity: 0;
        position: absolute;
        z-index: -1;
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

    .btn-bg-seller {
        background-color: #47A38E;
    }
    .btn-dg-danger, .btn-dg-danger:hover {
        background-color: #C74C4D;
    }
    .modal_bg {
        background-color: #282828 !important;
    }

</style>

<script src="/js/seller/update_product.js"></script>

</html>

<!-- Modal -->
<div class="modal fade" id="delete_account" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content bg-transparent text-white">
            <div class="modal-header modal_bg border-0 p-0">
                <div class="col-11 m-auto p-0 mt-5 my-3 border-bottom border-white border-2 border-opacity-10">
                    <h1 class="fs-5 fw-bold">Удалить аккаунт</h1>
                </div>
            </div>
            <div class="modal-body modal_bg p-0 border-0">
                <div class="col-11 m-auto p-0">
                    <p class="fs-6 my-fw opacity-75 data-id"></p>
                    <p class="text-14 opacity-75 text-truncate data-text"></p>

                </div>
            </div>
            <div class="modal_bg py-2 rounded-bottom">
                <div class="col-8 m-auto d-flex justify-content-between py-3">
                    <button data-account="" onclick="delete_account.call(this)" data-bs-dismiss="modal" type="button" class="btn btn-bg-seller fw-bold small_shadow col-4 text-white del-account">ок</button>
                    <button type="button" class="btn btn-dg-danger fw-bold small_shadow col-4 text-white" data-bs-dismiss="modal">отмена</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="update_account" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-transparent text-white">
            <div class="modal-header modal_bg border-0 p-0">
                <div class="col-11 m-auto p-0 mt-5 border-bottom border-white border-2 border-opacity-10">
                    <h1 class="fs-5 fw-bold">Изменить товар</h1>
                </div>
            </div>
            <div class="modal-body modal_bg p-0 border-0 rounded-bottom">
                <div class="col-11 m-auto p-0">
                    <p class="text-14 fs-5 opacity-75 modal_update_id">ID: 12</p>

                    <textarea class="col-12 mt-2 input-price-seller rounded border-0 p-3 text-white textarea_update_account" name="" id="" cols="30" rows="10"></textarea>

                    <div class="col-12 m-auto d-flex py-1 my-3">
                        <button onclick="update_account.call(this)" data-id="" type="button" class="btn btn-bg-seller fw-bold small_shadow col-3 text-white but_update_account" data-bs-dismiss="modal">изменить</button>
                        <button type="button" class="btn btn-dg-danger fw-bold small_shadow mx-3 col-3 text-white" data-bs-dismiss="modal">отмена</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
