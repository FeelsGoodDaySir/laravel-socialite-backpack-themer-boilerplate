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

// mix.js('resources/js/app.js', 'public/js')
//     .postCss('resources/css/app.css', 'public/css', [
//         //
//         require('tailwindcss'),
//     ]);

let theme = process.env.npm_config_theme;

if (theme) {
    require(`${__dirname}/themes/${theme}/webpack.mix.js`);
} else {
    // default theme to compile if theme is not specified
    require(`${__dirname}/themes/base-tailwind-react/webpack.mix.js`);
}

mix.browserSync('localhost');