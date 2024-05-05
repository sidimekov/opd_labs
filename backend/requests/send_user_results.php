<?php

require_once dirname(__DIR__) . "/config.php";
require_once ROOT . '\backend\help_funcs.php';
require_once ROOT . '\backend\db_managers.php';

if (currentUser()) {
    $user_id = $_SESSION['user']['id'];
    $test_id = $_POST['test_id'];
    $reaction_time = $_POST['reaction_time'];
    $accuracy = $_POST['accuracy'];
    $misses = $_POST['misses'];
    $mistakes = $_POST['mistakes'];

    addTestResults($user_id, $test_id, $reaction_time, $accuracy, $misses, $mistakes);

    // отправить с помощью echo что то по типу ваши результаты сохранены
} else {
    // что то придумать для незареганных пользователей
    // отправить с помощью echo что то по типу тест пройден, зарегайтесь, чтобы просматривать динамику и историю ваших прохождений
}

echo json_encode(array('response' => 'done'));