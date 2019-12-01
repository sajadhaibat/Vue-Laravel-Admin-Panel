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
    'public/assets/libs/datatables/dataTables.bootstrap4.css',
    'public/assets/libs/datatables/responsive.bootstrap4.css',
    'public/assets/css/bootstrap.min.css',
    'public/assets/css/app.min.css',
], 'public/css/all.css');
mix.scripts([
    'public/assets/js/vendor.min.js',
    'public/assets/libs/chart-js/Chart.bundle.min.js',
    'public/assets/libs/datatables/jquery.dataTables.min.js',
    'public/assets/libs/datatables/dataTables.bootstrap4.js',
    'public/assets/libs/datatables/dataTables.responsive.min.js',
    'public/assets/libs/datatables/responsive.bootstrap4.min.js',
    'public/assets/js/pages/tickets.js',
    'public/assets/js/pages/dashboard-3.init.js',
    'public/assets/js/app.min.js',
    'public/assets/js/pages/widgets.init.js',
], 'public/js/all.js');

