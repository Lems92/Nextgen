import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 40fc94a (Initial commit)
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
<<<<<<< HEAD
=======
            input: ['resources/css/app.css', 'resources/js/app.js'],
>>>>>>> master
=======
>>>>>>> 40fc94a (Initial commit)
            refresh: true,
        }),
    ],
});
