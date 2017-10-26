let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .js('resources/assets/js/seguimiento.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .sass('resources/assets/sass/seguimiento.sass', 'public/css')
   .js('resources/assets/js/seguimiento.coffee', 'public/js')
   .webpackConfig({module: { rules: [ { test: /\.coffee$/, loader: 'coffee-loader' } ] } });
