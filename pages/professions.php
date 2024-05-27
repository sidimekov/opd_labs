<?php

require_once dirname(__DIR__) . "/backend/config.php";
require_once ROOT . "/backend/db_managers.php";
require_once ROOT . "/backend/help_funcs.php";

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
    <link rel="stylesheet" href="../styles/professions.css">
</head>

<body>
<?php require_once ROOT . '/templates/header.php'; ?>

<div class="main">
    <h1 class="heading">Профессии</h1>
    <div class="profession-boxes">
        <?php $professions = getProfessions();
        if (empty ($professions)): ?>
            <p style="font-family: Times new roman; font-size: 24px;">Сюда ещё не добавлены профессии</p>
        <?php else: ?>
            <?php foreach ($professions as $profession): ?>
                <div class="profession-box">
                    <h2>
                        <?php echo $profession['name']; ?>
                    </h2>
                    <p>
                        <?php echo $profession['description']; ?>
                    </p>
                    <button class="pvc-button">Показать рейтинг ПВК</button>
                    <dl class="pvc-list">
                        <?php $results = getProfResultRating($profession['id'], 10);
                        if (empty ($results)): ?>
                            <p>Для данной профессии ещё нет оценок</p>
                        <?php else: ?>
                            <?php foreach ($results as $piq_id => $result): ?>
                                <?php $importance = round($result['importance'] * 100);
                                $piq = $result['piq']; ?>
                                <?php echo $piq['name']; ?>
                                <br>
                                <div class="rating-bar"
                                     style="width: 90%; background: linear-gradient(to right, red <?php echo $importance; ?>%, white 0%);">
                                </div>
                                <div class="rating-progress">
                                    <?php echo $importance . '%'; ?>
                                </div>
                                <br>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </dl>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<script type='module' src="../scripts/professions.js"></script>
</body>

</html>