<?php
require_once dirname(__DIR__) . "/backend/config.php";
require_once dirname(__DIR__) . "/backend/help_funcs.php";
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Общая статистика</title>
    <link rel="icon" href="../resources/ico.ico" type="image/x-icon">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/tables.css">
    <link rel="stylesheet" href="../styles/stats.css">
    <link rel="stylesheet" href="../styles/boxes.css">
    <link rel="stylesheet" href="../styles/windows.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <?php require_once ROOT . '/templates/header.php'; ?>

    <main class="main">
        <h1 class="heading">Общие результаты</h1>

        <h1 class="heading">Результаты тестов всех пользователей</h1>
        <div class="boxes">
            <?php foreach (getTests() as $test) :
                // id теста, который щас в цикле
                $testId = $test['id'];
            ?>

                <div class="box">
                    <div class="box_heading">
                        <h3><?php echo $test['name']; ?></h3>
                    </div>
                    <div class="stat_container">
                        <p>Среднее время реакции</p>

                        <?php
                        echo '//сюда среднее время реакции у этого теста с testId' ?>


                    </div>
                    <div class="stat_container">
                        <p>Точность</p>

                        <?php
                        echo '//сюда среднее точность у этого теста с testId' ?>


                    </div>
                    <div class="stat_container">
                        <p>Количество пропусков</p>

                        <?php
                        echo '//сюда среднее пропуски у этого теста с testId' ?>


                    </div>
                    <div class="stat_container">
                        <p>Количество ошибок</p>

                        <?php
                        echo '//сюда среднее ошибки у этого теста с testId' ?>


                    </div>
                    <button class="button" name="show_test_dynamic" test_id="<?php echo $testId; ?>">Динамика</button>
                </div>

            <?php endforeach; ?>

            <h2 class="heading">Результаты тестов отдельных пользователей</h2>

            <div class="norm-panel">
                <div class="norm-element">
                    <label for="male">Муж</label>
                    <input type="radio" name="gender" id="male" value="М" checked>
                    <label for="female">Жен</label>
                    <input type="radio" name="gender" id="female" value="Ж">
                </div>
                <div class="norm-element">
                    Возраст:
                    <select name="age" id="norm-age">
                        <option value="0">0-10</option>
                        <option value="1">11-20</option>
                        <option value="2">21-30</option>
                        <option value="3">31-40</option>
                        <option value="4">41-50</option>
                        <option value="5">51-60</option>
                        <option value="6">60+</option>
                    </select>
                </div>
                <button class="norm-button" id="normalize">Показать пользователей</button>
            </div>

            <table class="table">

                <colgroup>
                    <col style="width: 10%;">
                    <col style="width: 18%;">
                    <col style="width: 18%;">
                    <col style="width: 18%;">
                    <col style="width: 18%;">
                    <col style="width: 18%;">
                </colgroup>

                <thead>
                    <tr>
                        <th>Логин пользователя</th>
                        <th>Тест на простые визуальные сигналы</th>
                        <th>Тест на простые звуковые сигналы</th>
                        <th>Тест на разные цвета</th>
                        <th>Тест на скорость сложения в уме - сложный звуковой сигнал</th>
                        <th>Тест на скорость сложения в уме - сложный визуальный сигнал</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (getUsers() as $user) : ?>
                        <?php $userId = $user['id'];
                        $userLogin = $user['login']; ?>

                        <tr class="table_row" id="<?php echo $userLogin; ?>">
                            <td>
                                <?php echo $user['login']; ?>
                            </td>
                            <?php foreach (getTests() as $test) : ?>
                                <?php $testId = $test['id']; ?>
                                <td>
                                    <div class="stat_container">
                                        <p>Среднее время реакции</p>

                                        <?php
                                        echo '//сюда среднее реакцию пользователя с $userId' ?>


                                    </div>
                                    <div class="stat_container">
                                        <p>Точность</p>

                                        <?php
                                        echo 'сюда среднюю точность с $userId' ?>


                                    </div>
                                    <div class="stat_container">
                                        <p>Количество пропусков</p>

                                        <?php
                                        echo 'сюда среднюю пропуски с $userId'; ?>


                                    </div>
                                    <div class="stat_container">
                                        <p>Количество ошибок</p>

                                        <?php
                                        echo 'сюда среднюю ошбики с $userId'; ?>


                                    </div>
                                    <button class="button" name="show_spec_user_dynamic" user_id="<?php echo $userId; ?>" test_id="<?php echo $testId; ?>">Динамика</button>
                                </td>
                            <?php endforeach; ?>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
    </main>

    <?php include dirname(__DIR__) . '/templates/chart.php'; ?>

    <script type='module' src='../scripts/general_stats.js'></script>

</body>

</html>