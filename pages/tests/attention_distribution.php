<?php
require_once dirname(dirname(__DIR__)) . "/backend/config.php";

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Внимание: Распределение</title>
    <link rel="icon" href="../../resources/ico.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../styles/header.css">
    <link rel="stylesheet" href="../../styles/general.css">
    <link rel="stylesheet" href="../../styles/tests.css">
</head>

<body>
<?php require_once ROOT . '/templates/test_header.php'; ?>

<div class="main">
    <div class="scale-container" id="progressBar">
        <div class="scale-fill" id="progress">
        </div>
        <div class="scale-text" id="progressBarText">0/15</div>
    </div>
    <div class="button-container">
        <div class="timer-text-container">
            <div class="timer" id="timer">0ms</div>
            <div class="text">Время внимания текущей попытки</div>
        </div>
        <a href="../tests.php">
            <button class="back-button" id="backButton">Назад</button>
        </a>
        <button class="restart-button" id="restartButton">Перезапустить</button>
        <p class="instructions" id="attention-instructions">Нажмите на нужную ячейку</p>
        <button class="start-button" id="attention-start-button">Нажмите, чтобы начать тест</button>
        <table class="attention-table" id="attention-table">
        </table>
    </div>
</div>

<script type='module' src="../../scripts/tests/attention_distribution.js"></script>
</body>

</html>