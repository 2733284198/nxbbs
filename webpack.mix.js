const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/static/js')
   .js('resources/js/create.js', 'public/static/js')
   .sass('resources/sass/app.scss', 'public/static/css')
   .sass('resources/sass/login.scss', 'public/static/css')
   .sass('resources/sass/show.scss', 'public/static/css')
   .sass('resources/sass/follow.scss', 'public/static/css')
   .sass('resources/sass/userinfo.scss', 'public/static/css')
   .sass('resources/sass/notice.scss','public/static/css')
   .version()
   .copyDirectory('resources/editor/js', 'public/static/js')
   .copyDirectory('resources/editor/css', 'public/static/css');
