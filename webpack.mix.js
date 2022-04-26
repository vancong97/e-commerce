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
   .sass('resources/sass/app.scss', 'public/css');

mix.styles([
    'resources/css/styles.css',
    'resources/css/admin.css',
],  'public/css/all.css');

mix.scripts([
    'resources/js/config.js',
], 'public/js/all.js');

mix.scripts([
    'resources/js/client.js',
], 'public/js/client.js');

mix.scripts([
    'resources/js/chart.js',
], 'public/js/chart.js');

mix.copy('node_modules/chart.js/dist/Chart.js', 'public/js');
