<?php

require_once __DIR__ . "/help_funcs.php";
require_once __DIR__ . "/db_managers.php";

// данные из post в переменные
$name = $_POST['name'];
$login = $_POST['login'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$birth_date = $_POST['birth_date'];


// валидация

if (empty ($name)) {
    setValidationError('name', 'Пустое имя!');
}

if (empty ($login)) {
    setValidationError('login', 'Пустой логин!');
}
if (empty ($password)) {
    setValidationError('password', 'Пустой пароль!');
}

if (hasValidationErrors()) {
    setUserMenuDisplay(true);
    redirectToPrevious();
    // redirect('/main.php');
}

try{
    setUserData($name, $login, 0, $password, $birth_date, $gender_id);
} catch (\Exception $e){
    setMessage('error', 'Произошла ошибка, возможно, этот логин уже занят.');
    setUserMenuDisplay(true);
    redirectToPrevious();
}

$user = findUser($login);
$_SESSION['user']['id'] = $user['id'];

redirectToPrevious();