$(".img-payment-method").click( function (){
    $(".img-payment-method").removeClass("border_blue_2");
    $(this).addClass("border_blue_2");

    $(".input_payment_method").val("1");
});

$(".but_amount").click( function (){
    $(".input-payment-amount").val($(this).attr("data-amount"));
});

$('input[type="number"]').on('input', function(){
    // Получаем значение поля
    var value = $(this).val();
    // Проверяем, является ли значение целым числом
    if(!Number.isInteger(parseFloat(value))){
        // Если значение не является целым числом, удаляем последний символ
        $(this).val(value.slice(0, -1));
    }
    // Проверяем, является ли значение меньше 1
    if(parseFloat(value) < 1){
        // Если значение меньше 1, устанавливаем значение 1
        $(this).val(1);
    }
});

$(".button-top-up").click( function () {
    let input_payment_method = $(".input_payment_method").val();

    if(input_payment_method !== ""){
        let input = $('input[type="number"]').val();

        if(input !== ""){

        }
        else {
            $('input[type="number"]').focus();
            alert("Введите сумму");
        }
    }
    else alert("Выберите метод оплаты");
});