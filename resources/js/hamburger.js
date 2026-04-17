const btn     = document.getElementById('hamb_btn');
const nav     = document.getElementById('acc_wrapper');
const overlay = document.querySelector('.overlay');

function toggleMenu(force) {
    const active = typeof force === 'boolean'
        ? force
        : !btn.classList.contains('active');

    btn.classList.toggle('active', active);
    nav.classList.toggle('open', active);
    overlay.classList.toggle('show', active);
    btn.setAttribute('aria-expanded', String(active));
    btn.setAttribute('aria-label', active ? 'メニューを閉じる' : 'メニューを開く');
}

document.addEventListener('click', (e) => {
    if (e.target.closest('#hamb_btn')) toggleMenu();
    else if (e.target.classList.contains('overlay')) toggleMenu(false);
});

// Escキーでメニューを閉じる（アクセシビリティ向上）
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && btn.classList.contains('active')) {
        toggleMenu(false);
        btn.focus();
    }
});