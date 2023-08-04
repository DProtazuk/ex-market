$(".add-to-favorites").click( function (){
    let id_product = $(this).attr("data-id");

    $(".add-to-favorites").addClass("d-none");
    $(".delete-to-favorites").removeClass("d-none");

    $.ajax({
        url: "/backend/client/favorite.php",
        method: 'POST',
        dataType: 'json',
        data: {
            action: 'add',
            id_product: id_product
        }
    });
});

$(".delete-to-favorites").click( function (){
    let id_product = $(this).attr("data-id");

    $(".delete-to-favorites").addClass("d-none");
    $(".add-to-favorites").removeClass("d-none");

    $.ajax({
        url: "/backend/client/favorite.php",
        method: 'POST',
        dataType: 'json',
        data: {
            action: 'delete',
            id_product: id_product
        }
    });
});


function ChekInputAmount() {
    var value = $("#quantity").val();
    value = value.replace(/[^0-9]/g, '');

// Проверяем, является ли значение целым числом
    if(!Number.isInteger(parseFloat(value))){
        // Если значение не является целым числом, удаляем последний символ
        value = value.slice(0, -1);

    }
    // Проверяем, является ли значение меньше 1
    if(parseFloat(value) < 1){
        // Если значение меньше 1, устанавливаем значение 1
        value = 1;
    }
    СheckMax(value);



}

function СheckMax(value){
    // Ограничиваем вводимое значение до 10
    let max = parseInt($("#max-quantity").val());
    if (value > max) {
        value = max;
    }
    // Обновляем значение поля ввода
    $("#quantity").val(value);

    let discount = $("#discount").val();

    let price = parseFloat($("#price").val());

    let amount = (price*value) - ((price*value)/100)*discount;
    $(".span-amount").html(amount+" ₽");
}



function Purchase() {
    let quantity = $("#quantity").val();

    if($.isEmptyObject(quantity)) {
        $(".h6-error").html("Введите колличество");
    }
    else {
        let url = new URL(window.location.href);
        let searchParams = new URLSearchParams(url.search);
        let id = searchParams.get('id');

        $.ajax({
            url: "/backend/client/order/add-order.php",
            method: 'POST',
            dataType: 'json',
            data: {
                quantity: quantity,
                id: id
            },
            success: function (data) {
                $(".h6-error").html("");
                console.log(data);
            }
        });
    }
}