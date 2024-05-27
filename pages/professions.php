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
    <link rel="stylesheet" href="../styles/windows.css">

    <?php include_once ROOT . '/templates/script_reload.php'; ?>
</head>

<body>
<?php require_once ROOT . '/templates/header.php'; ?>

<main class="main">
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


<!--                        попытка вставить 1 лабу-->
<!--                        <br>-->
<!--                        <br>-->
<!--                        --><?php
//                        $userId = currentUser()['id'];
//                        $profId = $profession['id'];
//                        if (empty (getRatingBy($userId, $profId))):
//                            ?>
<!--                            <div class="button-container">-->
<!--                                <button type="button" name="--><?php //echo $profId; ?><!--_--><?php //echo $userId; ?><!--"-->
<!--                                        id="rate-button"-->
<!--                                        class="button" style="font-size: 16px;">Оценить профессию-->
<!--                                </button>-->
<!--                            </div>-->
<!--                        --><?php //else: ?>
<!--                            <div class="button-container">-->
<!--                                <form method="post" action="backend/delete_rate.php">-->
<!--                                    <button type="button" name="--><?php //echo $profId; ?><!--_--><?php //echo $userId; ?><!--"-->
<!--                                            id="view-rating-button"-->
<!--                                            class="button" style="font-size: 16px; width: 40%;">Посмотреть свою оценку-->
<!--                                    </button>-->
<!--                                    <input style='display: none;' name="delete_rate" value="--><?php //echo $profId; ?><!--">-->
<!--                                    <button type="submit" class="button" style="font-size: 16px; width: 40%;">Удалить-->
<!--                                        свою оценку-->
<!--                                    </button>-->
<!--                                </form>-->
<!--                            </div>-->
<!--                        --><?php //endif; ?>


                    </dl>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <?php include_once ROOT . '/templates/windows/choose_piqs.php'; ?>
    <?php include_once ROOT . '/templates/windows/rate_piqs.php'; ?>
    <?php include_once ROOT . '/templates/windows/show_rating.php'; ?>

<!--    <script src="../scripts/rate_piqs.js"></script>-->
</main>

<!--<script type='module' src="../scripts/professions.js"></script>-->
</body>

</html>