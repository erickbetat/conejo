import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Outfit', ...defaultTheme.fontFamily.sans],
                racing: ['Teko', 'sans-serif'],
            },
            colors: {
                brand: {
                    black: '#0f0f11',
                    dark: '#1a1a1d',
                    red: '#e62020',
                    'red-hover': '#ff3333',
                    gray: '#888888',
                }
            }
        },
    },
    plugins: [forms],
};
