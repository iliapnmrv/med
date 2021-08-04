<?php
$servername = "";
$database = "";
$username = "";
$password = "";
// Создаем соединение
$db = mysqli_connect($servername, $username, $password, $database);
// Проверяем соединение
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}