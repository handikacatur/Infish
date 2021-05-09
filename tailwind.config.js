const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms')],

    theme: {
        extend: {
         width: {
           '1/7': '14.2857143%',
           '2/7': '28.5714286%',
           '3/7': '42.8571429%',
           '4/7': '57.1428571%',
           '5/7': '71.4285714%',
           '6/7': '85.7142857%',
         }
        }
      }
};
