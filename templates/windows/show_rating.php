<?php
require_once dirname(dirname(__DIR__)) . "/backend/config.php";
require_once ROOT . "/backend/db_managers.php";
require_once ROOT . "/backend/help_funcs.php";

$expertId = currentUser()['id'];

?>



<?php foreach (getProfessions() as $profession): ?>
    <?php $ratings = getRatingBy($expertId, $profession['id']);
    $profId = $profession['id'];
    ?>
    <div id="show_rating_<?php echo $profId; ?>_<?php echo $expertId; ?>" class="window">
        <div class="window-content">
            <div class="window-header">
                <h2>Просмотр своей оценки профессии</h2>
                <span class="close-rate-windows">&times;</span>
            </div>
            <div class="window-body">
                <?php if ($ratings): ?>
                    <h3>Ваша оценка:</h3>
                    <div class="rate_list" id="rate_list">
                    <?php foreach ($ratings as $rating): ?>
                        <?php
                        $piq_id = $rating['piq_id'];
                        $piq = getPiqById($piq_id);
                        $priority = round($rating['priority'] * 10);
                        echo $piq['name']; ?>
                        <br>
                        <div class="progress-bar"
                             style="width: 90%; background: linear-gradient(to right, red <?php echo $priority; ?>%, white 0%);">
                        </div>
                        <div class="progress">
                            <?php echo $priority . '%'; ?>
                        </div>
                        <br>
                    <?php endforeach; ?>
                <?php else: ?>
                    <h3>Не удалось найти ваши оценки</h3>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    </div>
<?php endforeach; ?>