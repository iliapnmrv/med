<?php
//--- Создание таблицы
include('../../tableConstructor.php');
require('../../db.php');
include('../../database/db-check.php');
$msg = "Данные успешно загружены";
$sql = 'SELECT 
            `workers`.*, 
            `last-medical`.*,
            `exceptions`.*,
            `worker-vred`.*
            from `workers`
                LEFT JOIN  `last-medical`
                    ON `workers`.`unique-id` = `last-medical`.`uniqu-id`
                LEFT JOIN  `exceptions`
                    ON `workers`.`unique-id` = `exceptions`.`uniq-id`
                LEFT JOIN  `worker-vred`
                    ON `workers`.`unique-id` = `worker-vred`.`un-id`
            order by `workers`.`worker-name` ASC';
$result = mysqli_query($db, $sql);
tableConstructor($result, $msg, null);