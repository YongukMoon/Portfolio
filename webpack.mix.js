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
   .sass('resources/assets/sass/app.scss', 'public/css')
   .styles([
      'public/css/app.css',
      'node_modules/dropzone/dist/dropzone.css',
   ], 'public/css/app.css')
   .scripts([
      'public/js/app.js',
      'node_modules/select2/dist/js/select2.js',
      'node_modules/dropzone/dist/dropzone.js',
   ], 'public/js/app.js');
