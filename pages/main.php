<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once dirname(__DIR__) . "/backend/config.php";

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
</head>

<body>
    <?php require_once ROOT . '/templates/header.php'; ?>

    <div class="main">
        <h1 class="heading">Лабораторная работа 2</h1>
        <h3>Простые и сложные сенсомоторные реакции</h3>
        Цель и задачи лабораторной работы: научиться разрабатывать системы в проектной
        деятельности, разработать систему оценки простых и сложных сенсомоторных
        реакций человека, как первый элемент батареи тестов
    </div>

</body>

</html>