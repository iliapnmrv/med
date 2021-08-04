<?php
// Функция подсчета дней
function dayCount($today, $medDate)
{
    $lastMedicalStr = strtotime($medDate);
    $dayCount = abs($today - $lastMedicalStr);
    $dayCount = intval(floor($dayCount / (60 * 60 * 24)));
    return $dayCount;
};
function tableConstructor($res, $msg, $filter) //Параметр msg передает сообщение пользователю
{
    // echo $res;
    $today = date("d.m.y");
    $today = strtotime($today);
    $filter_exists = false;
    if ($filter != null) {
        if ((strtotime($filter)) === false) {
            echo 'failed!!!!!!';
        }
        $filter = strtotime($filter);
        $filter_exists = true;
    }
    require('db.php');
    // объявление переменных
    $x = 0;
    $constructor = "";
    for (
        $set = array();
        $row = $res->fetch_assoc();
        $set[] = $row
    ) {
    };
    // Ассоциативный массив запроса всех сотрудников
    foreach ($set as $item) {
        $tabNom = $item['unique-id'];
        $smena = $item["nomer-smeny"];
        // Исключение
        // Проверка на существование исключения 
        $exception = $item["exception"];
        if ($exception == Null) {
            $exception = 0;
        }

        // Проверка на исключение
        if ($exception == 1) { //если это исключение
            $exceptionRes = "checked";
            $excepBoolean = 1;
        } else {
            $exceptionRes = '';
            $excepBoolean = 0;
        }
        // Последняя дата прохождения, при применении фильтра по дате, перерасчет количества дней
        $lastMedDate = $item["last-medical-date"];
        $lastMedFormat = strtotime($lastMedDate);
        if ($filter_exists) {
            if ($filter >= $lastMedFormat) {
                $days = dayCount($filter, $lastMedDate);
            } else {
                $days = 0;
            }
        } else {
            if ($today >= $lastMedFormat) {
                $days = dayCount($today, $lastMedDate);
            } else {
                $days = 0;
            }
        }

        if ($days >= 335) {
            $haveTo = "days-true";
        } else {
            $haveTo = "days-false";
        }
        $vrednost = $item["vred"];
        if ($vrednost == null) {
            $selectDisplay = "none";
        } else {
            $selectDisplay = "none";
        }
        $select = '<select class="vredSelect ' . $selectDisplay . '" id="' . $tabNom . '" " onchange="val(this.value, this.id)">
                        <option value=""></option>
                    </select>';
        $x++;
        $tbody = '
        <tr class="all-workers ' . $haveTo . ' ' . $smena . ' smena smena-false exception' . $excepBoolean . '">
            <td>' . $x . '</td>
            <td>' . $tabNom   . '</td>
            <td>' . $item["worker-name"] . '</td>
            <td>' . $item["position"] . '</td>
            <td data-t="d"><div class="none">' . $lastMedDate . '</div><input type="date" value="' . $lastMedDate . '" id="' . $tabNom . '" class="reset-med-date" onchange="dateChange(this.value, this.id)"></td>
            <td>' . $days . '</td>
            <td>' . $smena . '</td>
            <td class="vred__td"> <div class="vred-edit"  onclick="edit(' . "'$tabNom'" . ', ' . $x . ')"><i class="far fa-edit"></i></div><div class="vred">' . $vrednost . '</div>' . $select . '</td>
            <td data-exclude="true"><input type="checkbox" name="' . $tabNom . '" ' . $exceptionRes . ' onclick="exception(' . "'$tabNom'" . ', ' . $excepBoolean . ')"></td>
        </tr>';
        $constructor = $constructor . $tbody;
    }
    // Сообщение пользователю
    $message = '<div id="user-message">' . $msg . '</div>';



    // Сборка таблицы
    $table =
        $message .
        '<table class="worker tablesorter" id="myTable">
            <thead class="row table-header">
                <tr>
                    <th>№ п/п</th>
                    <th>Табельный номер</th>
                    <th>ФИО сотрудника</th>
                    <th>Должность</th>
                    <th>Дата последнего прохождения</th>
                    <th title="Количество дней с последнего прохождения">Кол-во дней</th>
                    <th>№ смены</th>
                    <th class="vred__td">Вредные и (или) опасные производственные факторы и виды работ</th>
                    <th data-exclude="true">Исклю-чения</th>
                </tr>
            </thead>
            <tbody>
                ' . $constructor . ' 
            </tbody>
        </table>
        
        ';
    // Вывод
    echo $table;
}