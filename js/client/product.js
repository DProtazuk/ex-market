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