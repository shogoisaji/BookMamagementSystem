import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    envPrefix: 'VITE_',

    build: {
    minify: 'terser',
    terserOptions: {
        compress: {
        drop_console: true,
        }
    },

    rollupOptions: {
        onwarn: (warning) => {
        console.error(warning.message);
        }
    }
    }
});
