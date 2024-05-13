<?php

// session_start();

require_once __DIR__ . '/config.php';


// функции для работы с бд

function getPDO(): PDO
{
    try {
        return new \PDO('mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';charset=utf8;dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
    } catch (\PDOException $e) {
        die("Connection error: {$e->getMessage()}");
    }
}



function getUsers(): array
{
    // user['id']
    // user['name']
    // user['email']
    // user['password']
    // user['role_id']
    $pdo = getPDO();
    $stmt = $pdo->prepare("SELECT * FROM users");
    $stmt->execute();
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
}

function getUserByLogin(string $login): array|bool
{
    $pdo = getPDO();

    $stmt = $pdo->prepare("SELECT * FROM users WHERE login = :login");
    $stmt->execute(['login' => $login]);
    return $stmt->fetch(\PDO::FETCH_ASSOC);
}

function getUserById(int $user_id): array|bool
{
    $pdo = getPDO();
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->execute(['id' => $user_id]);
    return $stmt->fetch(\PDO::FETCH_ASSOC);
}

function currentUser(): array|false
{
    $pdo = getPDO();

    if (!isset($_SESSION['user'])) {
        return false;
    }

    $userId = $_SESSION['user']['id'] ?? null;

    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->execute(['id' => $userId]);
    return $stmt->fetch(\PDO::FETCH_ASSOC);
}

function setUserData(string $name, string $login, int $role_id, string $password, string $birth_date, int $gender_id)
{
    $pdo = getPDO();
    $query = 'INSERT INTO users (name,login, role_id, password, birth_date, gender_id) VALUES (:name, :login, :role_id, :password, :birth_date, :gender_id) ON DUPLICATE KEY UPDATE name=VALUES(name),login=VALUES(login),role_id=VALUES(role_id), password=VALUES(password), birth_date=VALUES(birth_date), gender_id=VALUES(gender_id);';
    $params = [
        'name' => $name,
        'login' => $login,
        'role_id' => $role_id,
        'password' => $password,
        'birth_date' => $birth_date,
        'gender_id' => $gender_id
    ];
    $stmt = $pdo->prepare($query);
    $stmt->execute($params);

    // try {
    //     $stmt->execute($params);
    // } catch (\Exception $e) {
    //     die($e->getMessage());
    // }
}

function getUserResults($userId, $testId): array | false
{
    $pdo = getPDO();
    $stmt = $pdo->prepare("SELECT * FROM testings
    WHERE test_id = :testId AND user_id = :userId");
    $stmt->bindParam(':testId', $testId, \PDO::PARAM_INT);
    $stmt->bindParam(':userId', $userId, \PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
}

function getTestById(int $test_id): array|bool
{
    $pdo = getPDO();
    $stmt = $pdo->prepare("SELECT * FROM tests WHERE id = :id");
    $stmt->execute(['id' => $test_id]);
    return $stmt->fetch(\PDO::FETCH_ASSOC);
}

function getTests(): array
{
    $pdo = getPDO();
    $stmt = $pdo->prepare("SELECT * FROM tests");
    $stmt->execute();
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
}

function getTestResults($testId): array
{
    $pdo = getPDO();
    $stmt = $pdo->prepare("SELECT * FROM testings WHERE test_id = :testId");
    $stmt->bindParam(':testId', $testId, \PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
}

function addTestResults(int $user_id, int $test_id, int $reaction_time, int $accuracy, int $misses, int $mistakes)
{

    $pdo = getPDO();
    $query = 'INSERT INTO testings (user_id, test_id, reaction_time, accuracy, misses, mistakes) VALUES (:user_id, :test_id, :reaction_time, :accuracy, :misses, :mistakes);';
    $params = [
        'user_id' => $user_id,
        'test_id' => $test_id,
        'reaction_time' => $reaction_time,
        'accuracy' => $accuracy,
        'misses' => $misses,
        'mistakes' => $mistakes
    ];
    $stmt = $pdo->prepare($query);
    try {
        $stmt->execute($params);
    } catch (\Exception $e) {
        die($e->getMessage());
    }
}
