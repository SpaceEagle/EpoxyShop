<?php
require 'Goods.php';

class Category {
    public static function showCategoryNew() {
        $pdo = DBConnect::getConnection();

        $query = "SELECT goods.id, goods.title, title_photo, price
        FROM goods, connection, categories
        WHERE goods.id = good_id
        AND category_id = id_category
        AND categories.title = 'new'
        LIMIT 4;";

        return $pdo->query($query)->fetchAll();
    }

    public static function getCategoryById($id) {
        $pdo = DBConnect::getConnection();

        $query = "SELECT * FROM `categories` WHERE `category_id` = ?;;";
        $result = $pdo->prepare($query);
        $result->execute([$id]);
        return $result->fetch();
    }

    public static function getCategories($id) {
        $pdo = DBConnect::getConnection();

        $query = "SELECT goods.id, goods.title, title_photo, price
        FROM goods, connection, categories
        WHERE goods.id = good_id
        AND category_id = id_category
        AND category_id = ?;";
        $result = $pdo->prepare($query);
        $result->execute([$id]);

        return $result->fetchAll();
    }

    public static function getCategoryList() {
        $pdo = DBConnect::getConnection();

        $query = "SELECT category_id, translation
                    FROM categories;";
        return $result = $pdo->query($query)->fetchAll();
    }

    public static function getSearch($word) {
        $pdo = DBConnect::getConnection();

        $query = "SELECT goods.id, goods.title, title_photo, price
                FROM goods, connection, categories
                WHERE goods.id = good_id
                AND category_id = id_category
                AND goods.title = ?;";

        $result = $pdo->prepare($query);
        $result->execute([$word]);

        return $result->fetchAll();
    }
}

?>