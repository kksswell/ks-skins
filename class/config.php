<?php
// Включаем отображение ошибок, чтобы понять, почему экран серый
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Настройка подключения к базе данных phpMyAdmin Nova-Host
define('DB_HOST', '95.213.255.10'); // IP хоста твоего БД
define('DB_USER', 'u4969_vjwR1MsFuX'); // Логин
define('DB_PASS', 'm4UGeLCh19dfPJs2_M27K'); // Пароль
define('DB_NAME', 'u4969_sdadsad'); // Имя базы данных

try {
    // Создаем подключение PDO с таймаутом 3 секунды
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_TIMEOUT => 3 
    ];
    
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4", DB_USER, DB_PASS, $options);
    
    // Отключаем эмуляцию подготовленных выражений
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
} catch (PDOException $e) {
    echo '<div style="background:#222; color:#ff6b6b; padding:20px; font-family:sans-serif; text-align:center; height:100vh;">';
    echo '<h2>Ошибка подключения к базе данных:</h2>';
    echo '<pre style="background:#333; color:#fff; padding:15px; display:inline-block; text-align:left; border:1px solid #ff6b6b;">' . $e->getMessage() . '</pre>';
    echo '</div>';
    die();
}