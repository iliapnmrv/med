<?php
require("../../db.php");
$sql = "SELECT DISTINCT vrednost from `vrednosti`";
$result = mysqli_query($db, $sql);
$options = "";
while ($rows = mysqli_fetch_array($result)) {
    $vred = $rows["vrednost"];
    $option = '<option value="' . $vred . '">' . $vred . '</option>';
    $options = $options . $option;
}

echo $options;