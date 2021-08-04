<?php
require("../../db.php");
$sql = "SELECT DISTINCT `nomer-smeny` FROM `workers`";
$result = mysqli_query($db, $sql);
while ($rows = mysqli_fetch_array($result)) {
    $options = $options . "<option value='" . $rows['nomer-smeny'] . "'>" . $rows['nomer-smeny'] . "</option>";
}
echo $options;