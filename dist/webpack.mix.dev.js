"use strict";

var mix = require('laravel-mix');

var _require = require('popper.js'),
    Popper = _require["default"];
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


mix.js('resources/js/app.js', 'public/js').autoload({
  jquery: ['$', 'jQuery', 'window.jQuery', 'jquery'],
  "popper.js": ['popper']
}).extract().sass('resources/sass/app.scss', 'public/css');