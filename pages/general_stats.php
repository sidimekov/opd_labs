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
    <link rel="stylesheet" href="../styles/stats.css">
</head>

<body>
    <?php require_once ROOT . '/templates/header.php'; ?>

    <main class="main">
        <h1 class="heading">Общие результаты</h1>
        <h2 class="heading">Сенсомоторные тесты</h2>
        <table class="table">

            <colgroup>
                <col style="width: 10%;">
                <col style="width: 18%;">
                <col style="width: 18%;">
                <col style="width: 18%;">
                <col style="width: 18%;">
                <col style="width: 18%;">
            </colgroup>

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
                    </td>
                    <td>
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
                    </td>
                    <td>
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
                    </td>
                    <td>
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
                    </td>
                    <td>
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
                    </td>
                </tr>
            </tbody>
        </table>
    </main>
</body>

</html>