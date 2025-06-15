
<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'znakomstva';

// Подключение к базе данных
$conn = new mysqli($host, $user, $password, $database);

// Проверка соединения
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}
?>
