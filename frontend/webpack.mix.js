const mix = require("laravel-mix");

const jsPath = "resources/js/";
const cssPath = "resources/css/";
const scssPath = "resources/css/";
const jsFiles = ["menu.js", "preview-image.js"];
const cssFiles = ["bootstrap.css", "style.css", "style.css.map"];
const scssFiles = ["_cadastra-projeto.scss", "_footer.scss", "_header.scss"];

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

mix.js(
    jsFiles.map((js) => `${jsPath}${js}`),
    "public/js"
);
