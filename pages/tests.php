<?php
require_once dirname(__DIR__) . "/backend/config.php";
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тесты</title>
    <link rel="icon" href="../resources/ico.ico" type="image/x-icon">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/boxes.css">
</head>

<body>
    <?php require_once ROOT . '/templates/header.php'; ?>

    <main class="main">
        <h1 class="heading">Тесты на сенсомоторные реакции</h1>
        <div class="boxes">
            <?php foreach (getTests() as $test) : ?>
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
    </main>

</body>

</html>