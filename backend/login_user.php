<?php

require_once __DIR__ . '/help_funcs.php';
require_once __DIR__ . '/db_managers.php';


// данные из post в переменные
$login = $_POST['login'];
$password = $_POST['password'];

// валидация

if (empty ($login)) {
    setValidationError('login', 'Пустой login!');
}
if (empty ($password)) {
    setValidationError('password', 'Пустой пароль!');
}



$user = findUser($login);

// вход

// проверка пароля
if (!hasValidationErrors() && !password_verify($password, $user['password'])) {
    setMessage('error', 'Неверный пароль');
    redirect('/main.php');
}

// если в валидации какие-то ошибки, то обратно

if (hasValidationErrors()) {
    setUserMenuDisplay(true);
    setOldValue('login', $login);
    // redirect('/main.php');
    redirectToPrevious();
}
    // успешный заход

    $_SESSION['user']['id'] = $user['id'];

    setUserMenuDisplay(false);
    redirectToPrevious();