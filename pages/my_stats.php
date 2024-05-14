<?php
require_once dirname(__DIR__) . "/backend/config.php";
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Моя статистика</title>
    <link rel="icon" href="../resources/ico.ico" type="image/x-icon">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/stats.css">
    <link rel="stylesheet" href="../styles/boxes.css">
    <link rel="stylesheet" href="../styles/windows.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <?php require_once ROOT . '/templates/header.php'; ?>

    <main class="main">
        <h1 class="heading">Личные результаты</h1>
        <div class="boxes">
            <div class="box">
                <div class="box_heading">
                    <h3>Тест на простые визуальные сигналы</h3>
                </div>
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
                <button class="button" name="show_my_dynamic" test_id="1">Динамика</button>
            </div>
            <div class="box">
                <div class="box_heading">
                    <h3>Тест на простые звуковые сигналы</h3>
                </div>
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
                <button class="button" name="show_my_dynamic" test_id="2">Динамика</button>
            </div>
            <div class="box">
                <div class="box_heading">
                    <h3>Тест на разные цвета</h3>
                </div>
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
                <button class="button" name="show_my_dynamic" test_id="3">Динамика</button>
            </div>
            <div class="box">
                <div class="box_heading">
                    <h3>Тест на скорость сложения в уме - сложный звуковой сигнал</h3>
                </div>
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
                <button class="button" name="show_my_dynamic" test_id="4">Динамика</button>
            </div>
            <div class="box">
                <div class="box_heading">
                    <h3>Тест на скорость сложения в уме - сложный визуальный сигнал</h3>
                </div>
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
                <button class="button" name="show_my_dynamic" test_id="5">Динамика</button>
            </div>
        </div>
    </main>

    <?php include dirname(__DIR__) . '/templates/chart.php'; ?>
    <script src="../scripts/my_stats.js" type="module"></script>

</body>

</html>