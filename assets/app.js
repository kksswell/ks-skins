// Живой поиск по карточкам оружия
document.getElementById('searchSkin')?.addEventListener('input', function(e) {
    const query = e.target.value.toLowerCase();
    document.querySelectorAll('.grid > div').forEach(card => {
        const title = card.querySelector('h3').textContent.toLowerCase();
        if(title.includes(query)) {
            card.style.display = 'flex';
        } else {
            card.style.display = 'none';
        }
    });
});

// Функция отправки скина в базу данных
function saveSkin(weaponId) {
    const inputs = document.querySelectorAll(`.skin-input[data-wpn="${weaponId}"]`);
    const data = new FormData();
    data.append('weapon', weaponId);

    inputs.forEach(input => {
        data.append(input.dataset.type, input.value);
    });

    fetch('update_skin.php', {
        method: 'POST',
        body: data
    })
    .then(res => res.json())
    .then(res => {
        if(res.success) {
            alert('Скин применен! Изменения вступят в силу при следующем раунде или перевыборе оружия.');
        } else {
            alert('Ошибка: ' + res.message);
        }
    })
    .catch(err => console.error('Ошибка:', err));
}