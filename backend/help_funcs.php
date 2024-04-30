<?php

require_once dirname(__DIR__) . "/backend/config.php";


// обычные функции

// перейти на конкретную страницу
function redirect(string $path)
{
    if (str_starts_with($path, "/")) {
        header("Location: " . ROOT . $path);
    } else {
        header("Location: " . ROOT . "/" . $path);
    }
    die();
}

// Вернуться на предыдущую страницу
function redirectToPrevious()
{
    if (!empty($_SERVER['HTTP_REFERER'])) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        redirect('pages/main.php');
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
    unset($_SESSION['user']['id']);
    redirect('pages/main.php');
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