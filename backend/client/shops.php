<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/backend/DB.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/backend/Shop.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/backend/Product.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/backend/MyFunction.php";


if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case "Select_Shops_Filter":
            echo Select_Shops_Category();
            break;
        case "Select_Shops_ShowMore":
            echo Select_Shops_ShowMore();
            break;
        default:
            echo "Today is some other day";
            break;
    }
}


function Select_Shops_Category()
{
    $category = $_POST['category'];
    $sort = $_POST['parameter'];
    $search = $_POST['search'];
    $page = $_POST['page'];

    $limit = 5;

    $QueryCount = "SELECT COUNT( DISTINCT `shop`.`id`) as count FROM `shop` JOIN `product` ON `shop`.`id` = `product`.`shop_id`";
    $QueryCountParameters = array();

    $query = "SELECT DISTINCT `shop`.`id`, `shop`.`name`, `shop`.`heading`, `shop`.`logo`, `shop`.`rating`, `shop`.`fake_rating` FROM `shop` JOIN `product` ON `shop`.`id` = `product`.`shop_id`";
    $params = array();

    if ($category !== "all") {
        $query .= " WHERE `product`.`global_category`= :category";
        $params['category'] = $category;

        $QueryCount .= " WHERE `product`.`global_category`= :category";
        $QueryCountParameters['category'] = $category;
    }
    if (!empty($search)) {
        if ($category !== "all") {
            $query .= " AND `shop`.`name` LIKE :search";
            $QueryCount .= " AND `shop`.`name` LIKE :search";
        } else {
            $query .= " WHERE `shop`.`name` LIKE :search";
            $QueryCount .= " WHERE `shop`.`name` LIKE :search";
        }

        $params['search'] = '%' . $search . '%';
        $QueryCountParameters['search'] = '%' . $search . '%';
    }
    if (!empty($sort)) {
        if ($sort === "ascending_name") {
            $query .= " ORDER BY `shop`.`name` ASC";
            $QueryCount .= " ORDER BY `shop`.`name` ASC";
        }
        if ($sort === "decreasing_name") {
            $query .= " ORDER BY `shop`.`name` DESC";
            $QueryCount .= " ORDER BY `shop`.`name` DESC";
        }
        if ($sort === "ascending_rating") {
            $query .= " ORDER BY IFNULL(`shop`.`fake_rating`, `shop`.`rating`) ASC";
            $QueryCount .= " ORDER BY IFNULL(`shop`.`fake_rating`, `shop`.`rating`) ASC";
        }
        if ($sort === "decreasing_rating") {
            $query .= " ORDER BY IFNULL(`shop`.`fake_rating`, `shop`.`rating`) DESC";
            $QueryCount .= " ORDER BY IFNULL(`shop`.`fake_rating`, `shop`.`rating`) DESC";
        }
    }

    if ($page === 1) {
        $offset = 1;
    } else {
        $offset = ($page - 1) * $limit;
    }

    $query .= " LIMIT :limit OFFSET :offset";
    $params['limit'] = $limit;
    $params['offset'] = $offset;

    $db = DB::connect();
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $QueryCount = $db->prepare($QueryCount);
    $QueryCount->execute($QueryCountParameters);
    $QueryCount = $QueryCount->fetch(PDO::FETCH_ASSOC);
    $count = $QueryCount['count'];

    $sth = $db->prepare($query);
    $sth->bindParam(':limit', $limit, PDO::PARAM_INT);
    $sth->bindParam(':offset', $offset, PDO::PARAM_INT);

    $sth->execute($params);

    $sth = $sth->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($sth)) {

        foreach ($sth as &$value) {
            $MyFunction = new MyFunction();

            if ($value['fake_rating'] !== NULL) {
                $value["rating_value"] = $value['fake_rating'];
                $value["rating"] = $MyFunction->create_rating($value['fake_rating']);
            } else {
                $value["rating_value"] = $value['rating'];
                $value["rating"] = $MyFunction->create_rating($value['rating']);
            }
            unset($value["fake_rating"]);
        }

        $array = [
            "items" => $count,
            "array" => $sth
        ];
        return json_encode($array);
    } else return 0;
}

function Select_Shops_ShowMore()
{
    $category = $_POST['category'];
    $sort = $_POST['parameter'];
    $search = $_POST['search'];
    $page = $_POST['page'];

    $limit = 5;

    $query = "SELECT DISTINCT `shop`.`id`, `shop`.`name`, `shop`.`heading`, `shop`.`logo`, `shop`.`rating`, `shop`.`fake_rating` FROM `shop` JOIN `product` ON `shop`.`id` = `product`.`shop_id`";
    $params = array();

    if ($category !== "all") {
        $query .= " WHERE `product`.`global_category`= :category";
        $params['category'] = $category;
    }
    if (!empty($search)) {
        if ($category !== "all") {
            $query .= " AND `shop`.`name` LIKE :search";
        } else {
            $query .= " WHERE `shop`.`name` LIKE :search";
        }

        $params['search'] = '%' . $search . '%';
    }

    if (!empty($sort)) {
        if ($sort === "ascending_name") {
            $query .= " ORDER BY `shop`.`name` ASC";
        }
        if ($sort === "decreasing_name") {
            $query .= " ORDER BY `shop`.`name` DESC";
        }
        if ($sort === "ascending_rating") {
            $query .= " ORDER BY IFNULL(`shop`.`fake_rating`, `shop`.`rating`) ASC";
        }
        if ($sort === "decreasing_rating") {
            $query .= " ORDER BY IFNULL(`shop`.`fake_rating`, `shop`.`rating`) DESC";
        }
    }

    if ($page === 1) {
        $offset = 0;
    } else {
        $offset = $page * $limit;
    }

    $query .= " LIMIT :limit OFFSET :offset";
    $params['limit'] = $limit;
    $params['offset'] = $offset;

    $db = DB::connect();
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $sth = $db->prepare($query);
    $sth->bindParam(':limit', $limit, PDO::PARAM_INT);
    $sth->bindParam(':offset', $offset, PDO::PARAM_INT);

    $sth->execute($params);

    $sth = $sth->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($sth)) {

        foreach ($sth as &$value) {
            $MyFunction = new MyFunction();

            if ($value['fake_rating'] !== NULL) {
                $value["rating_value"] = $value['fake_rating'];
                $value["rating"] = $MyFunction->create_rating($value['fake_rating']);
            } else {
                $value["rating_value"] = $value['rating'];
                $value["rating"] = $MyFunction->create_rating($value['rating']);
            }
            unset($value["fake_rating"]);
        }

        $array = [
            "array" => $sth
        ];
        return json_encode($array);
    } else return 0;
}