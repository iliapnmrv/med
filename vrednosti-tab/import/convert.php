<?php
$files = scandir('../upload/uploads', SCANDIR_SORT_DESCENDING);
var_dump($files);
$file = $files[0];
echo $file;

// Import classes.
require '../../vendor/autoload.php';

use \PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use \PhpOffice\PhpSpreadsheet\Writer\Csv;

$ext = pathinfo($file, PATHINFO_EXTENSION);
echo $ext;

if ($ext == 'xlsx' || $ext == 'xls') {

    $reader = new Xlsx();
    $spreadsheet = $reader->load($xls_file);

    $loadedSheetNames = $spreadsheet->getSheetNames();

    $writer = new Csv($spreadsheet);

    foreach ($loadedSheetNames as $sheetIndex => $loadedSheetName) {
        $writer->setSheetIndex($sheetIndex);
        $writer->save($loadedSheetName . '.csv');
    }
    echo "Конвертировалось";
} else {
    echo "Файл готов к импортированию";
}