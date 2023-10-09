import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        // './resources/views/**/*.blade.php',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./resources/**/*.jsx",
        "./resources/**/*.php",
        "./resources/**/*.html",
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        forms,
        require('flowbite/plugin'),
        function({ addUtilities }) {
            const newUtilities = {
                '.scrollbar-hide': {
                'scrollbar-width': 'none', /* Firefox */
                '-ms-overflow-style': 'none', /* Internet Explorer 10+ */
                }
            }
            addUtilities(newUtilities);
        }
    ],
};
