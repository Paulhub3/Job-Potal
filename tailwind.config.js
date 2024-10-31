import defaultTheme from 'tailwindcss/defaultTheme';

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
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            keyframes: {
                'fade-in-up': {
                  '0%': {
                    opacity: '0',
                    transform: 'translateY(20px)'
                  },
                  '100%': {
                    opacity: '1',
                    transform: 'translateY(0)'
                  },
                }
              },
              animation: {
                'fade-in-up': 'fade-in-up 0.5s ease-out'
              }
        },
    },
    plugins: [],
};
