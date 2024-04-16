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
                <div class="stat_container">
                    <p>Среднее время реакции</p>
                    77%
                    <div class="progress-bar">
                        <div class="progress-bar-fill" style="width: 77%;"></div>
                    </div>
                </div>
                <div class="stat_container">
                    <p>Точность</p>
                    23%
                    <div class="progress-bar">
                        <div class="progress-bar-fill" style="width: 23%;"></div>
                    </div>
                </div>
                <div class="stat_container">
                    <p>Количество пропусков</p>
                    65%
                    <div class="progress-bar">
                        <div class="progress-bar-fill" style="width: 65%;"></div>
                    </div>
                </div>
                <div class="stat_container">
                    <p>Количество ошибок</p>
                    3%
                    <div class="progress-bar">
                        <div class="progress-bar-fill" style="width: 3%;"></div>
                    </div>
                </div>
            </div>
            <div class="box">
                <h3>Тест на простые звуковые сигналы</h3>
                <div class="stat_container">
                    <p>Среднее время реакции</p>
                    77%
                    <div class="progress-bar">
                        <div class="progress-bar-fill" style="width: 77%;"></div>
                    </div>
                </div>
                <div class="stat_container">
                    <p>Точность</p>
                    23%
                    <div class="progress-bar">
                        <div class="progress-bar-fill" style="width: 23%;"></div>
                    </div>
                </div>
                <div class="stat_container">
                    <p>Количество пропусков</p>
                    65%
                    <div class="progress-bar">
                        <div class="progress-bar-fill" style="width: 65%;"></div>
                    </div>
                </div>
                <div class="stat_container">
                    <p>Количество ошибок</p>
                    3%
                    <div class="progress-bar">
                        <div class="progress-bar-fill" style="width: 3%;"></div>
                    </div>
                </div>
            </div>
            <div class="box">
                <h3>Тест на разные цвета</h3>
                <div class="stat_container">
                    <p>Среднее время реакции</p>
                    77%
                    <div class="progress-bar">
                        <div class="progress-bar-fill" style="width: 77%;"></div>
                    </div>
                </div>
                <div class="stat_container">
                    <p>Точность</p>
                    23%
                    <div class="progress-bar">
                        <div class="progress-bar-fill" style="width: 23%;"></div>
                    </div>
                </div>
                <div class="stat_container">
                    <p>Количество пропусков</p>
                    65%
                    <div class="progress-bar">
                        <div class="progress-bar-fill" style="width: 65%;"></div>
                    </div>
                </div>
                <div class="stat_container">
                    <p>Количество ошибок</p>
                    3%
                    <div class="progress-bar">
                        <div class="progress-bar-fill" style="width: 3%;"></div>
                    </div>
                </div>
            </div>
            <div class="box">
                <h3>Тест на скорость сложения в уме - сложный звуковой сигнал</h3>
                <div class="stat_container">
                    <p>Среднее время реакции</p>
                    77%
                    <div class="progress-bar">
                        <div class="progress-bar-fill" style="width: 77%;"></div>
                    </div>
                </div>
                <div class="stat_container">
                    <p>Точность</p>
                    23%
                    <div class="progress-bar">
                        <div class="progress-bar-fill" style="width: 23%;"></div>
                    </div>
                </div>
                <div class="stat_container">
                    <p>Количество пропусков</p>
                    65%
                    <div class="progress-bar">
                        <div class="progress-bar-fill" style="width: 65%;"></div>
                    </div>
                </div>
                <div class="stat_container">
                    <p>Количество ошибок</p>
                    3%
                    <div class="progress-bar">
                        <div class="progress-bar-fill" style="width: 3%;"></div>
                    </div>
                </div>
            </div>
            <div class="box">
                <h3>Тест на скорость сложения в уме - сложный визуальный сигнал</h3>
                <div class="stat_container">
                    <p>Среднее время реакции</p>
                    77%
                    <div class="progress-bar">
                        <div class="progress-bar-fill" style="width: 77%;"></div>
                    </div>
                </div>
                <div class="stat_container">
                    <p>Точность</p>
                    23%
                    <div class="progress-bar">
                        <div class="progress-bar-fill" style="width: 23%;"></div>
                    </div>
                </div>
                <div class="stat_container">
                    <p>Количество пропусков</p>
                    65%
                    <div class="progress-bar">
                        <div class="progress-bar-fill" style="width: 65%;"></div>
                    </div>
                </div>
                <div class="stat_container">
                    <p>Количество ошибок</p>
                    3%
                    <div class="progress-bar">
                        <div class="progress-bar-fill" style="width: 3%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>

</html>