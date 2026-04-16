import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/css/basket.css', 'resources/js/basket.js','resources/css/buy.css', 'resources/css/card.css','resources/css/cards.css','resources/css/balls.css','resources/css/overlay.css','resources/css/catalog.css','resources/css/header-footer.css','resources/css/search.css'],
            refresh: true,
        }),
    ],
});
