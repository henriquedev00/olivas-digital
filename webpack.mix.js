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

mix
    .styles([
        "resources/views/assets/css/normalize.css",
        "resources/views/assets/css/reset.css",
        "resources/views/assets/css/menu.css",
        "resources/views/assets/css/header.css",
        "resources/css/app.css",
    ], "public/css/styles.css")
    .styles("resources/views/assets/css/erro.css", "public/css/erro.css")
    .styles("resources/css/app.css", "public/css/app.css")
    .styles("resources/views/clientes/assets/css/index.css", "public/css/clientes/index.css")
    .styles("resources/views/clientes/assets/css/edit.css", "public/css/clientes/edit.css")
    .styles("resources/views/clientes/assets/css/create.css", "public/css/clientes/create.css")
    .styles("resources/views/clientes/assets/css/show.css", "public/css/clientes/show.css")
    .styles("resources/views/auth/assets/css/login.css", "public/css/auth/login.css")


    .js("resources/views/assets/js/sendForm.js", "public/js/sendForm.js")
    .js("resources/views/assets/js/modal.js", "public/js/modal.js")
    .js("resources/views/assets/js/modal-telefone.js", "public/js/modal-telefone.js")
    .js("resources/views/assets/js/add-telefone.js", "public/js/add-telefone.js")
    .js("resources/views/assets/js/edit-telefone.js", "public/js/edit-telefone.js")

.version();
