<?php
// Подключение к бд
require('db.php');
// Сегодняшняя дата
$today = date("Y-m-d");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Медицинский осмотр</title>
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- statics -->
    <link href="assets/static/css/all.min.css" rel="stylesheet">
    <script src="assets/static/jquery.js"></script>
    <link rel="shortcut icon" href="assets/static/images/favicon.ico" type="image/png">
    <!-- plugin styles -->
    <link async href="assets/plugins/multiple-select/css/select-multiple.css" media="screen" rel="stylesheet" />
    <link async href="assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <h2>Сотрудники компании</h2>
        <div class="filters">
            <div class="filter">
                <div class="filter-item date-filter">
                    <label for="end-date">Список сотрудников с истекшим скором прохождения медосмотра на</label>
                    <input type="date" name="date-filter" id="end-date">

                </div>
                <div class="filter-item">
                    <label for="export"><i class="far fa-file-excel"></i></label>
                    <input id="export" type="button" value="Экспорт" onclick="excelExport()">
                </div>
            </div>
            <div class="filter footer">
                <div class="filter__footer_wrapper">
                    <div class="dropdown">
                        <button onclick="dropdown()" class="dropbtn">Выбрать номер смены</button>
                        <div class="dropdown-content" id="dropdown">
                            <select name="my-select[]" multiple="multiple" id="smena">
                            </select>
                        </div>
                    </div>
                    <div class="exception_checkbox">
                        <label for="exception">Показать исключения</label>
                        <input type="checkbox" name="exception" id="exception">
                    </div>
                    <input type="button" value="Показать" class="submit-btn" onclick="sort()" id="sort">
                </div>
            </div>
        </div>
        <div class="tabs-container">
            <ul class="tabs">
                <li class="active">
                    <a href="">Все сотрудники</a>
                </li>
                <li>
                    <a href="">Вредные и (или) опасные производственные факторы и виды работ</a>
                </li>
            </ul>
            <div class="tabs-content">
                <div class="tabs-panel active" data-index="0">
                    <div class="search">
                        <input type="text" name="search" onkeyup="search()" id="search"
                            placeholder="Поиск по ФИО сотрудника...">
                    </div>
                    <section class="workers-data">
                        <div class="header">Все сотрудники фирмы</div>
                        <input class="submit-btn update" type="button" value="Обновить страницу"
                            onClick="window.location.reload();">

                        <div class="wrapper">

                        </div>
                    </section>
                </div>
                <div class="tabs-panel" data-index="1">
                    <div class="search">
                        <input type="text" name="search" onkeyup="searchPos()" id="searchPos"
                            placeholder="Поиск по должности...">
                    </div>
                    <div class="import-vred">
                        <form method="post" id="ajaxfileup" name="ajaxfileup" onsubmit="return submitForm();">
                            <input type="file" name="file" required />
                            <input type="submit" value="Upload" />
                        </form>
                    </div>
                    <section>

                        <div class="wrapper" id="vrednosti-tab">

                        </div>
                    </section>
                </div>
            </div>
        </div>


    </div>

    <script src="assets/js/main.js"></script>
    <!-- main content/основной блок -->
    <script src="main/all-workers/all-workers.js"></script>
    <script src="main/exception/exception.js"></script>
    <script src="main/reset-date/reset-date.js"></script>
    <script src="main/search/search.js"></script>


    <script src="vrednosti-tab/tab.js"></script>
    <script src="vrednosti-tab/import/import.js"></script>

    <!-- Фильтрация/сортировка -->
    <script src="filter/sort/sort.js"></script>
    <script src="filter/smena/smena.js"></script>

    <!-- Вредности -->
    <script src="vrednosti/add/add.js"></script>
    <script src="vrednosti/edit/edit.js"></script>

    <!-- plugins -->
    <script src="assets/plugins/select2/dist/js/select2.min.js"></script>
    <script type="text/javascript" src="assets/plugins/multiple-select/js/jquery.select-multiple.js"></script>
    <script defer type="text/javascript" src="assets/plugins/table-to-excel/dist/tableToExcel.js"></script>
    <script defer type="text/javascript" src="assets/plugins/table-to-excel/script.js"></script>
    <!-- <script type="text/javascript" src="assets/plugins/edit-data/dist/jquery.jeditable.min.js"></script> -->

</body>

</html>