// vite.config.js
import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [vue()],
    root: 'resources', // Make sure the root is set to 'resources' folder
    resolve: {
        alias: {
            '@': '/resources/js', // Use @ to alias the js directory
        },
    },
    server: {
        port: 5173, // Vite's default port
    },
});
