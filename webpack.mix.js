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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/dashboard.js', 'public/js')
    .js('resources/js/categories-index.js', 'public/js')
    .js('resources/js/products-index.js', 'public/js')
    .postCss('resources/css/signin.css', 'public/css', [
        //
    ])
    .postCss('resources/css/dashboard.css', 'public/css', [
        //
    ])
    .copy('resources/assets', 'public/assets');