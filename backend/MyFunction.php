<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/backend/DB.php");

class MyFunction
{
    public function checking_array_post($array)
    {
        $status = 0;

        foreach ($array as $item) {
            if (empty($_POST[$item])) {
                $status = 1;
                break;
            }
        }

        if ($status === 1)
            return false;
        else return true;
    }

    public function random_unique_id()
    {
        return uniqid("unique_" . time());
    }

    public function random_link()
    {
        return uniqid(time());
    }

    public function return_role()
    {

        $unauthorized = "unauthorized";
        $client = "client";
        $multi_user = "multi_user";


        if (isset($_COOKIE['unique_id'])) {
            $sth = DB::connect()->prepare("SELECT * FROM `role` WHERE `unique_id` = ?");
            $sth->execute(array($_COOKIE['unique_id']));
            $array = $sth->fetch(PDO::FETCH_ASSOC);

            if ($array) {
                if ($array['seller'] === 1) {
                    return $multi_user;
                } else return $client;
            } else return $unauthorized;

        } else return $unauthorized;
    }

    public function random()
    {
        return time() * rand(15, 100) - date("d");
    }

    public function getExtension($str)
    {
        $i = explode('.', $str);
        return strtolower(end($i));
    }

    public function create_rating($num)
    {
        $rating = $num;

        // Округление оценки до ближайшего 0,5
        $rounded_rating = round($rating * 2) / 2;

    // Количество полных звезд
        $full_stars = floor($rounded_rating);

    // Определяем, нужна ли нам полузвезда
        $half_star = ($rounded_rating - $full_stars) >= 0.5;

    // HTML-код для отображения звезд
        $star_html = '';
        for ($i = 0; $i < $full_stars; $i++) {
            $star_html .= '<img width="10" height="10" src="/res/img/rating/full-star.png">';
        }
        if ($half_star) {
            $star_html .= '<img width="10" height="10" src="/res/img/rating/half-star.png">';
        }
        for ($i = 0; $i < 5 - $full_stars - ($half_star ? 1 : 0); $i++) {
            $star_html .= '<img width="10" height="10" src="/res/img/rating/empty-star.png">';
        }

    // Отображаем HTML-код звезд
        return $star_html;
    }

    public function create_ratingShop($num)
    {
        $rating = $num;

        // Округление оценки до ближайшего 0,5
        $rounded_rating = round($rating * 2) / 2;

        // Количество полных звезд
        $full_stars = floor($rounded_rating);

        // Определяем, нужна ли нам полузвезда
        $half_star = ($rounded_rating - $full_stars) >= 0.5;

        // HTML-код для отображения звезд
        $star_html = '';
        for ($i = 0; $i < $full_stars; $i++) {
            $star_html .= '<img width="15" height="15" src="/res/img/rating/full-star.png">';
        }
        if ($half_star) {
            $star_html .= '<img width="15" height="15" src="/res/img/rating/half-star.png">';
        }
        for ($i = 0; $i < 5 - $full_stars - ($half_star ? 1 : 0); $i++) {
            $star_html .= '<img width="15" height="15" src="/res/img/rating/empty-star.png">';
        }

        // Отображаем HTML-код звезд
        return $star_html;
    }
}