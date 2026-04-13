import './bootstrap';
import 'flowbite';

import './filter-panel';

import Alpine from 'alpinejs';
import mask from '@alpinejs/mask'

Alpine.plugin(mask)

window.Alpine = Alpine;

Alpine.start();

// Бургер-меню
document.addEventListener('DOMContentLoaded', () => {
    const burger = document.getElementById('burgerMenu');
    const menu = document.getElementById('headerMenu');
    const body = document.body;

    if (burger && menu) {
        burger.addEventListener('click', () => {
            burger.classList.toggle('active');
            menu.classList.toggle('active');
            body.style.overflow = menu.classList.contains('active') ? 'hidden' : '';
        });

        // Закрытие при клике на ссылку
        menu.querySelectorAll('.link').forEach(link => {
            link.addEventListener('click', () => {
                burger.classList.remove('active');
                menu.classList.remove('active');
                body.style.overflow = '';
            });
        });

        // Закрытие при клике вне меню
        document.addEventListener('click', (e) => {
            if (!menu.contains(e.target) && !burger.contains(e.target) && menu.classList.contains('active')) {
                burger.classList.remove('active');
                menu.classList.remove('active');
                body.style.overflow = '';
            }
        });
    }
});

