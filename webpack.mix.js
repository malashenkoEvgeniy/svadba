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

mix.js('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);

mix.styles([
    'public/assets/front/css/breadcrumbs.css',
    'public/assets/front/css/catalog.css',
    'public/assets/front/css/pagination.css',
    'public/assets/front/css/show-more.css'
], 'public/css/catalog.css');



mix.scripts([
    'public/site/js/rubric.js',
], 'public/js/rubric.js');
