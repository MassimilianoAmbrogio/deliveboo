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

mix.js('resources/js/filter_restaurant.js', 'public/js/filter_restaurant.js')
    .js('resources/js/cart.js', 'public/js/cart.js')
    .js('resources/js/stats.js', 'public/js/stats.js')
    .js('resources/js/sidebar.js', 'public/js/sidebar.js')
    .js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .options({
        processCssUrls: false,
    });
