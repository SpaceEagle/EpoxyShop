<?php
require 'DBConnect.php';

class Goods {
    public static function getLimitGoods() {
        $pdo = DBConnect::getConnection();

        $query = "SELECT id, title, title_photo, price
        FROM goods
        ORDER BY title
        LIMIT 4;";
        return $pdo->query($query)->fetchAll();
    }

    public static function getAllGoods() {
        $pdo = DBConnect::getConnection();

        $query = "SELECT id, title, title_photo, price
        FROM goods
        ORDER BY title;";
        return $pdo->query($query)->fetchAll();
    }

    public static function getGoodById($id) {
        $pdo = DBConnect::getConnection();

        $query = "SELECT id, goods.title, title_photo, price, description, translation
        FROM goods, connection, categories
        WHERE goods.id = good_id
        AND category_id = id_category
        AND id = ?;";
        $result = $pdo->prepare($query);
        $result->execute([$id]);
        return $result->fetch();
    }

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

    // Удаление строки из БД
    public static function deleteItem() {
        $pdo = DBConnect::getConnection();
        if(isset($_POST['action']) && $_POST['action'] === 'Удалить') {
            $id = (int)$_POST['id'];

            // Удаляем картинку из запроса
            $query = "SELECT title_photo FROM goods WHERE id = ?;";
            $result = $pdo->prepare($query);
            $result->execute([$id]);

            // Записали ссылку на картинку в переменную
            $title_photo_path = $result->fetch()['title_photo'];
            
            // Проверяем есть ли картинка по выбранному пути
            if(file_exists($title_photo_path)) {
                unlink($title_photo_path);
            };
            
            // Улалям пользователя по id
            $query = "DELETE FROM goods WHERE id = ?;";
            $result = $pdo->prepare($query);
            $result->execute([$id]);

            header('Location: admin.php');
        };

    }

    // Редактирование строки в БД
    public static function updateItem() {
        $pdo = DBConnect::getConnection();

        if(isset($_POST['action']) && $_POST['action'] === 'Редактировать') {
            $id = (int)$_POST['id'];

            // Запрос в БД на вывод наших данных
            $query = "SELECT id, title, description, title_photo, price
            FROM goods
            WHERE id = ?;";
            $result = $pdo->prepare($query);
            $result->execute([$id]);
            $good_ch = $result->fetch();

            // Вывод формы редактирования
            echo <<<_HTML
            <article class="add-form-container">
                <a  class="add-form__close-btn">X</a>
                <h3 class="add-form__title">Добавляем новый товар</h3>
                <form class="add-form" method="POST" enctype="multipart/form-data">

                    <input type='hidden' name='id' value='$good_ch[id]'>
                    
                    <fieldset class="add-form-photo">
                        <legend class="add-form-photo__title">Загрузите обложку</legend>
                        <div class="add-form-photo__upload">
                            <div class="add-form-photo__preview">
                                <img src="$good_ch[title_photo]" alt="Обложка товара" width="40" height="60">
                            </div>
                            <div class="add-form-photo__field">
                                <label class="add-form-photo__loading" for="title_photo">Жду обложку...</label>
                                <input class="add-form-photo__input visually-hidden" id="title_photo" type="file" name="title_photo" required>
                            </div>
                        </div>
                    </fieldset>
                    
                    <fieldset class="add-form__element">
                        <label class="add-form__label">Название:</label>
                        <input type="text" name="title" required value="$good_ch[title]">
                    </fieldset>

                    <fieldset class="add-form__element">
                        <label class="add-form__label" for="price">Цена:</label>
                        <input id="price" type="number" name="price" required value="$good_ch[price]">
                    </fieldset>

                    <fieldset class="add-form__element add-form__textaria">
                        <label class="add-form__label">Описание:</label>
                        <textarea name="description" width="100%">$good_ch[description]</textarea>
                    </fieldset>

                    <input class="btn" type="submit" name="action" value="Обновить">

                </form>
            </article>
            _HTML;
        }

            if(isset($_POST['action']) && $_POST['action'] === 'Обновить') {
                // Проверка на пустоту
                if(!empty($_POST['title']) &&
                !empty($_POST['price'])) {
                    $title = htmlspecialchars(trim($_POST['title']));
                    $price = htmlspecialchars(trim($_POST['price']));
                    $description = htmlspecialchars(trim($_POST['description']));

                    // Снова ловим наш id
                    $id = (int)$_POST['id'];

                    // Картинка
                    $title_photo = $_FILES['title_photo'];

                    if($title_photo['size'] === 0) {
                        $query = "UPDATE goods
                        SET title = ?,
                        description = ?,
                        price = ?
                        WHERE id = ?;";
                        $result = $pdo->prepare($query);
                        $result->execute([$title, $description, $price, $id]);
                
                        header('Location: admin.php');
                    } else {
                        // Удаляем старую картинку
                        $query = "SELECT title_photo FROM goods WHERE id = ?;";
                        $result = $pdo->prepare($query);
                        $result->execute([$id]);
                        
                        // Записали ссылку на картинку в переменную
                        $title_photo_path = $result->fetch()['title_photo'];
                                        
                        // Проверяем есть ли картинка по выбранному пути
                        if(file_exists($title_photo_path)) {
                            unlink($title_photo_path);
                        };
                        // Путь для картинки
                        $title_photo_path = 'img/title_photo/' . $title_photo['size'] . '_' . time() . '_' . $title_photo['name'];
                        // Перемение картинки из временного хранилища в нужную папку
                        move_uploaded_file($title_photo['tmp_name'], $title_photo_path);
                        
                        $query = "UPDATE goods
                        SET title = ?,
                        description = ?,
                        price = ?,
                        title_photo = ?
                        WHERE id = ?;";
                        $result = $pdo->prepare($query);
                        $result->execute([$title, $description, $price, $title_photo_path, $id]);
                    }
                    header('Location: admin.php');
                } else {
                    echo "<h4>Вы что-то не заполнили, проверяйте!</h4>";
                }
    }
}

}