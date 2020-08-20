const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/static/js')
   .sass('resources/sass/app.scss', 'public/static/css')
   .sass('resources/sass/login.scss', 'public/static/css')
   .version()
   .copyDirectory('resources/editor/js', 'public/static/js')
   .copyDirectory('resources/editor/css', 'public/static/css');
