/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
        './resources/js/**/*.vue',
    ],
    theme: {
        extend: {
            colors: {
                sky: {
                    primary: '#38BDF8',
                    light: '#BAE6FD',
                    dark: '#0284C7',
                },
                navy: {
                    DEFAULT: '#0F172A',
                    light: '#1E293B',
                    dark: '#020617',
                }
            },
            fontFamily: {
                sans: ['Inter', 'sans-serif'],
                hindi: ['Mukta', 'sans-serif'],
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
};
