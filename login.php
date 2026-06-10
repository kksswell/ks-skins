<?php
require_once 'class/config.php';

$openid_url = 'https://steamcommunity.com/openid/login';

if (!isset($_GET['openid_assoc_handle'])) {
    // Шаг 1: Перенаправление пользователя на Steam
    $params = [
        'openid.ns'         => 'http://specs.openid.net/auth/2.0',
        'openid.mode'       => 'checkid_setup',
        'openid.return_to'  => 'http://' . DOMAIN_NAME . '/login.php',
        'openid.realm'      => 'http://' . DOMAIN_NAME,
        'openid.identity'   => 'http://specs.openid.net/auth/2.0/identifier_select',
        'openid.claimed_id' => 'http://specs.openid.net/auth/2.0/identifier_select'
    ];
    header('Location: ' . $openid_url . '?' . http_build_query($params));
    exit();
} else {
    // Шаг 2: Возврат из Steam и проверка валидности
    if ($_GET['openid_mode'] == 'id_res') {
        $params = [];
        foreach ($_GET as $key => $val) {
            if ($key == 'PHPSESSID') continue;
            $params['openid.' . substr($key, 7)] = $val;
        }
        $params['openid.mode'] = 'check_authentication';

        $c = curl_init();
        curl_setopt($c, CURLOPT_USERAGENT, 'Mozilla/5.0');
        curl_setopt($c, CURLOPT_URL, $openid_url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, http_build_query($params));
        $result = curl_exec($c);
        curl_close($c);

        if (preg_match("#is_valid:true#i", $result)) {
            preg_match('#https://steamcommunity.com/openid/id/([0-9]+)#', $_GET['openid_claimed_id'], $matches);
            $steamid64 = $matches[1];
            
            $_SESSION['steamid'] = $steamid64;
            
            // Получаем аватарку и ник через Steam API
            $api_url = "https://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=" . STEAM_API_KEY . "&steamids=" . $steamid64;
            $response = json_decode(file_get_contents($api_url), true);
            if (!empty($response['response']['players'][0])) {
                $_SESSION['username'] = $response['response']['players'][0]['personaname'];
                $_SESSION['avatar'] = $response['response']['players'][0]['avatarfull'];
            }
        }
    }
    header('Location: index.php');
    exit();
}