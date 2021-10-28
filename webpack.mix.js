const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.styles('resources/css/reset.css', 'public/css/reset.css');
mix.sass('resources/sass/main.scss', 'public/css')
    .sass('resources/sass/media.scss', 'public/css');
mix.js('resources/js/main.js', 'public/js');
