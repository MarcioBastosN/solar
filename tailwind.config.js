import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    darkMode: 'media',
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            primary: '#006399',
            primary_dark: '#fee2e2',

            secondary: '#fee2e2',
            secondary_dark: '#006399',

            destaque:'#0082C9',
            destaque_dark:'#0082C9',

            primary_text: '',
            primary_text_dark: '',

            dark_bg: '#000000',
            text_error: '#ff0000',

            form_color: '#dcf1ff',
            form_color_dark: '#fee2e2',

            _primary: {
              50: '#dcf1ff',
              100: '#ccedff',
              200: '#99dbff',
              300: '#66c9ff',
              400: '#1aafff',
              500: '#0095e6',
              600: '#0082C9',
              700: '#0074b3',
              800: '#006399',
              900: '#005380',
              DEFAULT: '#0082C9',
            },
          },
    },

    plugins: [forms],
};
