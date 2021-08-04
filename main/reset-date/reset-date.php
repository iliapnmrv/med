<?php
// Подключение к БД
require("../../db.php");
include('../../tableConstructor.php');
// Данные, переданные ajax
$resetDate = $_POST["dateValue"];
$resetId = $_POST["id"];
// запрос
$sql_check = "SELECT * from `last-medical` WHERE `uniqu-id` = $resetId";
$res = mysqli_query($db, $sql_check);
// var_dump($sql_check);
if (mysqli_num_rows($res) == 0) {
    $sql = "INSERT INTO `last-medical` (`uniqu-id`, `last-medical-date`) VALUES ('$resetId',' $resetDate ')";
    $result = mysqli_query($db, $sql);
} else {
    $sql = "UPDATE `last-medical` SET `last-medical-date` = '$resetDate'  WHERE `last-medical`.`uniqu-id` = $resetId";
    $result = mysqli_query($db, $sql);
}
$msg = "Дата последнего прохождения медкомиссии сотрудником с табельным номером " . $resetId . " была изменена на " . $resetDate;
// Данные для полного обновления таблицы
$today = date("d.m.y");
$today = strtotime($today);
// Последняя дата прохождения, при применении фильтра по дате, перерасчет количества дней
$resetDateFormat = strtotime($resetDate);
if ($resetDateFormat < $today) {
    // Проверка на случай, если дата прохождения позже сегодняшней
    $days = dayCount($today, $resetDate);
} else {
    $days = 0;
}
echo $days;