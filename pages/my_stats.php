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
    <link rel="icon" href="../../ico.ico" type="image/x-icon">
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
            <?php foreach (getUserResults($_SESSION['user']['id'], 1) as $tru1) : ?>
                <div class="box">
                    <div class="box_heading">
                        <h3>Тест на простые визуальные сигналы</h3>
                    </div>
                    <div class="stat_container">
                        <p>Среднее время реакции</p>
                        <?php echo $tru1['reaction_time']; ?>
                    </div>
                    <div class="stat_container">
                        <p>Точность</p>

                        <?php echo $tru1['accuracy']; ?>

                    </div>
                    <div class="stat_container">
                        <p>Количество пропусков</p>

                        <?php echo $tru1['misses']; ?>

                    </div>
                    <div class="stat_container">
                        <p>Количество ошибок</p>

                        <?php echo $tru1['mistakes']; ?>

                    </div>
                    <button class="button" name="show_my_dynamic" test_id="1">Динамика</button>
                </div>

            <?php endforeach; ?>

            <?php foreach (getUserResults($_SESSION['user']['id'], 2) as $tru2) : ?>

                <div class="box">
                    <div class="box_heading">
                        <h3>Тест на простые звуковые сигналы</h3>
                    </div>
                    <div class="stat_container">
                        <p>Среднее время реакции</p>

                        <?php echo $tru2['reaction_time']; ?>

                    </div>
                    <div class="stat_container">
                        <p>Точность</p>

                        <?php echo $tru2['accuracy']; ?>

                    </div>
                    <div class="stat_container">
                        <p>Количество пропусков</p>

                        <?php echo $tru2['misses']; ?>

                    </div>
                    <div class="stat_container">
                        <p>Количество ошибок</p>

                        <?php echo $tru2['mistakes']; ?>

                    </div>
                    <button class="button" name="show_my_dynamic" test_id="2">Динамика</button>
                </div>

            <?php endforeach; ?>

            <?php foreach (getUserResults($_SESSION['user']['id'], 3) as $tru3) : ?>

                <div class="box">
                    <div class="box_heading">
                        <h3>Тест на сложные цветные сигналы</h3>
                    </div>
                    <div class="stat_container">
                        <p>Среднее время реакции</p>

                        <?php echo $tru3['reaction_time']; ?>

                    </div>
                    <div class="stat_container">
                        <p>Точность</p>

                        <?php echo $tru3['accuracy']; ?>

                    </div>
                    <div class="stat_container">
                        <p>Количество пропусков</p>

                        <?php echo $tru3['misses']; ?>

                    </div>
                    <div class="stat_container">
                        <p>Количество ошибок</p>

                        <?php echo $tru3['mistakes']; ?>

                    </div>
                    <button class="button" name="show_my_dynamic" test_id="3">Динамика</button>
                </div>

            <?php endforeach; ?>

            <?php foreach (getUserResults($_SESSION['user']['id'], 4) as $tru4) : ?>

                <div class="box">
                    <div class="box_heading">
                        <h3>Тест на сложные цифровые визуальные сигналы</h3>
                    </div>
                    <div class="stat_container">
                        <p>Среднее время реакции</p>

                        <?php echo $tru4['reaction_time']; ?>

                    </div>
                    <div class="stat_container">
                        <p>Точность</p>

                        <?php echo $tru4['accuracy']; ?>

                    </div>
                    <div class="stat_container">
                        <p>Количество пропусков</p>

                        <?php echo $tru4['misses']; ?>

                    </div>
                    <div class="stat_container">
                        <p>Количество ошибок</p>

                        <?php echo $tru4['mistakes']; ?>

                    </div>
                    <button class="button" name="show_my_dynamic" test_id="4s">Динамика</button>
                </div>

            <?php endforeach; ?>


            <?php foreach (getUserResults($_SESSION['user']['id'], 5) as $tru5) : ?>

                <div class="box">
                    <div class="box_heading">
                        <h3>Тест на сложные цифровые звуковые сигналы</h3>
                    </div>

                    <div class="stat_container">
                        <p>Среднее время реакции</p>

                        <?php echo $tru5['reaction_time']; ?>

                    </div>
                    <div class="stat_container">
                        <p>Точность</p>

                        <?php echo $tru5['accuracy']; ?>

                    </div>
                    <div class="stat_container">
                        <p>Количество пропусков</p>

                        <?php echo $tru5['misses']; ?>

                    </div>
                    <div class="stat_container">
                        <p>Количество ошибок</p>

                        <?php echo $tru5['mistakes']; ?>

                    </div>
                    <button class="button" name="show_my_dynamic" test_id="5">Динамика</button>
                </div>

            <?php endforeach; ?>
        </div>
    </main>

    
    <?php include dirname(__DIR__) . '/templates/chart.php'; ?>
    <script src="../scripts/my_stats.js" type="module"></script>

</body>

</html>