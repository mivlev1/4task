<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>4task</title>
</head>

<body>
<div class="block_form" id="form">
    <div class="top_bot">
        <h1>Form</h1>
        <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="form">
            <div pl-2 class="form-row">
                <label>Имя:</label>
                <input class="form-control <?php if (!empty($nameErr)) {
                    echo 'bg-danger text-light is-invalid';
                } else {
                    echo 'is-valid';
                } ?>" <?php
                if (isset($_COOKIE['name'])) {
                    echo 'value="' . $_COOKIE['name'] . '"';
                } ?> type="text" name="field-name" class="form-control" required>
                <?php
                if (!empty($nameErr)) {
                    echo '<span class="text-danger">' . $nameErr . '</span>';
                }
                ?>
            </div>
            <div class="form-group">
                <label>Поле email:</label>
                <input class="form-control <?php if (!empty($emailErr)) {
                    echo 'bg-danger text-light is-invalid';
                } else {
                    echo 'is-valid';
                } ?>" <?php
                if (isset($_COOKIE['email'])) {
                    echo 'value="' . $_COOKIE['email'] . '"';
                } ?> name="field-email" type="email" required>
                <?php
                if (!empty($emailErr)) {
                    echo '<span class="text-danger">' . $emailErr . '</span>';
                }
                ?>
            </div>

            <label>Дата рождения:</label>
            <input class="form-control" name="field-date" <?php
            if (isset($_COOKIE['data'])) {
                echo 'value="' . $_COOKIE['data'] . '"';
            } else {
                echo 'value="2002-08-06"';
            }
            ?> type="date" required />

            <label>Пол:</label>
            <br />
            <div class="custom-control custom-radio form-check-inline">
                <input type="radio" id="genderRadio1" name="radio-gender" value=0 class="custom-control-input" <?php
                if (isset($_COOKIE['gender']) == 0) {
                    echo 'checked';
                } ?> />
                <label class="custom-control-label" for="genderRadio1"> Мужской </label>
            </div>
            <div class="custom-control custom-radio form-check-inline">
                <input type="radio" id="genderRadio2" name="radio-gender" value=1 class="custom-control-input" <?php
                if (isset($_COOKIE['gender']) == 1) {
                    echo 'checked';
                } ?> />
                <label class="custom-control-label" for="genderRadio1"> Женский </label>
            </div>
            <br />

            <label>Кол-во конечностей:</label>
            <br />
            <div class="custom-control custom-radio form-check-inline">
                <input type="radio" id="konechRadio0" name="radio-konech" value=0 class="custom-control-input" <?php
                if (isset($_COOKIE['konech']) == 0) {
                    echo 'checked';
                } ?> />
                <label class="custom-control-label" for="konechRadio0">0</label>
            </div>
            <div class="custom-control custom-radio form-check-inline">
                <input type="radio" id="konechRadio1" name="radio-konech" value=1 class="custom-control-input" <?php
                if (isset($_COOKIE['konech']) == 1) {
                    echo 'checked';
                } ?> />
                <label class="custom-control-label" for="konechRadio1">1</label>
            </div>
            <div class="custom-control custom-radio form-check-inline">
                <input type="radio" id="konechRadio2" name="radio-konech" value=2 class="custom-control-input" <?php
                if (isset($_COOKIE['konech']) == 2) {
                    echo 'checked';
                } ?> />
                <label class="custom-control-label" for="konechRadio2">2</label>
            </div>
            <div class="custom-control custom-radio form-check-inline">
                <input type="radio" id="konechRadio3" name="radio-konech" value=3 class="custom-control-input" <?php
                if (isset($_COOKIE['konech']) == 3) {
                    echo 'checked';
                } ?> />
                <label class="custom-control-label" for="konechRadio3">3</label>
            </div>
            <div class="custom-control custom-radio form-check-inline">
                <input type="radio" id="konechRadio4" name="radio-konech" value=4 class="custom-control-input" <?php
                if (isset($_COOKIE['konech']) == 4) {
                    echo 'checked';
                } ?> />
                <label class="custom-control-label" for="konechRadio4">4</label>
            </div>
            <br />


            <label>Ваши сверхспособности:</label>
            <br />
            <select multiple="true" name="superpower[]" required>
                <option value="Бессмертие">Бессмертие</option>
                <option value="Прохождение сквозь стены">Прохождение сквозь стены</option>
                <option value="Левитация">Левитация</option>
            </select>
            <br />

            <label>Биография:</label>
            <br />
            <div class="w-100">
                    <textarea name="biography" <?php if (!empty($bioErr)) {
                        echo 'class="placeholder col-12 bg-danger text-light is-invalid"';
                    } ?>><?php
                        if (isset($_COOKIE['bio'])) {
                            echo $_COOKIE['bio'];
                        } ?>
                                            </textarea>
            </div>

            <?php
            if (!empty($bioErr)) {
                echo '<span class="text-danger">' . $bioErr . '</span>';
            }
            ?>
            <br />

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input <?php if (!empty($chickErr)) {
                    echo 'is-invalid';
                } else {
                    echo 'is-valid';
                } ?>" name="chick" id="customCheck1" checked=checked value=1 <?php if (!empty($chickErr)) {
                    echo 'class="text-danger"';
                } ?>>
                <label class="custom-control-label" for="customCheck1">Ознакомлен с контрактом</label>
            </div>

            <?php
            if (!empty($chickErr)) {
                echo '<span class="text-danger">' . $chickErr . '</span>';
            }
            ?>
            <input type="submit" value="Отправить" class="btn btn-primary text-dark" />
        </form>
    </div>
</div>
</body>