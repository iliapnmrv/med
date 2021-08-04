<?php
// Подключение других файлов
include('../../tableConstructor.php');
$date = $_POST["date"];
if (isset($date)) {
    require('../../db.php');
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
        order by `workers`.`worker-name` ASC
    ';
    $result = mysqli_query($db, $sql);

    $msg = "Показаны сотрудники с истекшим сроком прохождения медкомиссии";
    tableConstructor($result, $msg, $date);
}