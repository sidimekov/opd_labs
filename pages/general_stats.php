<?php
require_once dirname(__DIR__) . "/backend/config.php";
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Общая статистика</title>
    <link rel="icon" href="../../ico.ico" type="image/x-icon">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/tables.css">
</head>

<body>
    <?php require_once ROOT . '/templates/header.php'; ?>

    <main class="main">
        <h1 class="heading">Общие результаты</h1>
        <h2 class="heading">Сенсомоторные тесты</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Имя пользователя(логин)</th>
                    <th>Тест на простые визуальные сигналы</th>
                    <th>Тест на простые звуковые сигналы</th>
                    <th>Тест на разные цвета</th>
                    <th>Тест на скорость сложения в уме - сложный звуковой сигнал</th>
                    <th>Тест на скорость сложения в уме - сложный визуальный сигнал</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Логин</td>
                    <td>
                        <p>Среднее время реакции: 77%</p>
                        <p>Точность: 23%</p>
                        <p>Количество пропусков: 65%</p>
                        <p>Количество ошибок: 3%</p>
                    </td>
                    <td>
                        <p>Среднее время реакции: 97%</p>
                        <p>Точность: 76%</p>
                        <p>Количество пропусков: 65%</p>
                        <p>Количество ошибок: 40%</p>
                    </td>
                    <td>
                        <p>Среднее время реакции: 21%</p>
                        <p>Точность: 30%</p>
                        <p>Количество пропусков: 50%</p>
                        <p>Количество ошибок: 40%</p>
                    </td>
                    <td>
                        <p>Среднее время реакции: 0%</p>
                        <p>Точность: 40%</p>
                        <p>Количество пропусков: 70%</p>
                        <p>Количество ошибок: 10%</p>
                    </td>
                    <td>
                        <p>Среднее время реакции: 32%</p>
                        <p>Точность: 78%</p>
                        <p>Количество пропусков: 34%</p>
                        <p>Количество ошибок: 76%</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>
</body>

</html>