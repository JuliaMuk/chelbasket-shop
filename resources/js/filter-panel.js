document.addEventListener("DOMContentLoaded", () => {

    const openBtn = document.querySelector('.filter-open-btn');
    const closeBtn = document.querySelector('#filterClose');
    const panel = document.querySelector('#filterPanel');
    const overlay = document.querySelector('#filterOverlay');

    if (!openBtn || !panel) return;

    openBtn.onclick = () => {
        panel.classList.add('active');
        overlay?.classList.add('active');
        document.body.style.overflow = "hidden";
    }

    const closePanel = () => {
        panel.classList.remove('active');
        overlay?.classList.remove('active');
        document.body.style.overflow = "";
    }

    closeBtn?.addEventListener('click', closePanel);
    overlay?.addEventListener('click', closePanel);

});