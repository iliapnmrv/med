<?php

// Проверка на пустоту баз данных
$posCheck = "SELECT * FROM `positions`"; //сравнение 2 таблиц
$res = mysqli_query($db, $posCheck);
// количество строк в таблице должностей
$posNum = mysqli_num_rows($res);

$workersCheck = "SELECT * FROM `workers`";
$res = mysqli_query($db, $workersCheck);
// количество строк в таблице всех сотрудников
$workerNum = mysqli_num_rows($res);

$vredCheck = "SELECT * FROM `worker-vred`";
$res = mysqli_query($db, $vredCheck);
// Количество строк в таблице сотрудников и их вредностей
$vredNum = mysqli_num_rows($res);

//проверка на удаление и добавление в случае добавления новых сотрудников
if ($posNum != $workerNum) {
    if ($posNum != 0) {
        $sqli = 'DELETE * FROM `positions`';
        $res = mysqli_query($db, $sqli);
    }
    // Копирование из основной таблицы
    $sqlii = 'INSERT INTO `positions`(`uni-id`, `main-position`) SELECT `unique-id`, `position` FROM workers';
    // Удаление слово разряда из строки
    $res = mysqli_query($db, $sqlii);
    $query = 'SELECT * FROM `positions`';
    $res = mysqli_query($db, $query);
    while ($row = mysqli_fetch_assoc($res)) {
        $pos = $row["main-position"];
        $id = $row["uni-id"];
        if (strpos($pos, 'разряда')) { //если строка содержит слово 'разряда'
            $newPos = mb_substr($pos, 0, -10);
        } else {
            $newPos = $pos;
        }
        $query = "UPDATE `positions` SET `main-position` =  '$newPos' WHERE `uni-id`= '$id'";

        $res = mysqli_query($db, $query);
    }
}
if ($vredNum == 0) {
    $query3 = "INSERT INTO `worker-vred`(`un-id`,`vred`) 
                SELECT 
                    workers.`unique-id`,
                    vrednosti.vrednost
                FROM positions
                    LEFT JOIN `vrednosti`
                        ON positions.`main-position` = vrednosti.positionn
                    LEFT JOIN `workers`
                        ON positions.`uni-id` = workers.`unique-id`";
    $result = mysqli_query($db, $query3);
}