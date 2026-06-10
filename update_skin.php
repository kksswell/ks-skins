<?php
require_once 'class/config.php';

if (!isset($_SESSION['steamid'])) {
    echo json_encode(['success' => false, 'message' => 'Не авторизован']);
    exit();
}

$steamid64 = $_SESSION['steamid'];
$weapon = $_POST['weapon'] ?? '';
$paint = intval($_POST['paint'] ?? 0);
$seed = intval($_POST['seed'] ?? 0);
$wear = floatval($_POST['wear'] ?? 0.0);

if (empty($weapon)) {
    echo json_encode(['success' => false, 'message' => 'Неверное оружие']);
    exit();
}

try {
    // В зависимости от плагина, таблица может называться `wp_player_skins` или похожим образом.
    // Пример запроса обновления данных:
    $stmt = $pdo->prepare("
        INSERT INTO `wp_player_skins` (`steamid`, `weapon`, `paint`, `seed`, `wear`) 
        VALUES (:steamid, :weapon, :paint, :seed, :wear)
        ON DUPLICATE KEY UPDATE `paint` = :paint, `seed` = :seed, `wear` = :wear
    ");
    
    $stmt->execute([
        ':steamid' => $steamid64,
        ':weapon'  => $weapon,
        ':paint'   => $paint,
        ':seed'    => $seed,
        ':wear'    => $wear
    ]);

    echo json_encode(['success' => true, 'message' => 'Скин успешно обновлен!']);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Ошибка БД: ' . $e->getMessage()]);
}