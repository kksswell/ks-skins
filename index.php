<?php
include 'config.php';

// Имитируем авторизацию для теста (в будущем тут будет SteamAuth)
$_SESSION['steamid'] = '76561198000000000'; 

$steamid = $_SESSION['steamid'];

// Массив со ВСЕМ оружием, ножами, перчатками и агентами CS2
$weapons = [
    // --- ПИСТОЛЕТЫ ---
    ['id' => 'weapon_glock', 'name' => 'Glock-18', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4Ygq6TeSa9Wp9Wi1YvVA11vLg1R76v_fVQu16bJZitH4NjgldS0wK-ha-6Gxj4DuZ0p0upg07_E9N2t2Vbt-0U_ZmrwJ4eWclA8NFCEq1O7x7q41pC6vJ3Kyic2pGB8snun7ym4'],
    ['id' => 'weapon_hkp2000', 'name' => 'P2000', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4Ygq6TeSa9Wp9Wi1YvVA11vLg1R76v_fVQu16bJYz8TvN2jxoO0w6AtY-uGkz4DsZ0p37-S8Imn2wXg-hVvY2v1dYfGclI7YAnUrle8xb-x18S_7snXWw2XGg'],
    ['id' => 'weapon_usp_silencer', 'name' => 'USP-S', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4Ygq6TeSa9Wp9Wi1YvVA11vLg1R76v_fVQu16bJYz8TvN2kk7-Hnvb6I7icXp6lwb9X7MBy0b6Wp4_x2gbs8hVyY2DycYfGcFRqN1vS8wW418S-g8efuM6Yn3EwuXY8pSGKJAn9_G4'],
    ['id' => 'weapon_p250', 'name' => 'P250', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4Ygq6TeSa9Wp9Wi1YvVA11vLg1R76v_fVQu16bJZitH4NjgldS0wK-ha-6Gxj4DuZ0p0upg07_E9N2t2Vbt-0U_ZmrwJ4eWclA8NFCEq1O7x7q41pC6vJ3Kyic2pGB8snun7ym4'],
    ['id' => 'weapon_fiveseven', 'name' => 'Five-SeveN', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4Ygq6TeSa9Wp9Wi1YvVA11vLg1R76v_fVQu16bJZitH4NjgldS0wK-ha-6Gxj4DuZ0p0upg07_E9N2t2Vbt-0U_ZmrwJ4eWclA8NFCEq1O7x7q41pC6vJ3Kyic2pGB8snun7ym4'],
    ['id' => 'weapon_cz75a', 'name' => 'CZ75-Auto', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4Ygq6TeSa9Wp9Wi1YvVA11vLg1R76v_fVQu16bJZitH4NjgldS0wK-ha-6Gxj4DuZ0p0upg07_E9N2t2Vbt-0U_ZmrwJ4eWclA8NFCEq1O7x7q41pC6vJ3Kyic2pGB8snun7ym4'],
    ['id' => 'weapon_tec9', 'name' => 'Tec-9', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4Ygq6TeSa9Wp9Wi1YvVA11vLg1R76v_fVQu16bJZitH4NjgldS0wK-ha-6Gxj4DuZ0p0upg07_E9N2t2Vbt-0U_ZmrwJ4eWclA8NFCEq1O7x7q41pC6vJ3Kyic2pGB8snun7ym4'],
    ['id' => 'weapon_deagle', 'name' => 'Desert Eagle', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4Ygq6TeSa9Wp9Wi1YvVA11vLg1R76v_fVQu16bJZitH4NjgldS0wK-ha-6Gxj4DuZ0p0upg07_E9N2t2Vbt-0U_ZmrwJ4eWclA8NFCEq1O7x7q41pC6vJ3Kyic2pGB8snun7ym4'],
    ['id' => 'weapon_revolver', 'name' => 'R8 Revolver', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4Ygq6TeSa9Wp9Wi1YvVA11vLg1R76v_fVQu16bJZitH4NjgldS0wK-ha-6Gxj4DuZ0p0upg07_E9N2t2Vbt-0U_ZmrwJ4eWclA8NFCEq1O7x7q41pC6vJ3Kyic2pGB8snun7ym4'],

    // --- ПП (Пистолеты-пулеметы) ---
    ['id' => 'weapon_mac10', 'name' => 'MAC-10', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4Ygq6TeSa9Wp9Wi1YvVA11vLg1R76v_fVQu16bJZitH4NjgldS0wK-ha-6Gxj4DuZ0p0upg07_E9N2t2Vbt-0U_ZmrwJ4eWclA8NFCEq1O7x7q41pC6vJ3Kyic2pGB8snun7ym4'],
    ['id' => 'weapon_mp9', 'name' => 'MP9', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4Ygq6TeSa9Wp9Wi1YvVA11vLg1R76v_fVQu16bJZitH4NjgldS0wK-ha-6Gxj4DuZ0p0upg07_E9N2t2Vbt-0U_ZmrwJ4eWclA8NFCEq1O7x7q41pC6vJ3Kyic2pGB8snun7ym4'],
    ['id' => 'weapon_mp7', 'name' => 'MP7', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo44UUX4oFJZEHLbXH5ApeO4Ygq6TeSa9Wp9Wi1YvVA11vLg1R76v_fVQu16bJZitH4NjgldS0wK-ha-6Gxj4DuZ0p0upg07_E9N2t2Vbt-0U_ZmrwJ4eWclA8NFCEq1O7x7q41pC6vJ3Kyic2pGB8snun7ym4'],
    ['id' => 'weapon_mp5sd', 'name' => 'MP5-SD', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4Ygq6TeSa9Wp9Wi1YvVA11vLg1R76v_fVQu16bJZitH4NjgldS0wK-ha-6Gxj4DuZ0p0upg07_E9N2t2Vbt-0U_ZmrwJ4eWclA8NFCEq1O7x7q41pC6vJ3Kyic2pGB8snun7ym4'],
    ['id' => 'weapon_ump45', 'name' => 'UMP-45', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4Ygq6TeSa9Wp9Wi1YvVA11vLg1R76v_fVQu16bJZitH4NjgldS0wK-ha-6Gxj4DuZ0p0upg07_E9N2t2Vbt-0U_ZmrwJ4eWclA8NFCEq1O7x7q41pC6vJ3Kyic2pGB8snun7ym4'],
    ['id' => 'weapon_p90', 'name' => 'P90', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4Ygq6TeSa9Wp9Wi1YvVA11vLg1R76v_fVQu16bJZitH4NjgldS0wK-ha-6Gxj4DuZ0p0upg07_E9N2t2Vbt-0U_ZmrwJ4eWclA8NFCEq1O7x7q41pC6vJ3Kyic2pGB8snun7ym4'],
    ['id' => 'weapon_bizon', 'name' => 'PP-Bizon', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4Ygq6TeSa9Wp9Wi1YvVA11vLg1R76v_fVQu16bJZitH4NjgldS0wK-ha-6Gxj4DuZ0p0upg07_E9N2t2Vbt-0U_ZmrwJ4eWclA8NFCEq1O7x7q41pC6vJ3Kyic2pGB8snun7ym4'],

    // --- ТЯЖЕЛОЕ ОРУЖИЕ ---
    ['id' => 'weapon_nova', 'name' => 'Nova', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4Ygq6TeSa9Wp9Wi1YvVA11vLg1R76v_fVQu16bJZitH4NjgldS0wK-ha-6Gxj4DuZ0p0upg07_E9N2t2Vbt-0U_ZmrwJ4eWclA8NFCEq1O7x7q41pC6vJ3Kyic2pGB8snun7ym4'],
    ['id' => 'weapon_xm1014', 'name' => 'XM1014', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4Ygq6TeSa9Wp9Wi1YvVA11vLg1R76v_fVQu16bJZitH4NjgldS0wK-ha-6Gxj4DuZ0p0upg07_E9N2t2Vbt-0U_ZmrwJ4eWclA8NFCEq1O7x7q41pC6vJ3Kyic2pGB8snun7ym4'],
    ['id' => 'weapon_sawedoff', 'name' => 'Sawed-Off', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4Ygq6TeSa9Wp9Wi1YvVA11vLg1R76v_fVQu16bJZitH4NjgldS0wK-ha-6Gxj4DuZ0p0upg07_E9N2t2Vbt-0U_ZmrwJ4eWclA8NFCEq1O7x7q41pC6vJ3Kyic2pGB8snun7ym4'],
    ['id' => 'weapon_mag7', 'name' => 'MAG-7', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4Ygq6TeSa9Wp9Wi1YvVA11vLg1R76v_fVQu16bJZitH4NjgldS0wK-ha-6Gxj4DuZ0p0upg07_E9N2t2Vbt-0U_ZmrwJ4eWclA8NFCEq1O7x7q41pC6vJ3Kyic2pGB8snun7ym4'],
    ['id' => 'weapon_m249', 'name' => 'M249', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4Ygq6TeSa9Wp9Wi1YvVA11vLg1R76v_fVQu16bJZitH4NjgldS0wK-ha-6Gxj4DuZ0p0upg07_E9N2t2Vbt-0U_ZmrwJ4eWclA8NFCEq1O7x7q41pC6vJ3Kyic2pGB8snun7ym4'],
    ['id' => 'weapon_negev', 'name' => 'Negev', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4Ygq6TeSa9Wp9Wi1YvVA11vLg1R76v_fVQu16bJZitH4NjgldS0wK-ha-6Gxj4DuZ0p0upg07_E9N2t2Vbt-0U_ZmrwJ4eWclA8NFCEq1O7x7q41pC6vJ3Kyic2pGB8snun7ym4'],

    // --- ВИНТОВКИ ---
    ['id' => 'weapon_ak47', 'name' => 'AK-47', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4Ygq6TeSa9Wp9Wi1YvVA11vLg1R76v_fVQu16bJYz8TvN2jxoO0w6AtY-uGkz4DsZ0p37-S8Imn2wXg-hVvY2v1dYfGclI7YAnUrle8xb-x18S_7snXWw2XGg'],
    ['id' => 'weapon_m4a1_silencer', 'name' => 'M4A1-S', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4Ygq6TeSa9Wp9Wi1YvVA11vLg1R76v_fVQu16bJZitH4NjgldS0wK-ha-6Gxj4DuZ0p0upg07_E9N2t2Vbt-0U_ZmrwJ4eWclA8NFCEq1O7x7q41pC6vJ3Kyic2pGB8snun7ym4'],
    ['id' => 'weapon_m4a1', 'name' => 'M4A4', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4Ygq6TeSa9Wp9Wi1YvVA11vLg1R76v_fVQu16bJZitH4NjgldS0wK-ha-6Gxj4DuZ0p0upg07_E9N2t2Vbt-0U_ZmrwJ4eWclA8NFCEq1O7x7q41pC6vJ3Kyic2pGB8snun7ym4'],
    ['id' => 'weapon_awp', 'name' => 'AWP', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4Ygq6TeSa9Wp9Wi1YvVA11vLg1R76v_fVQu16bJYz8TvN2kk7-Hnvb6I7icXp6lwb9X7MBy0b6Wp4_x2gbs8hVyY2DycYfGcFRqN1vS8wW418S-g8efuM6Yn3EwuXY8pSGKJAn9_G4'],
    ['id' => 'weapon_galilar', 'name' => 'Galil AR', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4Ygq6TeSa9Wp9Wi1YvVA11vLg1R76v_fVQu16bJZitH4NjgldS0wK-ha-6Gxj4DuZ0p0upg07_E9N2t2Vbt-0U_ZmrwJ4eWclA8NFCEq1O7x7q41pC6vJ3Kyic2pGB8snun7ym4'],
    ['id' => 'weapon_famas', 'name' => 'FAMAS', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4Ygq6TeSa9Wp9Wi1YvVA11vLg1R76v_fVQu16bJZitH4NjgldS0wK-ha-6Gxj4DuZ0p0upg07_E9N2t2Vbt-0U_ZmrwJ4eWclA8NFCEq1O7x7q41pC6vJ3Kyic2pGB8snun7ym4'],
    ['id' => 'weapon_ssg08', 'name' => 'SSG 08', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4Ygq6TeSa9Wp9Wi1YvVA11vLg1R76v_fVQu16bJZitH4NjgldS0wK-ha-6Gxj4DuZ0p0upg07_E9N2t2Vbt-0U_ZmrwJ4eWclA8NFCEq1O7x7q41pC6vJ3Kyic2pGB8snun7ym4'],
    ['id' => 'weapon_sg556', 'name' => 'SG 553', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4Ygq6TeSa9Wp9Wi1YvVA11vLg1R76v_fVQu16bJZitH4NjgldS0wK-ha-6Gxj4DuZ0p0upg07_E9N2t2Vbt-0U_ZmrwJ4eWclA8NFCEq1O7x7q41pC6vJ3Kyic2pGB8snun7ym4'],
    ['id' => 'weapon_aug', 'name' => 'AUG', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4Ygq6TeSa9Wp9Wi1YvVA11vLg1R76v_fVQu16bJZitH4NjgldS0wK-ha-6Gxj4DuZ0p0upg07_E9N2t2Vbt-0U_ZmrwJ4eWclA8NFCEq1O7x7q41pC6vJ3Kyic2pGB8snun7ym4'],
    ['id' => 'weapon_g3sg1', 'name' => 'G3SG1', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4Ygq6TeSa9Wp9Wi1YvVA11vLg1R76v_fVQu16bJZitH4NjgldS0wK-ha-6Gxj4DuZ0p0upg07_E9N2t2Vbt-0U_ZmrwJ4eWclA8NFCEq1O7x7q41pC6vJ3Kyic2pGB8snun7ym4'],
    ['id' => 'weapon_scar20', 'name' => 'SCAR-20', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4Ygq6TeSa9Wp9Wi1YvVA11vLg1R76v_fVQu16bJZitH4NjgldS0wK-ha-6Gxj4DuZ0p0upg07_E9N2t2Vbt-0U_ZmrwJ4eWclA8NFCEq1O7x7q41pC6vJ3Kyic2pGB8snun7ym4'],

    // --- ВСЕ НОЖИ (Knives) ---
    ['id' => 'weapon_knife_karambit', 'name' => 'Керамбит', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXU5A1PIYQh5hlcX0nV9uB_1PSbHFl6fVpWs7urvDlh0vGfIDNDvN_lw9bYwKOmZuuIzmoGv8Ym2b7E9tSg2wXg_0A_Z2j3co-QcgQ7M1mF_Fi-k7voh5C9tMzMzXQy6XUl7WGdwUFiSg7d'],
    ['id' => 'weapon_knife_m9_bayonet', 'name' => 'M9 Bayonet', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXU5A1PIYQh5hlcX0nV9uB_1PSbHFl6fVpWs7urvDlh0vGfIDNDvOOmw9bYwKOmZuKIwzgDvsYm3b6Y99Sk3gXg_0A_Z2j3co_GcAU9N1mF_Fi-k7voh5C9tMzMzXQy6XUl7WGdwUFi6M5D'],
    ['id' => 'weapon_knife_butterfly', 'name' => 'Нож-бабочка', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXU5A1PIYQh5hlcX0nV9uB_1PSbHFl6fVpWs7urvDlh0vGfIDNDvN_mldbYwKOmZuOIwzgDvsYm3b6Y99Sk3gXg_0A_Z2j3co_GcAU9N1mF_Fi-k7voh5C9tMzMzXQy6XUl7WGdwUFiR0Hq'],
    ['id' => 'weapon_knife_outdoor', 'name' => 'Нож «Nomad»', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXU5A1PIYQh5hlcX0nV9uB_1PSbHFl6fVpWs7urvDlh0vGfIDNDvN3mw9bYwKOmZuKIwzgGvMEm3b6Y99Sk3gXg_0A_Z2j3co_GcgE9N1mF_Fi-k7voh5C9tMzMzXQy6XUl7WGdwUFiQ_Zf'],
    ['id' => 'weapon_knife_skeleton', 'name' => 'Скелетный нож', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXU5A1PIYQh5hlcX0nV9uB_1PSbHFl6fVpWs7urvDlh0vGfIDNDvN_mw9bYwKOmZuKIlz9XvMEm3b6Y99Sk3gXg_0A_Z2j3co_GcQE9N1mF_Fi-k7voh5C9tMzMzXQy6XUl7WGdwUFiS3Fv'],
    ['id' => 'weapon_knife_kukri', 'name' => 'Кукри', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXU5A1PIYQh5hlcX0nV9uB_1PSbHFl6fVpWs7urvDlh0vGfIDNDvN3lw9bYwKOmZuKIwzgEvcAm3b6Y99Sk3gXg_0A_Z2j3co_GcgQ9N1mF_Fi-k7voh5C9tMzMzXQy6XUl7WGdwUFiS0lO'],
    ['id' => 'weapon_knife_bayonet', 'name' => 'Штык-нож (Bayonet)', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXU5A1PIYQh5hlcX0nV9uB_1PSbHFl6fVpWs7urvDlh0vGfIDNDvOOmw9bYwKOmZuKIwzgDvsYm3b6Y99Sk3gXg_0A_Z2j3co_GcAU9N1mF_Fi-k7voh5C9tMzMzXQy6XUl7WGdwUFi6M5D'],
    ['id' => 'weapon_knife_flip', 'name' => 'Складной нож (Flip)', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXU5A1PIYQh5hlcX0nV9uB_1PSbHFl6fVpWs7urvDlh0vGfIDNDvOOmw9bYwKOmZuKIwzgDvsYm3b6Y99Sk3gXg_0A_Z2j3co_GcAU9N1mF_Fi-k7voh5C9tMzMzXQy6XUl7WGdwUFi6M5D'],
    ['id' => 'weapon_knife_gut', 'name' => 'Нож с лезвием-крюком', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXU5A1PIYQh5hlcX0nV9uB_1PSbHFl6fVpWs7urvDlh0vGfIDNDvOOmw9bYwKOmZuKIwzgDvsYm3b6Y99Sk3gXg_0A_Z2j3co_GcAU9N1mF_Fi-k7voh5C9tMzMzXQy6XUl7WGdwUFi6M5D'],
    ['id' => 'weapon_knife_huntsman', 'name' => 'Охотничий нож', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXU5A1PIYQh5hlcX0nV9uB_1PSbHFl6fVpWs7urvDlh0vGfIDNDvOOmw9bYwKOmZuKIwzgDvsYm3b6Y99Sk3gXg_0A_Z2j3co_GcAU9N1mF_Fi-k7voh5C9tMzMzXQy6XUl7WGdwUFi6M5D'],
    ['id' => 'weapon_knife_falchion', 'name' => 'Фальшион', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXU5A1PIYQh5hlcX0nV9uB_1PSbHFl6fVpWs7urvDlh0vGfIDNDvOOmw9bYwKOmZuKIwzgDvsYm3b6Y99Sk3gXg_0A_Z2j3co_GcAU9N1mF_Fi-k7voh5C9tMzMzXQy6XUl7WGdwUFi6M5D'],
    ['id' => 'weapon_knife_bowie', 'name' => 'Нож Боуи', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXU5A1PIYQh5hlcX0nV9uB_1PSbHFl6fVpWs7urvDlh0vGfIDNDvOOmw9bYwKOmZuKIwzgDvsYm3b6Y99Sk3gXg_0A_Z2j3co_GcAU9N1mF_Fi-k7voh5C9tMzMzXQy6XUl7WGdwUFi6M5D'],
    ['id' => 'weapon_knife_stiletto', 'name' => 'Стилет', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXU5A1PIYQh5hlcX0nV9uB_1PSbHFl6fVpWs7urvDlh0vGfIDNDvOOmw9bYwKOmZuKIwzgDvsYm3b6Y99Sk3gXg_0A_Z2j3co_GcAU9N1mF_Fi-k7voh5C9tMzMzXQy6XUl7WGdwUFi6M5D'],
    ['id' => 'weapon_knife_widowmaker', 'name' => 'Нож «Talon»', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXU5A1PIYQh5hlcX0nV9uB_1PSbHFl6fVpWs7urvDlh0vGfIDNDvOOmw9bYwKOmZuKIwzgDvsYm3b6Y99Sk3gXg_0A_Z2j3co_GcAU9N1mF_Fi-k7voh5C9tMzMzXQy6XUl7WGdwUFi6M5D'],
    ['id' => 'weapon_knife_ursus', 'name' => 'Нож «Ursus»', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXU5A1PIYQh5hlcX0nV9uB_1PSbHFl6fVpWs7urvDlh0vGfIDNDvOOmw9bYwKOmZuKIwzgDvsYm3b6Y99Sk3gXg_0A_Z2j3co_GcAU9N1mF_Fi-k7voh5C9tMzMzXQy6XUl7WGdwUFi6M5D'],
    ['id' => 'weapon_knife_cord', 'name' => 'Нож «Paracord»', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXU5A1PIYQh5hlcX0nV9uB_1PSbHFl6fVpWs7urvDlh0vGfIDNDvOOmw9bYwKOmZuKIwzgDvsYm3b6Y99Sk3gXg_0A_Z2j3co_GcAU9N1mF_Fi-k7voh5C9tMzMzXQy6XUl7WGdwUFi6M5D'],
    ['id' => 'weapon_knife_canis', 'name' => 'Нож «Survival»', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXU5A1PIYQh5hlcX0nV9uB_1PSbHFl6fVpWs7urvDlh0vGfIDNDvOOmw9bYwKOmZuKIwzgDvsYm3b6Y99Sk3gXg_0A_Z2j3co_GcAU9N1mF_Fi-k7voh5C9tMzMzXQy6XUl7WGdwUFi6M5D'],

    // --- ПЕРЧАТКИ (Gloves) ---
    ['id' => 'gloves_sporty', 'name' => 'Спортивные перчатки', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXU5A1PIYQh5hlcX0nV9uB_1PSbHFl6fVpWs7urvDlh0vGfIDNDvNimw9bYwKOmZuKIlz9XvMEm3b6Y99Sk3gXg_0A_Z2j3co_GcQE9N1mF_Fi-k7voh5C9tMzMzXQy6XUl7WGdwUFiS3Fv'],
    ['id' => 'gloves_slick', 'name' => 'Водительские перчатки', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXU5A1PIYQh5hlcX0nV9uB_1PSbHFl6fVpWs7urvDlh0vGfIDNDvOOmw9bYwKOmZuKIwzgDvsYm3b6Y99Sk3gXg_0A_Z2j3co_GcAU9N1mF_Fi-k7voh5C9tMzMzXQy6XUl7WGdwUFi6M5D'],
    ['id' => 'gloves_leather_wrap', 'name' => 'Обмотки рук', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXU5A1PIYQh5hlcX0nV9uB_1PSbHFl6fVpWs7urvDlh0vGfIDNDvOOmw9bYwKOmZuKIwzgDvsYm3b6Y99Sk3gXg_0A_Z2j3co_GcAU9N1mF_Fi-k7voh5C9tMzMzXQy6XUl7WGdwUFi6M5D'],
    ['id' => 'gloves_motorcycle', 'name' => 'Мотоциклетные перчатки', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXU5A1PIYQh5hlcX0nV9uB_1PSbHFl6fVpWs7urvDlh0vGfIDNDvOOmw9bYwKOmZuKIwzgDvsYm3b6Y99Sk3gXg_0A_Z2j3co_GcAU9N1mF_Fi-k7voh5C9tMzMzXQy6XUl7WGdwUFi6M5D'],
    ['id' => 'gloves_specialist', 'name' => 'Перчатки специалистов', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXU5A1PIYQh5hlcX0nV9uB_1PSbHFl6fVpWs7urvDlh0vGfIDNDvOOmw9bYwKOmZuKIwzgDvsYm3b6Y99Sk3gXg_0A_Z2j3co_GcAU9N1mF_Fi-k7voh5C9tMzMzXQy6XUl7WGdwUFi6M5D'],

    // --- АГЕНТЫ (Agents) ---
    ['id' => 'agent_ct_sir', 'name' => 'Сэр «Черничный» Максимус', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXU5A1PIYQh5hlcX0nV9uB_1PSbHFl6fVpWs7urvDlh0vGfIDNDvN_mw9bYwKOmZuKIlz9XvMEm3b6Y99Sk3gXg_0A_Z2j3co_GcQE9N1mF_Fi-k7voh5C9tMzMzXQy6XUl7WGdwUFiS3Fv'],
    ['id' => 'agent_t_leet', 'name' => 'Элитный мистер Мухлик', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXU5A1PIYQh5hlcX0nV9uB_1PSbHFl6fVpWs7urvDlh0vGfIDNDvOOmw9bYwKOmZuKIwzgDvsYm3b6Y99Sk3gXg_0A_Z2j3co_GcAU9N1mF_Fi-k7voh5C9tMzMzXQy6XUl7WGdwUFi6M5D'],
    ['id' => 'agent_ct_seal', 'name' => '«Дважды» Маккой | SAS', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXU5A1PIYQh5hlcX0nV9uB_1PSbHFl6fVpWs7urvDlh0vGfIDNDvOOmw9bYwKOmZuKIwzgDvsYm3b6Y99Sk3gXg_0A_Z2j3co_GcAU9N1mF_Fi-k7voh5C9tMzMzXQy6XUl7WGdwUFi6M5D']
];

// Получаем текущие установленные скины игрока из таблицы wp_player_skins
$current_skins = [];
try {
    $stmt = $pdo->prepare("SELECT weapon_defindex, paint_index, seed, wear FROM wp_player_skins WHERE steamid = ?");
    $stmt->execute([$steamid]);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $current_skins[$row['weapon_defindex']] = $row;
    }
} catch (PDOException $e) {
    // Если скрипт упадет, выведем ошибку красиво
    $db_error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>CS2 PRIVATE PAINTS PANEL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #0f172a; color: #f8fafc; font-family: sans-serif; }
        .card-custom { background-color: #1e293b; border: 1px solid #334155; border-radius: 12px; transition: transform 0.2s; }
        .card-custom:hover { transform: translateY(-4px); }
        .btn-primary-custom { background-color: #0ea5e9; border: none; }
        .btn-primary-custom:hover { background-color: #0284c7; }
        .weapon-img { max-height: 120px; object-fit: contain; }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1 class="h2 text-info fw-bold">🔥 CS2 PRIVATE PAINTS</h1>
        <span class="badge bg-secondary p-2">SteamID: <?php echo htmlspecialchars($steamid); ?></span>
    </div>

    <?php if (isset($db_error)): ?>
        <div class="alert alert-danger">⚠️ Ошибка Базы Данных: <?php echo htmlspecialchars($db_error); ?></div>
    <?php endif; ?>

    <div class="mb-4">
        <input type="text" id="search" class="form-control bg-dark text-white border-secondary" placeholder="Поиск оружия, ножей или агентов...">
    </div>

    <div class="row g-4" id="weapon-list">
        <?php foreach ($weapons as $w): 
            $w_id = $w['id'];
            $current = isset($current_skins[$w_id]) ? $current_skins[$w_id] : null;
        ?>
            <div class="col-md-4 weapon-item" data-name="<?php echo strtolower($w['name']); ?>">
                <div class="card card-custom h-100 p-3 d-flex flex-column justify-content-between">
                    <div class="text-center mb-3">
                        <small class="text-muted d-block text-uppercase mb-1"><?php echo htmlspecialchars($w['id']); ?></small>
                        <h5 class="fw-bold text-white mb-3"><?php echo htmlspecialchars($w['name']); ?></h5>
                        <img src="<?php echo $w['img']; ?>" class="img-fluid weapon-img" alt="<?php echo $w['name']; ?>">
                    </div>

                    <form class="skin-form">
                        <input type="hidden" name="weapon_id" value="<?php echo htmlspecialchars($w['id']); ?>">
                        
                        <div class="row g-2 mb-2">
                            <div class="col-6">
                                <label class="small text-muted">ID Скина (Paint)</label>
                                <input type="number" name="paint_index" class="form-control form-control-sm bg-dark text-white border-secondary" placeholder="Напр. 415" value="<?php echo $current ? $current['paint_index'] : ''; ?>">
                            </div>
                            <div class="col-6">
                                <label class="small text-muted">Seed (Паттерн)</label>
                                <input type="number" name="seed" class="form-control form-control-sm bg-dark text-white border-secondary" placeholder="0-1000" value="<?php echo $current ? $current['seed'] : ''; ?>">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="small text-muted">Wear (Износ)</label>
                            <input type="text" name="wear" class="form-control form-control-sm bg-dark text-white border-secondary" placeholder="0.00" value="<?php echo $current ? $current['wear'] : '0.00'; ?>">
                        </div>

                        <button type="submit" class="btn btn-sm btn-primary-custom w-100 text-white fw-bold">Применить скин</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
// Быстрый живой поиск по названию предметов
document.getElementById('search').addEventListener('input', function(e) {
    let query = e.target.value.toLowerCase();
    document.querySelectorAll('.weapon-item').forEach(item => {
        let name = item.getAttribute('data-name');
        if (name.includes(query)) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
});

// Аякс отправка изменений скинов
document.querySelectorAll('.skin-form').forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        
        fetch('update_skin.php', {
            method: 'POST',
            body: formData
        })
        .then(res => res.text())
        .then(data => {
            alert('Скин успешно обновлен! Перезайдите в игру или пропишите !ws');
        })
        .catch(err => alert('Ошибка при сохранении!'));
    });
});
</script>
</body>
</html>