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
            colors: {
                white:'#ffffff',
                navy: '#1a1f36',
                babyblue: '#91BFE1',
                grayblue:'#929EA8',
                orange:'#E1A334',
                orangeblue:'DAB06C',
                blue:'#0C283A',
                gray: {
                    light: '#f5f5f5',
                    DEFAULT: '#d1d5db',
                    dark: '#4b5563',
                },
                black: '#000000',
            },
        },
    },

    plugins: [forms],
};
