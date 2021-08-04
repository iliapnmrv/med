<?php
// Функция очистки бд при добавлении новых сотрудников/изменении таблицы вредностей
function delete()
{
    require('../../db.php');
    $query1 = "DELETE * FROM `workers-vred`";
    $res = mysqli_query($db, $query1);
    $query2 = "DELETE * FROM `positions`";
    $res = mysqli_query($db, $query2);
}