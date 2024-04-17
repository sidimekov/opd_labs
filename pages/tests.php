<?php
require_once dirname(__DIR__) . "/backend/config.php";
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тесты</title>
    <link rel="icon" href="../../ico.ico" type="image/x-icon">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/boxes.css">
</head>

<body>
    <?php require_once ROOT . '/templates/header.php'; ?>

    <main class="main">
        <h1 class="heading">Тесты на сенсомоторные реакции</h1>
        <div class="boxes">
            <div class="box">
                <div class="box_heading">
                    <h3>Тест на простые визуальные сигналы</h3>
                </div>
                <p> Описание</p>
                <button class="button">Пройти</button>
            </div>
            <div class="box">
                <div class="box_heading">
                    <h3>Тест на простые звуковые сигналы</h3>
                </div>
                <p> Описание</p>
                <button class="button">Пройти</button>
            </div>
            <div class="box">
                <div class="box_heading">
                    <h3>Тест на разные цвета</h3>
                </div>
                <p> Описание</p>
                <button class="button">Пройти</button>
            </div>
            <div class="box">
                <div class="box_heading">
                    <h3>Тест на скорость сложения в уме - сложный звуковой сигнал</h3>
                </div>
                <p> Описание</p>
                <button class="button">Пройти</button>
            </div>
            <div class="box">
                <div class="box_heading">
                    <h3>Тест на скорость сложения в уме - сложный визуальный сигнал</h3>
                </div>
                <p> Описание</p>
                <button class="button">Пройти</button>
            </div>
        </div>
    </main>

</body>

</html>