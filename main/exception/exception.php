<?php
// Подключение к БД
require("../../db.php");
include('../../tableConstructor.php');
$exceptionId = $_POST["id"];
$checkbox = $_POST["checked"];
if ($checkbox == "add") { //если нажат чек бокс
    $sql_check = "SELECT * from `exceptions` WHERE `uniq-id` = $exceptionId";
    $res = mysqli_query($db, $sql_check);
    if (mysqli_num_rows($res) == 0) {
        $sql = "INSERT INTO `exceptions` (`uniq-id`, `exception`) VALUES ('$exceptionId', 1)";
        $result = mysqli_query($db, $sql);
        $msg = "Сотрудник с табельным номером " . $exceptionId . " был добавлен в исключения";
    } else {
        $msg = "Произошла ошибка";
    }
} else {
    $sql = "DELETE from `exceptions` WHERE `uniq-id` = $exceptionId";
    $msg = "Сотрудник с табельным номером " . $exceptionId . " был удален из исключений";
    $result = mysqli_query($db, $sql);
}
echo $msg;