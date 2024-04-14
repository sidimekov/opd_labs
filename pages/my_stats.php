<?php
require_once dirname(__DIR__) . "/backend/config.php";
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Моя статистика</title>
    <link rel="icon" href="../../ico.ico" type="image/x-icon">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/stats.css">
    <link rel="stylesheet" href="../styles/boxes.css">
</head>

<body>
    <?php require_once ROOT . '/templates/header.php'; ?>

    <main class="main">
        <h1 class="heading">Личные результаты</h1>
        <div class="boxes">
            <div class="box">
                <h3>Тест на простые визуальные сигналы</h3>
                <p> Среднее время реакции</p>
                <div class="progress-bar">
                    <div class="progress-bar-fill" style="width: 77%;"></div>
                </div>
                <p> Точность</p>
                <div class="progress-bar">
                    <div class="progress-bar-fill" style="width: 23%;"></div>
                </div>
                <p> Количество пропусков</p>
                <div class="progress-bar">
                    <div class="progress-bar-fill" style="width: 65%;"></div>
                </div>
                <p> Количество ошибок</p>
                <div class="progress-bar">
                    <div class="progress-bar-fill" style="width: 3%;"></div>
                </div>
            </div>
            <div class="box">
                <h3>Тест на простые звуковые сигналы</h3>
                <p> Среднее время реакции</p>
                <div class="progress-bar">
                    <div class="progress-bar-fill" style="width: 97%;"></div>
                </div>
                <p> Точность</p>
                <div class="progress-bar">
                    <div class="progress-bar-fill" style="width: 76%;"></div>
                </div>
                <p> Количество пропусков</p>
                <div class="progress-bar">
                    <div class="progress-bar-fill" style="width: 65%;"></div>
                </div>
                <p> Количество ошибок</p>
                <div class="progress-bar">
                    <div class="progress-bar-fill" style="width: 40%;"></div>
                </div>
            </div>
            <div class="box">
                <h3>Тест на разные цвета</h3>
                <p> Среднее время реакции</p>
                <div class="progress-bar">
                    <div class="progress-bar-fill" style="width: 21%;"></div>
                </div>
                <p> Точность</p>
                <div class="progress-bar">
                    <div class="progress-bar-fill" style="width: 30%;"></div>
                </div>
                <p> Количество пропусков</p>
                <div class="progress-bar">
                    <div class="progress-bar-fill" style="width: 50%;"></div>
                </div>
                <p> Количество ошибок</p>
                <div class="progress-bar">
                    <div class="progress-bar-fill" style="width: 40%;"></div>
                </div>
            </div>
            <div class="box">
                <h3>Тест на скорость сложения в уме - сложный звуковой сигнал</h3>
                <p> Среднее время реакции</p>
                <div class="progress-bar">
                    <div class="progress-bar-fill" style="width: 0%;"></div>
                </div>
                <p> Точность</p>
                <div class="progress-bar">
                    <div class="progress-bar-fill" style="width: 40%;"></div>
                </div>
                <p> Количество пропусков</p>
                <div class="progress-bar">
                    <div class="progress-bar-fill" style="width: 70%;"></div>
                </div>
                <p> Количество ошибок</p>
                <div class="progress-bar">
                    <div class="progress-bar-fill" style="width: 10%;"></div>
                </div>
            </div>
            <div class="box">
                <h3>Тест на скорость сложения в уме - сложный визуальный сигнал</h3>
                <p> Среднее время реакции</p>
                <div class="progress-bar">
                    <div class="progress-bar-fill" style="width: 32%;"></div>
                </div>
                <p> Точность</p>
                <div class="progress-bar">
                    <div class="progress-bar-fill" style="width: 78%;"></div>
                </div>
                <p> Количество пропусков</p>
                <div class="progress-bar">
                    <div class="progress-bar-fill" style="width: 34%;"></div>
                </div>
                <p> Количество ошибок</p>
                <div class="progress-bar">
                    <div class="progress-bar-fill" style="width: 76%;"></div>
                </div>
            </div>
        </div>
    </main>

</body>

</html>