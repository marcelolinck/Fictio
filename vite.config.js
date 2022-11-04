import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: 'Modules/Site/Resources/assets/js/app.jsx',
            ssr: 'Modules/Site/Resources/assets/js/ssr.jsx',
            refresh: true,
        }),
        react(),
    ],
    build:{
        rollupOptions: {
            output: {
                /* entryFileNames: 'assets/main/[name].js',    */
                /* chunkFileNames: 'assets/chunks/[name].js', */
                assetFileNames: 'assets/resources/[name].[ext]',
                manualChunks(id) {
                    if (id.includes('Index.css')) {
                        return 'indexChunkCSS';
                    }
                    if (id.includes('Index.js')) {
                        return 'indexChunkJS';
                    }
                    if (id.includes('Index')) {
                        return 'indexChunkMisc';
                    }
                },
            }

        },
        
    },
    ssr: {
        noExternal: ['@inertiajs/server'],
    },
});
