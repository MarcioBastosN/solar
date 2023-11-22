import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    presets: [
        require('./vendor/wireui/wireui/tailwind.config.js')
    ],
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js",
        './vendor/wireui/wireui/resources/**/*.blade.php',
        './vendor/wireui/wireui/ts/**/*.ts',
        './vendor/wireui/wireui/src/View/**/*.php'
    ],
    darkMode: 'media',
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                Oswald : ['Oswald']
            },
            colors: {
                // primary: '#040C16',
                primary: '#07121F',
                // primary_dark: '#1c2b49',

                // secondary: '#07121F',
                secondary: '#040C16',
                // secondary_dark: '#edd3c9',

                destaque:'#0082C9',
                destaque_dark:'#0082C9',

                primary_text: 'F5F5F5',
                primary_text_dark: '',

                dark_bg: '#000000',
                text_error: '#ff0000',

                form_color: '#dcf1ff',
                form_color_dark: '#fee2e2',

                // laranja  inicio FF792E  fim FF8F1C gradiente linear
                btn_color_inicio: '#FF792E',
                btn_color_fim: '#FF8F1C',

              },
        },
    },

    plugins: [
        forms,
        require('flowbite/plugin')],
};
