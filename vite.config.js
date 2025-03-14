import { defineConfig } from "vite";
//import laravel from 'laravel-vite-plugin';
import laravel, { refreshPaths } from "laravel-vite-plugin";

export default defineConfig({
    server: {
        cors: true,
    },
    plugins: [
        laravel({
            input: [
                "resources/css/filament/admin/theme.css",
                "resources/css/app.css",
                "resources/js/app.js",
            ],
            refresh: [
                ...refreshPaths,
                "app/Filament/**",
                "app/Forms/Components/**",
                "app/Livewire/**",
                "app/Infolists/Components/**",
                "app/Providers/Filament/**",
                "app/Tables/Columns/**",
            ],
        }),
    ],
});
