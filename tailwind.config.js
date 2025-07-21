import defaultTheme from "tailwindcss/defaultTheme";


/** @type {import('tailwindcss').Config} */
const config = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./src/*.html",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Quicksand", ...defaultTheme.fontFamily.sans],
                inter: ["Inter", ...defaultTheme.fontFamily.sans],
            },
            animation: {
                scrollDown: "scrollDown 8s linear infinite",
                scrollUp: "scrollUp 8s linear infinite",
            },
            keyframes: {
                scrollDown: {
                    "0%": { transform: "translateY(0%)" },
                    "100%": { transform: "translateY(-50%)" },
                },
                scrollUp: {
                    "0%": { transform: "translateY(-50%)" },
                    "100%": { transform: "translateY(0%)" },
                },
            },
        },
    },
    plugins: [
    ],
    
};

export default config;
