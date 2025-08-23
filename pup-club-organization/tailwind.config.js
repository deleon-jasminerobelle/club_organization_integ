/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                maroon: '#800000',
                gold: '#FFD700',
            },
        },
    },
    plugins: [],
}
