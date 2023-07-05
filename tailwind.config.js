import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            primary: {
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
            secondary: '#fee2e2',
          },
    },

    plugins: [forms],
};
