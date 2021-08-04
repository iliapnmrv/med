<?php
require('../db.php');
$query = "SELECT * from `vrednosti`";
$res = mysqli_query($db, $query);
$construct = "";
while ($row = mysqli_fetch_assoc($res)) {
    $pos = $row['positionn'];
    $vred = $row['vrednost'];
    $tr = "<tr>
            <td>" . $pos . "</td>
            <td>" . $vred . "</td>
        </tr>";
    $construct = $construct . $tr;
}
$table = "
<table id='positions'>
    <thead>
        <tr>
            <th>Должность</th>
            <th>Вредность</th>
        </tr>
    </thead>
    <tbody>
        " . $construct . "
    </tbody>
</table>";
echo $table;