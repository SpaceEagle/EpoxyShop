<?php
require 'DBConnect.php';

class Admin {
// Содание новой таблицы в БД
    public static function createNewTable() {
        $pdo = DBConnect::getConnection();

        $query = "CREATE TABLE IF NOT EXISTS goods(
            `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `title` varchar(255) NOT NULL,
            `description` text DEFAULT NULL,
            `title_photo` text NOT NULL,
            `photos` text DEFAULT NULL,
            `price` int(11) NOT NULL
        );";

        return $pdo->exec($query);
    }

    // Добавление новой строки в БД
    public static function createNewItem() {
        $pdo = DBConnect::getConnection();

        if(isset($_POST['action']) && $_POST['action'] === 'Добавить') {
            // данные о картинке
            $title_photo = $_FILES['title_photo'];
            
            // Проверка на пустоту всех полей формы
            if(!empty($_POST['title']) &&
                !empty($_POST['price']) &&
                $title_photo['size'] !== 0) {
                    $title = htmlspecialchars(trim($_POST['title']));
                    $price = htmlspecialchars(trim($_POST['price']));
                    $description = htmlspecialchars(trim($_POST['description']));
                    // Путь для картинки
                    $title_photo_path = 'img/title_photo/' . $title_photo['size'] . '_' . time() . '_' . $title_photo['name'];

                    // Перемение картинки из временного хранилища в нужную папку
                    move_uploaded_file($title_photo['tmp_name'], $title_photo_path);

                    // Записываем данные в БД
                    $query = "INSERT INTO goods VALUES (?, ?, ?, ?, ?, ?);";
                    $result = $pdo->prepare($query);
                    $result->execute([NULL, $title, $description, $title_photo_path, '', $price]);

                    // Очищаем строку запроса и перезагружаем страницу
                    header('Location: admin.php');
            } else {
                echo "<h4>Вы что-то не заполнили, проверяйте!</h4>";
            };
        };
    }
}


?>