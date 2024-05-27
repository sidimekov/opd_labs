<?php
require_once dirname(__DIR__) . "/backend/config.php";
require_once(ROOT . "/backend/db_managers.php");
$tests = getTests();
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link rel="icon" href="../../ico.ico" type="image/x-icon">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/boxes.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
<?php require_once ROOT . '/templates/header.php'; ?>

<div class="main">
    <h1 class="heading">Тестирование</h1>

    <!--    1-->

    <h2>Измерьте показатель сердцебиения и введите его:</h2>
    <input type="number" id="testing_before" placeholder="Показатель сердцебиения" style="width: 20%; font-size: 24px; height: 30px;">
    <br><button class="button" style="width: 20%">Пройти тестирование</button>
    <p>Во время тестирования необходимо время от времени измерять показатели сердцебиения,<br>затем вы введёте средние
        показатели во время тестирования, и показатели после тестирования.</p>

    <!--    2-->

    <h2 class="heading">Тесты на сенсомоторные реакции</h2>
    <div class="boxes">
        <?php foreach (array_slice($tests, 0, 5) as $test) : ?>

            <div class="box">
                <div class="box_heading">
                    <h3><?php echo $test['name']; ?></h3>
                </div>
                <p><?php echo $test['description']; ?></p>
                <a href="./tests/<?php echo $test['href']; ?>">
                    <button class="button">Пройти</button>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <h1 class="heading">Тесты на реакцию на движущийся объект</h1>
    <div class="boxes">
        <?php foreach (array_slice($tests, 5, 2) as $test) : ?>
            <div class="box">
                <div class="box_heading">
                    <h3><?php echo $test['name']; ?></h3>
                </div>
                <p><?php echo $test['description']; ?></p>
                <a href="./tests/<?php echo $test['href']; ?>">
                    <button class="button">Пройти</button>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <h1 class="heading">Тесты на аналоговое слежение/преследование</h1>
    <div class="boxes">
        <?php foreach (array_slice($tests, 7, 2) as $test) : ?>
            <div class="box">
                <div class="box_heading">
                    <h3><?php echo $test['name']; ?></h3>
                </div>
                <p><?php echo $test['description']; ?></p>
                <a href="./tests/<?php echo $test['href']; ?>">
                    <button class="button">Пройти</button>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <h1 class="heading">Тесты на внимание</h1>
    <div class="boxes">
        <?php foreach (array_slice($tests, 9, 2) as $test) : ?>
            <div class="box">
                <div class="box_heading">
                    <h3><?php echo $test['name']; ?></h3>
                </div>
                <p><?php echo $test['description']; ?></p>
                <a href="./tests/<?php echo $test['href']; ?>">
                    <button class="button">Пройти</button>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <h1 class="heading">Тесты на память</h1>
    <div class="boxes">
        <?php foreach (array_slice($tests, 11, 2) as $test) : ?>
            <div class="box">
                <div class="box_heading">
                    <h3><?php echo $test['name']; ?></h3>
                </div>
                <p><?php echo $test['description']; ?></p>
                <a href="./tests/<?php echo $test['href']; ?>">
                    <button class="button">Пройти</button>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <h1 class="heading">Тесты на мышление</h1>
    <div class="boxes">
        <?php foreach (array_slice($tests, 13, 3) as $test) : ?>
            <div class="box">
                <div class="box_heading">
                    <h3><?php echo $test['name']; ?></h3>
                </div>
                <p><?php echo $test['description']; ?></p>
                <a href="./tests/<?php echo $test['href']; ?>">
                    <button class="button">Пройти</button>
                </a>
            </div>
        <?php endforeach; ?>
    </div>

    <!--    3-->

    <h2>Тесты пройдены! </h2>
    <p>Введите показатели сердцебиения:</p>
    <p>Во время тестирования:</p>
    <input type="number" id="testing_during" placeholder="Показатель сердцебиения во время тестирования" style="width: 20%; font-size: 24px; height: 30px;">
    <p>После тестирования:</p>
    <input type="number" id="testing_after" placeholder="Показатель сердцебиения после тестирования" style="width: 20%; font-size: 24px; height: 30px;">
    <br><button class="button" style="width: 20%">Завершить тестирование</button>

    <!--    4-->

    <h2>Результаты тестирования</h2>

<!--    для примера, потом убрать-->
    <?php $_SESSION['testing'][0] = 1;
    $_SESSION['testing'][1] = 100;
    $_SESSION['testing'][2] = 50; ?>

<!--    график меняется сам в зависимости от переменных-->
    <div style="margin: 0 20%;">
        <canvas id="testing_chart"></canvas>
    </div>
    <script src="../scripts/testing.js" type="module"></script>

    <p>*Сделать оценку изменения показателей*</p>
    <button class="button" style="width: 20%">Посмотреть уровень развития ПВК</button>

</div>

</body>

</html>