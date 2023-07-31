<?php include($_SERVER['DOCUMENT_ROOT'] . "/print.php"); ?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новое сообщение</title>
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
                        <h6>Создать тикет</h6>

                        <div class="col-4 d-flex justify-content-end">
                            <a href="/page/client/messages.php" class="btn text-white text-center lh-1 d-flex col-4 my-auto text-14 bg-transparent border_blue btn_buy justify-content-center mx-3"><span>Назад</span></a>
                            <a href="/page/messages.php" class="text-decoration-none btn text-white text-center lh-1 d-flex col-4 my-auto text-14 bg-transparent bg_blue btn_buy justify-content-center px-4"><span>Отправить</span></a>
                        </div>
                    </div>

                    <div class="col-12 d-flex my-4">
                        <h6 class="text-14 my-auto">Причина обращения</h6>

                        <div class="mx-3 select select_Gl_Cat input-price-seller rounded-2 w-25 text-13" style="background-color: rgba(255, 255, 255, 0.1) !important; min-height: 28px; !important; border: 1px solid rgba(255, 255, 255, 0.4);">
                            <input class="select__input select__input_Gl_Cat" type="hidden" name="">
                            <div class="select__head select__head_Gl_Cat p-1 text-white px-2 text-13 text-opacity-75" >Выбрать
                            </div>
                            <ul class="select__list select__list_Gl_Cat p-1 bg-opacity-50 " style="display: none;">

                            </ul>
                        </div>
                    </div>

                    <textarea class="col-12 my-4 border_input" style="background: rgba(255, 255, 255, 0.1);
border-radius: 5px;" name="" id="" cols="30" rows="10"></textarea>
                    <button class="btn text-white text-center lh-1 d-flex col-2 mx-auto my-auto text-14 bg-transparent border_blue btn_buy justify-content-center"><span>Добавить фото</span></button>
                </div>

                <div class="col-12 d-flex justify-content-between my-4 rounded-4 bg-silver" style="min-height: 250px;">

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        $(".svg_message_header_active").removeClass("d-none");
        $(".svg_message_header").addClass("d-none");
    });

</script>
</body>
</html>