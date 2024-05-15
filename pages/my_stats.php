<?php
require_once dirname(__DIR__) . "/backend/config.php";
$userId = $_SESSION['user']['id'];

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
            <?php foreach (getTests() as $test) : ?>
                <?php $testId = $test['id'];
                $mids = getMidUserStats($testId, $userId); ?>
                <div class="box">
                    <div class="box_heading">
                        <h3><?php echo $test['name']; ?></h3>
                    </div>
                    <?php if (!$mids) : ?>
                        <div class="stat_container">
                            <p>Вы ещё не проходили этот тест</p>
                        </div>
                    <?php else : ?>
                        <div class="stat_container">
                            <p>Среднее время реакции</p>
                            <?php echo $mids['reaction_time']; ?>
                        </div>
                        <div class="stat_container">
                            <p>Точность</p>

                            <?php echo $mids['accuracy']; ?>

                        </div>
                        <div class="stat_container">
                            <p>Количество пропусков</p>

                            <?php echo $mids['misses']; ?>

                        </div>
                        <div class="stat_container">
                            <p>Количество ошибок</p>

                            <?php echo $mids['mistakes']; ?>

                        </div>
                        <button class="button" name="show_my_dynamic" test_id="<?php echo $testId; ?>">Динамика</button>
                    <?php endif; ?>
                </div>

            <?php endforeach; ?>
        </div>
    </main>


    <?php include dirname(__DIR__) . '/templates/chart.php'; ?>
    <script src="../scripts/my_stats.js" type="module"></script>

</body>

</html>