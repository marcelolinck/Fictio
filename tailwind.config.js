const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './resources/views/**/*.blade.php',
        './Modules/Site/Resources/assets/js/**/*.{jsx,js,tsx,ts}',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            screens:{
                "-2xl": {max:"1536px"},
                "-xl": {max:"1280px"},
                "-lg": {max:"1024px"},
                "-md": {max:"768px"},
                "-sm": {max:"640px"},
                "-xs": {max:"480px"},
            }

        },
    },

    plugins: [],
};
