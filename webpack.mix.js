const mix = require("laravel-mix");

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

mix
    /* Gull Theme */
    .sass(
        "resources/gull/assets/styles/sass/themes/dark-turquoise.scss",
        "public/gull/assets/styles/css/themes/dark-turquoise.min.css"
    )
    
    /* Laravel */
    .js("resources/js/app.js", "public/js")
    .js("resources/js/smart.wizard.js", "public/js")
    .js("resources/js/sweetAlert.js", "public/js")
    .sass("resources/sass/app.scss", "public/css")
    
    .js("resources/gull/assets/js/script.js", "public/gull/assets/js/script.js")

    /* Livewire */
    .js("resources/js/livewireToastr.js", "public/js")
    .js("resources/js/livewireSweetAlert.js", "public/js");


/* Gull Theme */
mix.combine(
    [
        "resources/gull/assets/js/vendor/jquery-3.3.1.min.js",
        "resources/gull/assets/js/vendor/bootstrap.bundle.min.js",
        "resources/gull/assets/js/vendor/perfect-scrollbar.min.js"
    ],
    "public/gull/assets/js/common-bundle-script.js"
);
