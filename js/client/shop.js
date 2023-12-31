$(document).ready(function () {
    write_start();

    $('body').on('mouseover', '.div-product', function () {
        $(this).css("min-height", "329px");
        $(this).css("max-height", "329px");

        $(this).find(".div-product-description").css("margin-top", "97px");

        $(this).find(".div_none").css("height", "73px");
        $(this).find(".div-product-h6").css("max-height", "50px");
        $(this).find(".div-product-h6").css("overflow", "hidden");

        $(this).find(".div-product-img .div-product-img-img").css("transform", "scale(1.3)");
        $(this).find(".div-product-description").css("background", "#343434");
    })
        .on('mouseout', '.div-product', function () {
            $(this).css("min-height", "314px");
            $(this).css("max-height", "314px");

            $(this).find(".div_none").css("height", "88px");

            $(this).find(".div-product-description").css("margin-top", "82px");
            $(this).find(".div-product-h6").css("max-height", "35px");
            $(this).find(".div-product-h6").css("overflow", "hidden");

            $(this).find(".div-product-img img").css("transform", "scale(1)");
            $(this).find(".div-product-description").css("background", "transparent");
        });


    $('body').on('click', '.sidebar_category', function () {
        let index = $(this).attr('data-index');
        let status = $(this).attr('data-status');

        var id = $(this).attr('data-id');

        if (parseFloat(status) === 0) {
            $(".sidebar_category_img_" + index).removeClass('d-none');
            $(".sidebar_category_circle_" + index).addClass('d-none');
            $(this).attr('data-status', 1);

            AddArraySubcategories(id);
        } else {
            $(".sidebar_category_circle_" + index).removeClass('d-none');
            $(".sidebar_category_img_" + index).addClass('d-none');
            $(this).attr('data-status', 0);

            DeleteArraySubcategories(id);
        }
    });

    $('body').on('click', '.sidebar_parameter', function () {
        let index = $(this).attr('data-index');
        let status = $(this).attr('data-status');

        var id = $(this).attr('data-id');

        if (parseFloat(status) === 0) {
            $(".sidebar_parameter_img_" + index).removeClass('d-none');
            $(".sidebar_parameter_circle_" + index).addClass('d-none');
            $(this).attr('data-status', 1);

            AddArrayParameters(id);

        } else {
            $(".sidebar_parameter_circle_" + index).removeClass('d-none');
            $(".sidebar_parameter_img_" + index).addClass('d-none');
            $(this).attr('data-status', 0);

            DeleteArrayParameter(id);
        }
    });

    $('body').on('click', '.uniqParameter', function () {
        let index = $(this).attr('data-index');
        let status = $(this).attr('data-status');

        var id = $(this).attr('data-id');
        var input = $(this).attr('data-input');

        if (parseFloat(status) === 0) {
            $(".uniqParameter_img_" + index).removeClass('d-none');
            $(".uniqParameter_circle_" + index).addClass('d-none');
            $(this).attr('data-status', 1);

            AdduniqParameter(input, id);

        } else {
            $(".uniqParameter_circle_" + index).removeClass('d-none');
            $(".uniqParameter_img_" + index).addClass('d-none');
            $(this).attr('data-status', 0);

            DeleteuniqParameter(input, id);
        }
    });

    function AdduniqParameter(input, id) {
        let myJson = $('.' + input).val();

        if (myJson !== '') {
            let myArray = JSON.parse(myJson);
            myArray.push(id);
            let array = JSON.stringify(myArray);
            $('.' + input).val(array);
        } else {
            let myArray = [];
            myArray.push(id);
            let array = JSON.stringify(myArray);
            $('.' + input).val(array);
        }
    }

    function DeleteuniqParameter(input, id) {
        let myJson = $('.' + input).val();
        let myArray = JSON.parse(myJson);

        var index = myArray.indexOf(id);

        if (index !== -1) {
            myArray.splice(index, 1);
            let array = JSON.stringify(myArray);
            $('.' + input).val(array);
        }
    }

    function AddArraySubcategories(id) {
        let myJson = $('#array-subcategories').val();

        if (myJson !== '') {
            let myArray = JSON.parse(myJson);
            myArray.push(id);
            let array = JSON.stringify(myArray);
            $('#array-subcategories').val(array);
        } else {
            let myArray = [];
            myArray.push(id);
            let array = JSON.stringify(myArray);
            $('#array-subcategories').val(array);
        }
    }


    function DeleteArraySubcategories(id) {
        let myJson = $('#array-subcategories').val();
        let myArray = JSON.parse(myJson);

        var index = myArray.indexOf(id);

        if (index !== -1) {
            myArray.splice(index, 1);
            let array = JSON.stringify(myArray);
            $('#array-subcategories').val(array);
        }
    }

    function AddArrayParameters(id) {
        let myJson = $('#array-parameters').val();

        if (myJson !== '') {
            let myArray = JSON.parse(myJson);
            myArray.push(id);
            let array = JSON.stringify(myArray);
            $('#array-parameters').val(array);
        } else {
            let myArray = [];
            myArray.push(id);
            let array = JSON.stringify(myArray);
            $('#array-parameters').val(array);
        }
    }


    function DeleteArrayParameter(id) {
        let myJson = $('#array-parameters').val();
        let myArray = JSON.parse(myJson);

        var index = myArray.indexOf(id);

        if (index !== -1) {
            myArray.splice(index, 1);
            let array = JSON.stringify(myArray);
            $('#array-parameters').val(array);
        }
    }


    $(".sidebar_geo").click(function () {
        let index = $(this).attr('data-index');
        let status = $(this).attr('data-status');

        if (parseFloat(status) === 0) {
            $(".sidebar_geo_img_" + index).removeClass('d-none');
            $(".sidebar_geo_circle_" + index).addClass('d-none');
            $(this).attr('data-status', 1);
        } else {
            $(".sidebar_geo_circle_" + index).removeClass('d-none');
            $(".sidebar_geo_img_" + index).addClass('d-none');
            $(this).attr('data-status', 0);
        }
    });

    $(".sidebar_parameters").click(function () {
        let index = $(this).attr('data-index');
        let status = $(this).attr('data-status');

        if (parseFloat(status) === 0) {
            $(".sidebar_parameters_img_" + index).removeClass('d-none');
            $(".sidebar_parameters_circle_" + index).addClass('d-none');
            $(this).attr('data-status', 1);
        } else {
            $(".sidebar_parameters_circle_" + index).removeClass('d-none');
            $(".sidebar_parameters_img_" + index).addClass('d-none');
            $(this).attr('data-status', 0);
        }
    });
});


$(".sidebar_input_price").on("input", function () {
    $('#slider').slider({
        range: true,
        min: 0,
        max: 15000,
        values: [$('#min').val(), $('#max').val()],
        slide: function (event, ui) {
            $('#min').val(ui.values[0]);
            $('#max').val(ui.values[1]);
        }
    });
});


function write_start() {
    let ShopId = $("#ShopId").val();
    let global_categories = $("#global_categories").val();

    $(".filter-shops-div-select-parameters").empty();
    $(".clear_input").val('');

    $.ajax({
        url: "/backend/client/shop_filter.php",
        method: 'POST',
        dataType: 'json',
        data: {
            action: 'write_start',
            IdShop: ShopId,
            global_categories: global_categories,
        },
        success: function (data) {
            $('#MaxPrice').val(data['MaxPrice']);
            $('#MinPrice').val(data['MinPrice']);
            PrintPrice();
            PrintSubcategories(data['subcategories']);

            PrintParameters(data['ParametersProduct']);
            PaginationRendering(parseInt(data['product']['count']), 1);

            PrintProduct(data['product']);
        }
    });
}

function PrintSubcategories(array) {
    let variable = $(".filter-shops-div-subcategories");

    variable.empty();
    variable.append('<h6 class="text-white text-center text-14 my-4">Категории</h6>');
    let index = 0;
    array.forEach(function (array) {
        index++;

        variable.append('<div data-status="0" data-index="' + index + '" data-id="' + array['id'] + '" class="col-8 mx-auto d-flex my-3 cursor sidebar_category">\n' +
            '        <div class="rounded-circle border border-white sidebar_category_circle_' + index + '" style="width: 12px; height: 12px"></div>\n' +
            '         <div class="rounded-circle bg_blue d-none sidebar_category_img_' + index + '" style="width: 12px; height: 12px"></div>\n' +
            '        <h6 class="text-12 text-white my-auto mx-2">' + array['name'] + '</h6>\n' +
            '    </div>');
    });
}

function PrintParameters(array) {
    var parameter = $(".filter-shops-div-parameters");
    var select = $(".filter-shops-div-select-parameters");

    parameter.empty();
    select.empty();

    let index = 0;

    array.forEach(function (array) {

        if (array['type'] === "select") {
            select.append("<h6 class=\"text-white text-center text-14 my-4 mt-5\">" + array['name'] + "</h6>");

            let ArraySelect = $.parseJSON(array['mass']);
            select.append();

            $(".div-array-select").append("<input type='hidden' class='uniqParameter" + array['id'] + "'>");

            let myJson = $('#array-parameters-uniq').val();

            let key = 'uniqParameter' + array['id'];

            if (myJson !== '') {
                let myArray = JSON.parse(myJson);
                myArray.push(key);
                let array = JSON.stringify(myArray);
                $('#array-parameters-uniq').val(array);
            } else {
                let myArray = [];
                myArray.push(key);
                let array = JSON.stringify(myArray);
                $('#array-parameters-uniq').val(array);
            }


            ArraySelect.forEach(function (SelectArray) {
                index++;

                select.append('<div data-status="0" data-index="' + index + '" data-id="' + SelectArray + '" data-input="uniqParameter' + array['id'] + '" class="col-8 mx-auto d-flex my-3 cursor uniqParameter">\n' +
                    '        <div class="rounded-circle border border-white uniqParameter_circle_' + index + '" style="width: 12px; height: 12px"></div>\n' +
                    '         <div class="rounded-circle bg_blue d-none uniqParameter_img_' + index + '" style="width: 12px; height: 12px"></div>\n' +
                    '        <h6 class="text-12 text-white my-auto mx-2">' + SelectArray + '</h6>\n' +
                    '    </div>');
            });
        } else {
            index++;
            parameter.append('<div data-status="0" data-index="' + index + '" data-id="' + array['id'] + '" class="col-8 mx-auto d-flex my-3 cursor sidebar_parameter">\n' +
                '        <div class="rounded-circle border border-white sidebar_parameter_circle_' + index + '" style="width: 12px; height: 12px"></div>\n' +
                '         <div class="rounded-circle bg_blue d-none sidebar_parameter_img_' + index + '" style="width: 12px; height: 12px"></div>\n' +
                '        <h6 class="text-12 text-white my-auto mx-2">' + array['name'] + '</h6>\n' +
                '    </div>');
        }
    });
}

function PrintPrice() {
    let max = parseInt($('#MaxPrice').val());
    let min = parseFloat($('#MinPrice').val());

    $('#slider').slider({
        range: true,
        min: min,
        max: max,
        values: [min, max],
        slide: function (event, ui) {
            $('#min').val(ui.values[0]);
            $('#max').val(ui.values[1]);
        }
    });

    $('#min').val(min);
    $('#max').val(max);
}

$(".sidebar_input_price").on("input", function () {
    let max = parseInt($('#MaxPrice').val());
    let min = parseFloat($('#MinPrice').val());

    $('#slider').slider({
        range: true,
        min: min,
        max: max,
        values: [$('#min').val(), $('#max').val()],
        slide: function (event, ui) {
            $('#min').val(ui.values[0]);
            $('#max').val(ui.values[1]);
        }
    });
});


$("body").on("click", '.show_sidebar', function () {
    let status = $(this).attr("data-status");

    if (status === "0") {
        $("." + $(this).attr("data-img")).addClass("transform");
        $("." + $(this).attr("data-img")).removeClass("transform2");
        $(this).attr("data-status", "1");
        $("." + $(this).attr("data-div")).removeClass("d-none");
    } else {
        $("." + $(this).attr("data-img")).addClass("transform2");
        $("." + $(this).attr("data-img")).removeClass("transform");
        $(this).attr("data-status", "0");
        $("." + $(this).attr("data-div")).addClass("d-none");
    }
});


$(".menu_filter").click(function () {
    $(".menu_filter").removeClass("menu_filter_active");
    $(this).addClass("menu_filter_active");
    $("#global_categories").val($(this).attr("id"));
    $(".name_gl_category").text($(this).find('h6').text());

    $(".div-array-select").empty();
    $(".clear_input").val('');

    $(".select__input_Filter_shops").val("default");
    $(".select__head_Filter_shops").text("Фильтровать по");

    write_start();
});


function ApplyFilter() {
    let ShopId = $("#ShopId").val();
    let global_categories = $("#global_categories").val();

    var page = $("#page").val();

    let input_search_product = $(".input_search_product").val();
    let select__input_Filter_shops = $(".select__input_Filter_shops").val();

    let min = $("#min").val();
    let max = $("#max").val();

    let ArraySubcategories = $("#array-subcategories").val();
    if (ArraySubcategories !== "") {
        ArraySubcategories = JSON.parse(ArraySubcategories);
    }

    let ArrayParameters = $("#array-parameters").val();
    if (ArrayParameters !== "") {
        ArrayParameters = JSON.parse(ArrayParameters);
    }

    var myArray = [];
    let ArrayParametersUniq = $("#array-parameters-uniq").val();
    if (ArrayParametersUniq !== "") {

        ArrayParametersUniq = JSON.parse(ArrayParametersUniq);

        ArrayParametersUniq.forEach(function (array) {
            var key = array.replace('uniqParameter', '');

            let arrays = $("." + array).val();
            if (arrays !== "") {
                arrays = JSON.parse(arrays);
                myArray.push([key, arrays]);
            }
        });
    }

    if (myArray.length === 0) {
        myArray = "";
    }

    $.ajax({
        url: "/backend/client/shop_filter.php",
        method: 'POST',
        dataType: 'json',
        data: {
            action: 'filter_product',
            IdShop: ShopId,
            global_categories: global_categories,
            ArraySubcategories: ArraySubcategories,
            ArrayParameters: ArrayParameters,
            ArrayParametersUniq: myArray,
            min: min,
            max: max,
            search: input_search_product,
            sort: select__input_Filter_shops,
            page: page
        },
        success: function (data) {
            console.log(data);

            PaginationRendering(data['count'], page);
            PrintProduct(data);
        }
    });
}


jQuery(($) => {
    $('.select_Filter_shops').on('click', '.select__head_Filter_shops', function () {
        if ($(this).hasClass('open')) {
            $(this).removeClass('open');
            $(this).next().fadeOut();
        } else {
            $('.select__head_Filter_shops').removeClass('open');
            $('.select__list_Filter_shops').fadeOut();
            $(this).addClass('open');
            $(this).next().fadeIn();
        }
    });

    $('.select_Filter_shops').on('click', '.select__item_Filter_shops', function () {
        $('.select__head_Filter_shops').removeClass('open');
        $(this).parent().fadeOut();
        $(this).parent().prev().text($(this).text());
        $(this).parent().prev().prev().val($(this).attr('id'));
        ApplyFilter();
        $(".ShowMore").removeClass("d-none");
    });

    $(document).click(function (e) {
        if (!$(e.target).closest('.select_Filter_shops').length) {
            $('.select__head_Filter_shops').removeClass('open');
            $('.select__list_Filter_shops').fadeOut();
        }
    });
});

$(".svg_spisok").click(function () {
    $(".div_print_product").addClass('opacity-0');
    $(this).removeClass('opacity-50');
    $(".svg_table").addClass('opacity-50');

    $(".display_type").val("table_spisok");
    $(".div_print_product").removeClass("d-flex", "flex-wrap");
    $('.div_print_product').css('gap', '0%');

    ApplyFilter();
    $(".div_print_product").removeClass('opacity-0');
});

$(".svg_table").click(function () {
    $(".div_print_product").addClass('opacity-0');

    $(this).removeClass('opacity-50');
    $(".svg_spisok").addClass('opacity-50');

    $(".display_type").val("table_table");
    $(".div_print_product").addClass("d-flex", "flex-wrap");
    $('.div_print_product').css('gap', '4%');

    ApplyFilter();
    $(".div_print_product").removeClass('opacity-0');

});

function PaginationRendering(items, currentPage) {
    let options = {
        items: items,
        itemsOnPage: 4,
        currentPage: currentPage,
        prevText: "<",
        nextText: ">",
        displayedPages: 4,
        edges: 1,

        onPageClick: function (pageNumber, event) {
            $("#page").val(pageNumber);
            event.preventDefault();
            // обработчик клика на страницу
            ApplyFilter();
            let totalPages = $('#pagination-container').pagination('getPagesCount');
            if (pageNumber === totalPages) {
                $(".ShowMore").addClass("d-none");
            } else {
                $(".ShowMore").removeClass("d-none");
            }
        }
    };

    $('#pagination-container').empty().pagination(options);
}

function PrintProduct(array) {
    let type = $(".display_type").val();
    $(".div_print_product").empty();

    if (type === "table_spisok") {
        array['data'].forEach(function (array) {
            table_spisok(array);
        });
    } else {
        array['data'].forEach(function (array) {
            table_table(array);
        });
    }
}

function table_spisok(array) {
    console.log(array);
    $(".div_print_product").append("<div class=\"text-decoration-none text-white col-12 d-flex justify-content-between  border border-0 border-bottom border-secondary my-2 py-3 border-opacity-50\">\n" +
        "                            <div class=\"col-1\">\n" +
        "                                <div class=\"col-12\">\n" +
        "                                    <div class=\"col-12 position-relative my-auto\">\n" +
        "                                        <img src=\"/res/img/img-category/" + array['global_categories_img'] + "\" class=\"position-absolute col-5 mx-auto fixed_product_img_category\">\n" +
        "                                        <img style=\"height:70px; object-fit: cover;\" class=\"col-12 rounded-4\" src=\"/res/img/imgProducts/" + array['product_cover'] + "\">\n" +
        "                                    </div>\n" +
        "                                </div>\n" +
        "                            </div>\n" +
        "                            <div class=\"col-11 d-flex flex-column Regular\">\n" +
        "                                <div class=\"col-12 d-flex justify-content-between mx-auto\">\n" +
        "                                    <div class=\"px-3\"></div>\n" +
        "                                    <a href=\"/page/client/product/product?id=" + array['product_id'] + "\" class=\"col-8 text-white text-14 text-decoration-none\">" + array['product_name'] + "</a>\n" +
        "                                    <span class=\"text-14 col-2 px-4\">Кол-во <span> " + array['quantity'] + "</span> шт.</span>\n" +
        "                                    <div class=\"col-2 d-flex\">\n" +
        "                                        <div class=\"col-8 mx-auto\">\n" +
        "                                            <button class=\"col-12 rounded-3 bg_blue border-0 text-white\">\n" +
        "                                                Купить\n" +
        "                                            </button>\n" +
        "                                        </div>\n" +
        "                                    </div>\n" +
        "                                </div>\n" +
        "                                <div class=\"col-12 d-flex justify-content-between my-2 mx-auto\">\n" +
        "                                   <div class=\"px-3\"></div>\n" +
        "                            <div class='col-8 d-flex'> " +
        "<h6 class=\"text-15 my-auto\">Магазин</h6> " +
        "<a href=\"/page/client/shop/shop?id=" + array['shop_id'] + "\" class=\"text_blue text-decoration-none Medium my-auto mx-2\">" + array['shop_name'] + "</a><" +
        "/div>"+
        "                                    <span class=\"text-14 d-block col-2 my-auto px-4\">Цена&nbsp;<span>" + array['price'] + "</span>р.</span>\n" +
        "                                    <div class=\"col-2 d-flex\">\n" +
        "                                        <span class=\"d-flex justify-content-center text-14 my-auto col-8 text-center mx-auto\">Рейтинг &nbsp;<h6 class=\"my-auto\">" + array['rating_value'] + "</h6></span>\n" +
        "                                    </div>\n" +
        "                                </div>\n" +
        "                            </div>\n" +
        "                        </div>");
}

function table_table(array) {
    $(".div_print_product").append("<div class=\"w-22 d-flex align-items-center  mb-5\" style=\"min-height: 334px; max-height: 334px;\">\n" +
        " <a href=\"/page/client/product.php\" class=\"text-decoration-none my-auto text-white col-12 rounded-4 div-product position-relative\" style=\"min-height: 314px; max-height: 314px; background-color:  !important;\">\n" +
        "                                <div class=\"col-12 position-absolute div-product-img  rounded-4\" style=\"overflow:hidden;\n" +
        "width: 100%; height: 172px;\">\n" +
        "                                    <img  src=\"/res/img/img-category/"+array['global_categories_img']+"\" class=\"position-absolute fixed_product_img_category\" style=\"z-index: 777\">\n" +
        "                                    <img style=\"height:172px; \" class=\"col-12 rounded-4  div-product-img-img\" src=\"/res/img/imgProducts/"+array['product_cover']+"\">\n" +
        "                                </div>\n" +
        "\n" +
        "                                <div class=\"col-12 px-3 rounded-4 div-product-description\" style=\"border: 1px solid rgba(255, 255, 255, 0.1); margin-top: 82px; height: 220px;\">\n" +
        "                                <div class=\"col-12 div_none\" style=\"height: 88px\"></div>\n" +
        "                                    <h6 class=\"text-13 mt-2 py-1 div-product-h6 Regular\" style=\"max-height: 35px; overflow: hidden;\">" +array['product_name']+
    "                             </h6>\n" +
    "\n" +
    "                                    <div class=\"d-flex my-2\">\n" +
    "                                        <h5 class=\"text-20 my-auto\">" +array['price']+"₽</h5>\n" +
    "                                        <h6 class=\"text-12 mx-2 my-auto\">" +array['quantity']+" шт.</h6>\n" +
    "                                    </div>\n" +
    "\n" +
    "                                    <div class=\"d-flex\">\n" +
    "                                        <div class=\"col-6 d-flex\">\n" +
    "                                            <button class=\"btn text-white text-center lh-1 d-flex col-12 my-auto text-14 bg-transparent border_blue btn_buy justify-content-center\"><span>Купить</span></button>\n" +
    "                                        </div>\n" +
    "\n" +
    "                                        <div class=\"col-6 px-3\">\n" +
    "                                            <div class=\"col-12 d-flex justify-content-between\">\n" +
    "                                                <img class=\"col-4 my-auto\" src=\"/res/img/elipse.png\">\n" +
    "                                                <h6 class=\"text-10  my-auto mx-1\">"+array['shop_name']+"</h6>\n" +
    "                                            </div>\n" +
    "\n" +
    "                                            <div class=\"col-12 d-flex justify-content-between\">\n" +
    "                                                <div class=\"col-4 text-center text-10 my-auto\">\n" +
    "                                                    "+array['rating_value']+"\n" +
    "                                                </div>\n" +
    "\n" +
    "                                                <div class=\"d-flex col-8 mx-1 my-auto\">\n" +
    "                                                    "+array['rating']+
    "                                                </div>\n" +
    "                                            </div>\n" +
    "                                        </div>\n" +
    "                                    </div>\n" +
    "                                </div>\n" +
    "                            </a>\n" +
    "</div>"
)
    ;
}

