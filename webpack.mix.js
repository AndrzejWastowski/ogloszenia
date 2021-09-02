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

 mix.js([
    'resources/js/app.js',
    'resources/js/bootstrap.js',    
],  'public/assets/js/app.js')
    .react()  
    .sass('resources/sass/app.scss', 'public/assets/css');

mix.js([
        'resources/js/wow.min.js',
    ],  'public/assets/js/wow.min.js')



