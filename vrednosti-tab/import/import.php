<?php
require('../../db.php');
$file = $_FILES["file"]["tmp_name"];
var_dump($file);

$file = mb_convert_encoding($file, 'utf-8', 'cp1251'); //изменение кодировки
var_dump($file);
$file_open = fopen($file, "r");
$query = "DELETE * FROM vrednosti";
// mysqli_query($db, $query);

while (($csv = fgetcsv($file_open, 1000, ",")) !== false) {
    $pos = $csv[0];
    $vred = $csv[1];
    echo $pos, $vred;
    $query = "INSERT INTO `vrednosti`(positionn, vrednost) VALUES ('$pos','$vred')";
    // mysqli_query($db, $query);
}
    // delete();