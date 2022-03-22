const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/base/multi/auth/login.js', 'public/assets/app/js/multi/auth/login.js')
    .js('resources/js/base/multi/auth/register.js', 'public/assets/app/js/multi/auth/register.js')
    .js('resources/js/base/multi/auth/verify.js', 'public/assets/app/js/multi/auth/verify.js')
    .js('resources/js/base/multi/auth/forgetPassword.js', 'public/assets/app/js/multi/auth/forgetPassword.js')
    .js('resources/js/base/multi/auth/passwordReset.js', 'public/assets/app/js/multi/auth/passwordReset.js')
    .js('resources/js/base/multi/front/home.js', 'public/assets/app/js/multi/front/home.js')
    .js('resources/js/base/spa/app.js', 'public/assets/app/js/spa/app.js')
    .vue()
    .sass('resources/assets/sass/app.scss', 'public/assets/app/css/app.css');
