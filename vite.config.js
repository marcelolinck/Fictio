import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: 'Modules/Site/Resources/assets/js/app.jsx',
            //ssr: 'resources/js/ssr.jsx',
            //mexer no SSR depois
            refresh: true,
        }),
        react(),
    ],
    ssr: {
        noExternal: ['@inertiajs/server'],
    },
});
