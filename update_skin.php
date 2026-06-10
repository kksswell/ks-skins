<?php
include 'config.php';

header('Content-Type: application/json');

// Проверяем авторизацию
if (!isset($_SESSION['steamid'])) {
    $_SESSION['steamid'] = '76561198000000000'; // Заглушка, если тест
}

$steamid = $_SESSION['steamid'];
$weapon = isset($_POST['weapon_id']) ? $_POST['weapon_id'] : '';
$item_type = isset($_POST['item_type']) ? $_POST['item_type'] : 'weapons';
$paint = isset($_POST['paint_index']) ? intval($_POST['paint_index']) : 0;
$seed = isset($_POST['seed']) ? intval($_POST['seed']) : 0;
$wear = isset($_POST['wear']) ? floatval($_POST['wear']) : 0.00;

if (empty($weapon)) {
    echo json_encode(["success" => false, "message" => "Неверный ID предмета"]);
    exit();
}

try {
    if ($item_type === 'weapons') {
        // Запрос к таблице оружия со всеми полями
        $stmt = $pdo->prepare("
            INSERT INTO wp_player_skins (steamid, weapon_defindex, paint_index, seed, wear) 
            VALUES (?, ?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE paint_index = VALUES(paint_index), seed = VALUES(seed), wear = VALUES(wear)
        ");
        $stmt->execute([$steamid, $weapon, $paint, $seed, $wear]);
    } else {
        // Для ножей (knives), перчаток (gloves) и агентов (agents) префикс таблиц wp_
        // Названия таблиц: wp_player_knives, wp_player_gloves, wp_player_agents
        $table_name = "wp_player_" . $item_type;

        // Вспомогательный запрос динамической вставки (только steamid и weapon_defindex и paint_index)
        $stmt = $pdo->prepare("
            INSERT INTO {$table_name} (steamid, weapon_defindex, paint_index) 
            VALUES (?, ?, ?)
            ON DUPLICATE KEY UPDATE paint_index = VALUES(paint_index)
        ");
        $stmt->execute([$steamid, $weapon, $paint]);
    }

    echo json_encode(["success" => true, "message" => "Данные успешно сохранены"]);
} catch (PDOException $e) {
    echo json_encode(["success" => false, "message" => "Ошибка Базы Данных: " . $e->getMessage()]);
}
exit();