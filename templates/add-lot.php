<?php

require_once 'functions.php';

$categories = require_once('config/categories.php');


$lot_name = clear_data($_POST['lot-name']);
$category = clear_data($_POST['category']);
$message  = clear_data($_POST['message']);
$lot_rate = clear_data($_POST['lot-rate']);
$lot_step = clear_data($_POST['lot-step']);
$lot_date = clear_data($_POST['lot-date']);
$errors   = [];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (empty($lot_name)) {
        $errors['name'] = 'Введите наименование лота' ?? false;
    }
    
    if (mb_strlen($lot_name) > 10) {
        $errors['name'] = 'Имя должно быть не больше 10 символов' ?? false;
    }
    
    if (empty($category)) {
        $errors['category'] = 'Выберете категорию';
    }
    
    if (empty($message)) {
        $errors['message'] = 'Напишите описание лота';
    }
    
    if (empty($lot_rate)) {
        $errors['rate'] = 'Введите начальную цену';
    }
    
    if (empty($lot_step)) {
        $errors['step'] = 'Введите начальную цену';
    }
    
    if ( ! filter_var($lot_rate, FILTER_VALIDATE_FLOAT) && ! empty($lot_rate)) {
        $errors['rate'] = 'Здесь должно быть только число';
    }
    
    if ( ! filter_var($lot_step, FILTER_VALIDATE_FLOAT) && ! empty($lot_step)) {
        $errors['step'] = 'Здесь должно быть только число';
    }
    
    if (empty($lot_date)) {
        $errors['date'] = 'Введите дату завершения торгов';
    }
    
    if (isset($_FILES['file'])) {
        $file_name = $_FILES['file']['name'];
        $file_tmp  = $_FILES['file']['tmp_name'];
        $file_type = $_FILES['file']['type'];
        $file_size = $_FILES['file']['size'];
        
        if ($file_size > 2097152) {
            $errors['file'] = 'Файл должен быть 2мб';
        }
        
        if ($file_type !== "image/jpeg") {
            $errors['file'] = 'Неверный формат';
        }
        
        if (empty($errors['file'])) {
            move_uploaded_file($file_tmp, "img/" . $file_name);
            $file_class = 'form__item--uploaded';
        }
    }
    
    if ( ! count($errors)) {
        Header("Location:" . $_SERVER['HTTP_REFERER'] . "?mes=success");
    }
}

?>

<main>
    <nav class="nav">
        <ul class="nav__list container">
            <?php foreach ($categories as $category) : ?>
                <li class="nav__item">
                    <a href="all-lots.html"><?= $category ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
    <form class="form form--add-lot container <?php if ($errors) {
        echo 'form--invalid';
    } ?>" action="/add.php" method="post" enctype="multipart/form-data"
    >
        <!-- form--invalid -->
        <h2>Добавление лота</h2>
        <div class="form__container-two">
            <div class="form__item <?php if ($errors['name']) {
                echo 'form__item--invalid';
            } ?>"
            > <!-- form__item--invalid -->
                <label for="lot-name">Наименование</label>
                <input id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота"
                       value="<?php echo $_POST['lot-name'] ?>"
                >
                <span class="form__error"<?php if ($errors['name']) {
                    echo 'style="display: block"';
                } ?>>
                    <?php echo $errors['name'] ?>
                </span>
                <?php echo $errors['name'] ?>
            
            
            </div>
            <div class="form__item">
                <label for="category">Категория</label>
                <select id="category" name="category">
                    <option>Выберите категорию</option>
                    <option>Доски и лыжи</option>
                    <option>Крепления</option>
                    <option>Ботинки</option>
                    <option>Одежда</option>
                    <option>Инструменты</option>
                    <option>Разное</option>
                </select>
                <span class="form__error"><?php echo $errors['category'] ?></span>
                <?php echo $errors['category'] ?>
            </div>
        </div>
        <div class="form__item form__item--wide <?php if ($errors['message']) {
            echo 'form__item--invalid';
        } ?>"
        >
            <label for="message">Описание</label>
            <textarea id="message" name="message" placeholder="Напишите описание лота"></textarea>
            <span class="form__error" <?php if ($errors['message']) {
                echo 'style="display: block"';
            } ?>><?php echo $errors['message'] ?></span>
        </div>
        <div class="form__item form__item--file <?= $file_class ?? false ?>"> <!-- form__item--uploaded -->
            <label>Изображение</label>
            <div class="preview">
                <button class="preview__remove" type="button">x</button>
                <div class="preview__img">
                    <img src="img/<?= $file_name ?? false ?>" width="113" height="113" alt="Изображение лота">
                </div>
            </div>
            <div class="form__input-file">
                <input class="visually-hidden" type="file" name="file" id="photo2" value="">
                <label for="photo2">
                    <span>+ Добавить</span>
                </label>
            </div>
            <span class="form__error" <?php if ($errors['file']) {
                echo 'style="display: block"';
            } ?>><?php echo $errors['file'] ?></span>
        </div>
        <div class="form__container-three">
            <div class="form__item form__item--small <?php if ($errors['rate']) {
                echo 'form__item--invalid';
            } ?>"
            >
                <label for="lot-rate">Начальная цена</label>
                <input id="lot-rate" type="text" name="lot-rate" placeholder="0"
                       value="<?php echo $_POST['lot-rate'] ?>"
                >
                <span class="form__error" <?php if ($errors['rate']) {
                    echo 'style="display: block"';
                } ?>><?php echo $errors['rate'] ?></span>
            </div>
            <div class="form__item form__item--small <?php if ($errors['step']) {
                echo 'form__item--invalid';
            } ?>"
            >
                <label for="lot-step">Шаг ставки</label>
                <input id="lot-step" type="text" name="lot-step" placeholder="0"
                       value="<?php echo $_POST['lot-step'] ?>"
                >
                <span class="form__error" <?php if ($errors['step']) {
                    echo 'style="display: block"';
                } ?>><?php echo $errors['step'] ?></span>
            </div>
            <div class="form__item <?php if ($errors['date']) {
                echo 'form__item--invalid';
            } ?>"
            >
                <label for="lot-date">Дата окончания торгов</label>
                <input class="form__input-date" id="lot-date" type="date" name="lot-date"
                       value="<?php echo $_POST['lot-date'] ?>"
                >
                <span class="form__error" <?php if ($errors['date']) {
                    echo 'style="display: block"';
                } ?>><?php echo $errors['date'] ?></span>
            </div>
        </div>
        <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
        <button type="submit" class="button">Добавить лот</button>
    </form>
</main>
