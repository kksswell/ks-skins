<?php
// Включаем сессии
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Настройки базы данных (данные от твоего MySQL сервера CS2)
define('DB_HOST', '95.213.255.80:3306');
define('DB_USER', 'u4969_qwB1B4FGdl');
define('DB_PASS', 'eNUDolcO!N70JY.JoZ.r873K');
define('DB_NAME', 's4969_sdadsad');

// Настройки Steam API
define('STEAM_API_KEY', 'CFD9C7353F93011A7FAC7CD6FBE973E4'); // Получить на steamcommunity.com/dev/apikey
define('DOMAIN_NAME', $_SERVER['SERVER_NAME']); // Автоматически определит твой домен

try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4", DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die("Ошибка подключения к БД: " . $e->getMessage());
}