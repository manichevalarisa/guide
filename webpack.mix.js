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

Config.publicPath = 'public';

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    /* CSS */
    .sass('resources/sass/main.scss', 'public/css/dashmix.css')
    .sass('resources/sass/dashmix/themes/xeco.scss', 'public/css/themes/')
    .sass('resources/sass/dashmix/themes/xinspire.scss', 'public/css/themes/')
    .sass('resources/sass/dashmix/themes/xmodern.scss', 'public/css/themes/')
    .sass('resources/sass/dashmix/themes/xsmooth.scss', 'public/css/themes/')
    .sass('resources/sass/dashmix/themes/xwork.scss', 'public/css/themes/')
    .sass('resources/sass/dashmix/themes/xdream.scss', 'public/css/themes/')
    .sass('resources/sass/dashmix/themes/xpro.scss', 'public/css/themes/')
    .sass('resources/sass/dashmix/themes/xplay.scss', 'public/css/themes/')

    /* JS */
    .js('resources/js/dashmix/app.js', 'public/js/dashmix.app.js')

    /* Page JS */
    .js('resources/js/pages/tables_datatables.js', 'public/js/pages/tables_datatables.js')

    /* Options */
    .options({
        processCssUrls: false
    });

