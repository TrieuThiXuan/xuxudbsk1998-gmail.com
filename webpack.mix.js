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

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .sass('resources/sass/index.scss', 'public/css')
   .sass('resources/sass/admin_index.scss', 'public/css')
    .js('resources/js/slick.min.js', 'public/js')
mix.scripts([
    'resources/js/jquery-3.5.1.min.js'
], 'public/js/jquery-3.5.1.min.js');
