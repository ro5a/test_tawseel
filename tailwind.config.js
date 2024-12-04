import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    theme: {
        fontFamily: {
            primary: "Cairo",
            body: "Cairo",
            secondary: "Montserrat"
        },
        container: {
            padding: {
                DEFAULT: "1rem",
                lg: "4rem",
            },
        },
        extend: {
            colors: {
                paragraph: "#113F59",
            },
        },
    },

    plugins: [forms],
};
