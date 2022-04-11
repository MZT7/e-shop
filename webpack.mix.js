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
//mix.sass(‘src’, ‘output’, { implementation: require(‘node-sass’) });

mix
  .sass("resources/sass/app.scss", "public/css")
  .sass("resources/sass/admin/admin.scss", "public/css");

mix
  .js("resources/js/app.js", "public/js")
  .js("resources/js/admin/admin.js", "public/js");
// .extract();

// .extract(["jquery"], "public/js/vendor.js")
// .copy(
//   [
//     "node_modules/jquery/dist/jquery.min.js",
//     "node_modules/bootstrap/dist/js/bootstrap.min.js",
//   ],
//   "public/js"
// );

// .extract(["jquery"]);

mix
  .copyDirectory("resources/images", "public/images")
  .copyDirectory("resources/fonts", "public/fonts")
  .options({
    processCssUrls: false,
  });

mix.sourceMaps().version();

mix.browserSync("http://localhost:8000");
