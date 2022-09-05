import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input:
            ['Modules/Site/Resources/assets/js/app.jsx',
            ],
            refresh: true,
        }),
        react(),
    ],
});
