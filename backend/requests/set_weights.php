<?php

require_once dirname(__DIR__) . "/config.php";
require_once ROOT . '\backend\help_funcs.php';
require_once ROOT . '\backend\db_managers.php';

$weights = json_decode($_POST['weights'], true);
//$weights = json_decode("[{\"piq_id\":249,\"test_id\":3,\"stat_name\":\"Успешные попытки\",\"weight\":12}]", true);

//print_r($weights);

$suc = setWeights($weights);

//updatePiqLevels();

echo json_encode(array("response" => $suc));