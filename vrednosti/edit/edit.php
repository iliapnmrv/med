<?php
require("../../db.php");
$id = $_POST["id"];
$query = "DELETE from `worker-vred` where `un-id` = '$id'";
$res = mysqli_query($db, $query);
echo "Введите вредность сотрудника с табельным номером " . $id;