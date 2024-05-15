<?php

require_once dirname(__DIR__) . "/backend/config.php";


// обычные функции

// перейти на конкретную страницу
// можно использовать .. и .
function redirect($url, $statusCode = 303)
{
    header('Location: ' . $url, true, $statusCode);
    die();
}

// Вернуться на предыдущую страницу
function redirectToPrevious()
{
    if (!empty($_SERVER['HTTP_REFERER'])) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        redirect('/ЛР2-4/pages/main.php');
    }
    die();
}

function setValidationError(string $fieldName, string $message): void
{
    $_SESSION['validation'][$fieldName] = $message;
}

function hasValidationError(string $fieldName): bool
{
    return isset($_SESSION['validation'][$fieldName]);
}

function hasValidationErrors(): bool
{
    // print_r($_SESSION['validation']);
    if (!empty($_SESSION['validation']) || (hasMessage('error'))) {
        return true;
    } else {
        return false;
    }
}

function validationErrorMessage(string $fieldName): string
{
    $message = $_SESSION['validation'][$fieldName] ?? '';
    unset($_SESSION['validation'][$fieldName]);
    return $message;
}

function clearValidationErrors(): void
{
    unset($_SESSION['validation']);
    unset($_SESSION['message']);
}

function clearSession(): void
{
    clearValidationErrors();
    unset($_SESSION['old']);
}

function setOldValue(string $key, mixed $value): void
{
    $_SESSION['old'][$key] = $value;
}

function old(string $key)
{
    $value = $_SESSION['old'][$key] ?? '';
    unset($_SESSION['old'][$key]);
    return $value;
}

function setMessage(string $key, string $message): void
{
    $_SESSION['message'][$key] = $message;
}

function hasMessage(string $key): bool
{
    return isset($_SESSION['message'][$key]);
}

function getMessage(string $key): string
{
    $message = $_SESSION['message'][$key] ?? '';
    unset($_SESSION['message'][$key]);
    return $message;
}

function logout(): void
{
    unset($_SESSION['user']);
    // redirect('pages/main.php');
    redirectToPrevious();
}

function checkAuth(): void
{
    if (!isset($_SESSION['user']['id'])) {
        redirect('pages/main.php');
    }
}

function checkGuest(): void
{
    if (isset($_SESSION['user']['id'])) {
        redirect('pages/main.php');
    }
}

function getNormalizedUserLogins($gender_id, $ageInterval): array
{
    $logins = [];
    foreach (getUsers() as $user) {
        if ($user['gender_id'] == $gender_id) {

            $age = getAge($user['birth_date']);

            if ($age > $ageInterval * 10 && $age <= ($ageInterval + 1) * 10 || ($ageInterval == 0 && $age <= 0) || ($ageInterval == 6 && $age >= 60)) {
                $logins[] = $user['login'];
            }
        }
    }
    return $logins;
}

function getAge($birthDate) {
    $birthDate = $birthDate;
    //explode the date to get month, day and year
    $birthDate = explode("-", $birthDate);
    //get age from date or birthdate
    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[0], $birthDate[1]))) > date("md")
        ? ((date("Y") - $birthDate[0]) - 1)
        : (date("Y") - $birthDate[0]));

    return $age;
}