<?php
require_once 'class/config.php';

// Если нажали "Выйти"
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}

// Заглушка списка оружия и скинов (для примера, можно расширять)
$weapons = [
    ['id' => 'weapon_ak47', 'name' => 'AK-47', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4Ygq6TeSa9Wp9Wi1YvVA11vLg1R76v_fVQu16bJYz8TvN2jxoO0w6AtY-uGkz4DsZ0p37-S8Imn2wXg-hVvY2v1dYfGclI7YAnUrle8xb-x18S_7snXWw2XGg'],
    ['id' => 'weapon_m4a1_silencer', 'name' => 'M4A1-S', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4Ygq6TeSa9Wp9Wi1YvVA11vLg1R76v_fVQu16bJZitH4NjgldS0wK-ha-6Gxj4DuZ0p0upg07_E9N2t2Vbt-0U_ZmrwJ4eWclA8NFCEq1O7x7q41pC6vJ3Kyic2pGB8snun7ym4'],
    ['id' => 'weapon_awp', 'name' => 'AWP', 'img' => 'https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4Ygq6TeSa9Wp9Wi1YvVA11vLg1R76v_fVQu16bJYz8TvN2kk7-Hnvb6I7icXp6lwb9X7MBy0b6Wp4_x2gbs8hVyY2DycYfGcFRqN1vS8wW418S-g8efuM6Yn3EwuXY8pSGKJAn9_G4']
];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CS2 Weapon Paints Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-slate-100 font-sans min-h-screen">

    <header class="bg-slate-800 border-b border-slate-700 px-6 py-4 flex justify-between items-center">
        <h1 class="text-xl font-bold tracking-wider text-cyan-400">🔥 CS2 PRIVATE PAINTS</h1>
        
        <div>
            <?php if(!isset($_SESSION['steamid'])): ?>
                <a href="login.php" class="bg-emerald-600 hover:bg-emerald-500 text-white font-semibold px-4 py-2 rounded shadow transition">
                    Войти через Steam
                </a>
            <?php else: ?>
                <div class="flex items-center gap-4">
                    <img src="<?=$_SESSION['avatar']?>" class="w-10 h-10 rounded-full border-2 border-cyan-400" alt="Avatar">
                    <div>
                        <p class="text-sm font-medium"><?=htmlspecialchars($_SESSION['username'])?></p>
                        <a href="?logout=1" class="text-xs text-rose-400 hover:underline">Выйти</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </header>

    <main class="max-w-7xl mx-auto p-6">
        <?php if(!isset($_SESSION['steamid'])): ?>
            <div class="text-center py-20 bg-slate-800/50 rounded-2xl border border-slate-700/50 max-w-lg mx-auto mt-12">
                <h2 class="text-2xl font-bold mb-4">Добро пожаловать!</h2>
                <p class="text-slate-400 mb-6 px-6">Авторизуйтесь через Steam, чтобы настроить индивидуальные скины и ножи на нашем приватном сервере.</p>
                <a href="login.php" class="inline-block bg-cyan-600 hover:bg-cyan-500 text-white font-bold px-8 py-3 rounded-xl transition shadow-lg shadow-cyan-900/30">
                    Начать настройку
                </a>
            </div>
        <?php else: ?>
            
            <div class="mb-6">
                <input type="text" id="searchSkin" placeholder="Поиск оружия..." class="w-full max-w-sm bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-sm text-slate-200 placeholder-slate-500 focus:outline-none focus:border-cyan-500 transition">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <?php foreach($weapons as $wpn): ?>
                    <div class="bg-slate-800 border border-slate-700 rounded-xl p-4 flex flex-col justify-between hover:border-slate-600 transition group">
                        <div class="text-center mb-3">
                            <span class="text-xs text-slate-500 tracking-widest block uppercase mb-1"><?=$wpn['id']?></span>
                            <h3 class="font-bold text-lg text-slate-200 group-hover:text-cyan-400 transition"><?=$wpn['name']?></h3>
                        </div>
                        
                        <div class="h-32 flex items-center justify-center my-2">
                            <img src="<?=$wpn['img']?>" class="max-h-full max-w-full transform group-hover:scale-105 transition" alt="<?=$wpn['name']?>">
                        </div>

                        <div class="space-y-2 mt-4 pt-4 border-t border-slate-700/50">
                            <div>
                                <label class="block text-xs text-slate-400 mb-1">ID Краски (Paint Index)</label>
                                <input type="number" data-wpn="<?=$wpn['id']?>" data-type="paint" placeholder="Напр: 415" class="skin-input w-full bg-slate-900 border border-slate-700 rounded p-1.5 text-xs text-center">
                            </div>
                            <div class="grid grid-cols-2 gap-2">
                                <div>
                                    <label class="block text-xs text-slate-400 mb-1">Seed</label>
                                    <input type="number" data-wpn="<?=$wpn['id']?>" data-type="seed" placeholder="0-1000" class="skin-input w-full bg-slate-900 border border-slate-700 rounded p-1.5 text-xs text-center">
                                </div>
                                <div>
                                    <label class="block text-xs text-slate-400 mb-1">Wear (Износ)</label>
                                    <input type="number" step="0.01" min="0" max="1" data-wpn="<?=$wpn['id']?>" data-type="wear" placeholder="0.00" class="skin-input w-full bg-slate-900 border border-slate-700 rounded p-1.5 text-xs text-center">
                                </div>
                            </div>
                            <button onclick="saveSkin('<?=$wpn['id']?>')" class="w-full mt-2 bg-cyan-600 hover:bg-cyan-500 text-xs font-bold py-2 rounded text-center transition">
                                Применить скин
                            </button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </main>

    <script src="assets/app.js"></script>
</body>
</html>