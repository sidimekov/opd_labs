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

function getAge($birthDate)
{
    $birthDate = $birthDate;
    //explode the date to get month, day and year
    $birthDate = explode("-", $birthDate);
    //get age from date or birthdate
    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[0], $birthDate[1]))) > date("md")
        ? ((date("Y") - $birthDate[0]) - 1)
        : (date("Y") - $birthDate[0]));

    return $age;
}


// ПОСЧИТАТЬ ИТОГОВЫЙ отсортированный рейтинг у профессии
// типа подсчитать список ПВК и их процент важности у каждого для ОДНОЙ профессии
function countProfResultRating(int $prof_id): void
{
    global $professionPiqs;
    // возвращается список ссылочных массивов
    // resultPiq - как вариант инстанса одного такого массива (пвк + его важность от 0 до 1 вкл.)
    // resultPiq = getProfResultRating[piq_id]
    // resultPiq['piq']
    // resultPiq['importance']
    $ratings = getProfRatings($prof_id);
    $result = []; // result = [piq_id => ['piq' => piq, 'importance' => float]]
    if ($ratings) {
        foreach ($ratings as $rating) {
            $currPiq = $rating['piq'];
            $currPriority = $rating['priority'];
            $piq = $result[$currPiq['id']] ?? null;
            if (is_null($piq)) {
                $result[$currPiq['id']]['piq'] = $currPiq;
                $result[$currPiq['id']]['importance'] = $currPriority / 10;
            } else {
                $result[$currPiq['id']]['importance'] = ($result[$currPiq['id']]['importance'] + ($currPriority / 10)) / 2;
            }
        }
    }

    usort($result, 'importanceSort');
    $result = array_reverse($result);
    $professionPiqs[$prof_id] = $result;
}

// Получить подсчёт всех ПВК для ОДНОЙ профессии
function getProfResultRating(int $prof_id, int $n = 0): array
{
    global $professionPiqs;
    if (is_null($professionPiqs[$prof_id] ?? null)) {
        countProfResultRating($prof_id);
    }
    if ($n == 0) {
        return $professionPiqs[$prof_id];
    } else {
        return array_slice($professionPiqs[$prof_id], 0, $n);
    }
}

function importanceSort($x, $y)
{
    return $x['importance'] <=> $y['importance'];
}

// 7 лаба

// массив, в котором хранятся наборы пвк профессии
// id тестов из базы данных
$PROFESSIONS_TO_PIQ = [
    1 => [253, 301, 245, 246, 282],
    2 => [251, 240, 244, 241, 282],
    3 => [249, 215, 282, 254, 260]
];

// массив, в котором пвк ставятся в соответсвие тесты
// пвк из бд
$PIQ_TO_TESTS = [
    253 => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100],
    301 => [0, 0, 0, 0, 0, 0, 0, 0, 0, 40, 0, 10, 50, 0, 0, 0],
    245 => [0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 75, 20, 0],
    246 => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 26, 67, 7],
    282 => [0, 0, 0, 0, 0, 0, 0, 0, 0, 14, 14, 14, 14, 15, 14, 14],
    251 => [0, 0, 0, 0, 0, 2, 2, 5, 5, 24, 0, 24, 28, 0, 0, 10],
    240 => [0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 45, 0, 0, 50],
    244 => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 10, 10, 40, 35],
    241 => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7, 7, 6, 20, 60],
    249 => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 20, 75],
    215 => [0, 0, 0, 0, 0, 15, 15, 20, 15, 0, 0, 0, 0, 30, 5, 0],
    254 => [0, 0, 0, 0, 0, 0, 0, 0, 7, 0, 8, 25, 15, 25, 7, 13],
    260 => [0, 0, 0, 0, 0, 0, 0, 0, 0, 10, 0, 0, 85, 0, 0, 5]
];

$IDEAL_TESTINGS_VALUES = array();
for($i = 0; $i < 16; $i++){
    $IDEAL_TESTINGS_VALUES[$i] = 1;
}

// считает общую оценку прохождения теста в виде числа от 0 до 1
function testingMark(int $test_id, $test_results){
    $result = 0;
    switch($test_id){
        case 6:
            $a1 = max(min($test_results['reaction_time_module'], 100), 50);
            $a2 = max(min($test_results['standard_deviation_module'], 50), 28);
            $result = (100 - $a1) / 50 * (50 - $a2) / 22;
            break;
        case 7:
            $a1 = max(min($test_results['reaction_time_module'], 250), 140);
            $a2 = max(min($test_results['standard_deviation_module'], 300), 170);
            $result = (250 - $a1) / 110 * (300 - $a2) / 170;
            break;
        case 8:
            $result = min($test_results['reaction_time'] / 100, 1);
            break;
        case 9:
            $result = min($test_results['reaction_time'] / 100, 1);
            break;
        case 10:
            $result = min($test_results['accuracy'] / 25, 1);
            break;
        case 11:
            $result = min($test_results['accuracy'] / 25, 1);
            break;
        case 12:
            $result = min($test_results['accuracy'] / 25, 1);
            break;
        case 13:
            $result = min($test_results['accuracy'] / 10, 1);
            break;
        case 14:
            $result = min($test_results['accuracy'] / 20, 1);
            break;
        case 15:
            $result = (20 - max(min($test_results['reaction_time'], 20), 2)) / 18;
            break;
        case 16:
            $result = min($test_results['accuracy'] / 10, 1);
            break;
    }

    return $result;
}

// возвращает процент соответствия пользователя конкретному пвк
function getPiqLevel(int $user_id, int $piq_id)
{
    global $PIQ_TO_TESTS, $IDEAL_TESTINGS_VALUES;
    $res_sum = 0;
    for ($i = 0; $i < 16; $i++) {
        $res = getUserResults($user_id, $i);
        $res_sum += testingMark($i, $res) * $PIQ_TO_TESTS[$piq_id][$i] / 100;
    }
    return $res_sum;
}

// обновление в базе данных информации о соответствии пользователя пвк
function updateUserPiqs(int $userId){
    $piqs = [253, 301, 245, 246, 282, 251, 240, 244, 241, 249, 215, 254, 260];
    foreach($piqs as $i){
        insertUsersPiq($userId, $i, getPiqLevel($userId, $i));
    }
}

// возвращает процент соответствия пользователя конкретной профессии
// вычисляется среднее из всех пвк
function getProfessionMatch(int $userId, int $profId){
    global $PROFESSIONS_TO_PIQ;
    $profs_piq = $PROFESSIONS_TO_PIQ[$profId];
    $result = 0;
    $piqs_level = getPiqsLevelFromDB($userId);

    foreach($piqs_level as $i){
        if (in_array($i['piq_id'], $profs_piq)){
            $result += $i['level'];
        }
    }

    return $result / count($profs_piq);
}

// чекать если чел прошел тест
function passed($userId, $testId) : bool
{
    return (!empty(getUserResults($userId, $testId)));
}

function passedAll($userId): bool
{
    foreach (getTests() as $test) {
        if (!passed($userId, $test['id'])) {
            return false;
        }
    }
    return true;
}
