<?php
// Настройки подключения к базе данных mpnova-host.ru
define('DB_HOST', '95.213.255.60'); // IP или хост твоей БД со скриншота phpMyAdmin
define('DB_USER', 'u4969_qwB1B4FGdl');  // Логин (например, s4969_sc_test или похожий)
define('DB_PASS', 'eNUDolcO!N70JY.JoZ.r873K'); // Пароль от пользователя базы данных
define('DB_NAME', 's4969_sdadsad'); // Имя базы данных из phpMyAdmin

try {
    // Создаем подключение PDO
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4", DB_USER, DB_PASS);
    
    // Включаем режим вывода ошибок SQL
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Отключаем эмуляцию подготовленных выражений
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}