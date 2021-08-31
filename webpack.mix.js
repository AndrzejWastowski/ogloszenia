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
    'resources/js/jquery-3.6.0.min.js',
    'resources/js/bootstrap.bundle.min.js',
],  'public/js/app.js')
    .react()  
    .sass('resources/sass/app.scss', 'public/css');


