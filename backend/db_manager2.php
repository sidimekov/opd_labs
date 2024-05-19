<?php




require_once __DIR__ . '/config.php';


$PDO = null;
// получить объект PDO для работы с БД

function getPDO(): PDO
{
    try {
        return new \PDO('mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';charset=utf8;dbname=' . 'labs', DB_USERNAME, DB_PASSWORD);
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

function getTests(): array
{
    $pdo = getPDO();
    $stmt = $pdo->prepare("SELECT * FROM tests");
    $stmt->execute();
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
}

function getUserById($userId): array
{
    $pdo = getPDO();
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :userId");
    $stmt->bindParam(':userId', $userId, \PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(\PDO::FETCH_ASSOC);
}

function getTestById($testId): array
{
    $pdo = getPDO();
    $stmt = $pdo->prepare("SELECT * FROM tests WHERE id = :testId");
    $stmt->bindParam(':testId', $testId, \PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(\PDO::FETCH_ASSOC);
}

function setUserData(int $user_id, string $name, string $email, int $role_id)
{
    $pdo = getPDO();
    $query = 'INSERT INTO users (id,name,email,role_id) VALUES (:user_id, :name, :email, :role_id) ON DUPLICATE KEY UPDATE name=VALUES(name),email=VALUES(email),role_id=VALUES(role_id);';
    $params = [
        'user_id' => $user_id,
        'name' => $name,
        'email' => $email,
        'role_id' => $role_id
    ];
    $stmt = $pdo->prepare($query);
    try {
        $stmt->execute($params);
    } catch (\Exception $e) {
        die($e->getMessage());
    }
}

function getUserResults($userId, $testId): array
{
    $pdo = getPDO();
    $stmt = $pdo->prepare("SELECT statistics FROM testings
    WHERE test_id = :testId AND user_id = :userId");
    $stmt->bindParam(':testId', $testId, \PDO::PARAM_INT);
    $stmt->bindParam(':userId', $userId, \PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt -> fetch();
    if($result){
        $result['statistics'] = json_decode($result['statistics'], true);
        return $result;
    }else{
        return array();
    }
    //return $stmt->fetch(\PDO::FETCH_ASSOC);
}

function getTestResults($testId): array
{
    $pdo = getPDO();
    $stmt = $pdo->prepare("SELECT statistics FROM testings WHERE test_id = :testId");
    $stmt->bindParam(':testId', $testId, \PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt -> fetch();
    if($result){
        // $statistics = json_decode($result['statistics'], true);
        $result['statistics'] = json_decode($result['statistics'], true);
        return $result;
    }else{
        return array();
    }
    //return $stmt->fetchAll(\PDO::FETCH_ASSOC);
}

/*function addTestResults($userId, $testId, $reactionTime, $accuracy, $misses, $mistakes): void
{
    $pdo = getPDO();
    $stmt = $pdo->prepare("INSERT INTO testings (user_id, test_id, reaction_time, accuracy, misses, mistakes) VALUES (:userId, :testId, :reactionTime, :accuracy, :misses, :mistakes)");
    $stmt->bindParam(':userId', $userId, \PDO::PARAM_INT);
    $stmt->bindParam(':testId', $testId, \PDO::PARAM_INT);
    $stmt->bindParam(':reaction_time', $reactionTime, \PDO::PARAM_STR);
    $stmt->bindParam(':accuracy', $accuracy, \PDO::PARAM_STR);
    $stmt->bindParam(':misses', $misses, \PDO::PARAM_INT);
    $stmt->bindParam(':mistakes', $mistakes, \PDO::PARAM_INT);
    $stmt->execute();
}*/
function addTestResults($userId, $testId, $statistics): void
{
    $pdo = getPDO();
    $statisticsJson = json_encode($statistics);

    $stmt = $pdo->prepare("INSERT INTO testings (user_id, test_id, statistics) VALUES (:userId, :testId, :statistics)");
    $stmt->bindParam(':userId', $userId, \PDO::PARAM_INT);
    $stmt->bindParam(':testId', $testId, \PDO::PARAM_INT);
    $stmt->bindParam(':statistics', $statisticsJson, \PDO::PARAM_STR);
    $stmt->execute();
}

function getMidUserStats($testId, $userId = null)
{
    $pdo = getPDO();
    $query = "SELECT statistics FROM testings WHERE test_id = :testId";
    if ($userId !== null) {
        $query .= " AND user_id = :userId";
    }

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':testId', $testId, \PDO::PARAM_INT);
    
    if ($userId !== null) {
        $stmt->bindParam(':userId', $userId, \PDO::PARAM_INT);
    }

    $stmt->execute();
    $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);

    $totalStats = [];
    $totalCount = count($results);

    foreach ($results as $result) {
        $statistics = json_decode($result['statistics'], true);
        foreach ($statistics as $key => $value) {
            if (!isset($totalStats[$key])) {
                $totalStats[$key] = 0;
            }
            $totalStats[$key] += $value;
        }
    }

    $averageStats = [];
    foreach ($totalStats as $key => $value) {
        $averageStats[$key] = $value / $totalCount;
    }

    return $averageStats;
}

