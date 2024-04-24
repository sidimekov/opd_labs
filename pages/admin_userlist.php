<?php
require_once dirname(__DIR__) . "/backend/config.php";
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список пользователей</title>
    <link rel="icon" href="../../ico.ico" type="image/x-icon">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/tables.css">
</head>

<body>
    <?php require_once ROOT . '/templates/header.php'; ?>

    <div class="main">
        <h1 class="heading">Список пользователей</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Пол</th>
                    <th>Дата рождения</th>
                    <th>Логин</th>
                    <th>Дата создания</th>
                    <th>Роль</th>
                    <th>Обновить</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>%ИД%</td>
                    <td>%Имя%</td>
                    <td>
                        <select list="gender_id" name="user_gender" id="%id%" value="">
                            <option>Мужской</option>
                            <option>Женский</option>
                        </select>
                    </td>
                    <td>%Дата Рождения%</td>
                    <td>%Логин%</td>
                    <td>%ДатаСоздания%</td>
                    <td>
                        <select list="role_id" name="user_role" id="%id%" value="">
                            <option>Пользователь</option>
                            <option>Эксперт</option>
                            <option>Админ</option>
                        </select>
                    </td>
                    <td><button class="table_button">Обновить</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>