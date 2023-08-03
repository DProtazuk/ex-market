<?php ?>

//include $_SERVER['DOCUMENT_ROOT'] . "/backend/DB.php";
//include $_SERVER['DOCUMENT_ROOT'] . "/backend/Subcategories.php";
//
//$Subcategories = new Subcategories();
//$IdShop = 1;
//$Global_categoriesID = 1;
//
//$SubcategoriesArray = $Subcategories->SelectAll($Global_categoriesID);
//$parameters = $Subcategories->SelectCategoryEndParameters($Global_categoriesID);
//
//
//function SelectProduct($idShop, $idSubcategories)
//{
//    $sql = DB::connect()->prepare("SELECT `product`.`id` FROM `subcategories` INNER JOIN `product` ON `subcategories`.`id` = `product`.`category` WHERE `product`.`shop_id` = ? AND `product`.`category` = ?");
//    $sql->execute(array($idShop, $idSubcategories));
//    $array = $sql->fetchAll(PDO::FETCH_ASSOC);
//
//    return $array;
//}
//
//
//$array = [];
//
//foreach ($SubcategoriesArray as $item) {
//
//    $SelectProduct = SelectProduct($IdShop, $item['id']);
//
//    if(!empty($SelectProduct)){
//        $mass = [
//            "Subcategories" => $item['name'],
//            "product" =>  $SelectProduct
//        ];
//        array_push($array, $mass);
//    }
//}
//
//print_r($array);

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Массив и JSON</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
$(document).ready(function() {
    var myArray = [];

    $('#addBtn').click(function() {
        var inputValue = $('#myInput').val();
        if (inputValue !== '') {
            myArray.push(inputValue);
            $('#myInput').val('');
            updateArray();
        }
    });

    $('#myInput').keypress(function(e) {
        if (e.which == 13) {
            e.preventDefault();
            $('#addBtn').click();
        }
    });

    function updateArray() {
        var myJson = JSON.stringify(myArray);
        $('#myArray').val(myJson);
        console.log(myJson);
    }

    function isInArray(value, array) {
        return array.indexOf(value) > -1;
    }

    function removeFromArray(value, array) {
        var index = array.indexOf(value);
        if (index > -1) {
            array.splice(index, 1);
        }
    }

    $('#checkBtn').click(function() {
        var checkValue = $('#checkInput').val();
        if (isInArray(checkValue, myArray)) {
            $('#checkResult').text(checkValue + ' уже есть в массиве');
        } else {
            $('#checkResult').text(checkValue + ' нет в массиве');
        }
    });

    $('#removeBtn').click(function() {
        var removeValue = $('#removeInput').val();
        removeFromArray(removeValue, myArray);
        updateArray();
    });
});
  </script>
</head>
<body>
<br>
  <input type="text" id="myInput">
  <button id="addBtn">Добавить</button>
  <br>
  <input type="text" id="checkInput">
  <button id="checkBtn">Проверить</button>
  <span id="checkResult"></span>
  <br>
  <input type="text" id="removeInput">
  <button id="removeBtn">Удалить</button>
  <br>
  <input type="hidden" id="myArray" name="myArray">
</body>
</html>