<?php
require("../../db.php");
$id = $_POST["id"];
$vred = $_POST["vred"];
$sql_check = "SELECT * from `worker-vred` WHERE `un-id` = $id";
$res = mysqli_query($db, $sql_check);
$rowNum = mysqli_num_rows($res);
if ($rowNum != 0) {
    $query = "UPDATE `worker-vred` SET `vred` = '$vred' where `un-id` = $id";
    $res = mysqli_query($db, $query);
} else {
    $query2 = "INSERT INTO `worker-vred` (`un-id`, `vred`) VALUES ('$id','$vred')";
    $res = mysqli_query($db, $query2);
}
$msg = "Изменена вредность сотрудника с табельным номером " . $id;
echo $msg;