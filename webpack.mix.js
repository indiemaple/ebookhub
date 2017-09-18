let mix = require('laravel-mix');

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

var basejs = [
    'resources/assets/js/vendor/jquery.min.js',
    'resources/assets/js/vendor/bootstrap.min.js',
    'resources/assets/js/vendor/moment.min.js',
    'resources/assets/js/vendor/zh-cn.min.js',
    'resources/assets/js/vendor/emojify.min.js',
    'resources/assets/js/vendor/jquery.scrollUp.js',
    'resources/assets/js/vendor/jquery.pjax.js',
    'resources/assets/js/vendor/nprogress.js',
    'resources/assets/js/vendor/jquery.autosize.min.js',
    'resources/assets/js/vendor/prism.js',
    'resources/assets/js/vendor/jquery.textcomplete.js',
    'resources/assets/js/vendor/emoji.js',
    'resources/assets/js/vendor/marked.min.js',
    'resources/assets/js/vendor/ekko-lightbox.js',
    'resources/assets/js/vendor/localforage.min.js',
    'resources/assets/js/vendor/jquery.inline-attach.min.js',
    'resources/assets/js/vendor/snowfall.jquery.min.js',
    'resources/assets/js/vendor/upload-image.js',
    'resources/assets/js/vendor/bootstrap-switch.js',
    'resources/assets/js/vendor/messenger.js',
    'resources/assets/js/vendor/anchorific.js',
    'resources/assets/js/vendor/analytics.js',
    'resources/assets/js/vendor/jquery.jscroll.js',
    'resources/assets/js/vendor/jquery.highlight.js',
    'resources/assets/js/vendor/jquery.sticky.js',
    'resources/assets/js/vendor/sweetalert.js',
];

mix.js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/js/vendor/icheck.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')


   // editor
    .scripts([
        'resources/assets/js/vendor/inline-attachment.js',
        'resources/assets/js/vendor/codemirror-4.inline-attachment.js',
        'resources/assets/js/vendor/simplemde.min.js',
    ], 'public/assets/js/editor.js')
    // API Web View
    .sass('resources/assets/sass/vendor/simplemde.min.scss', 'public/assets/css/editor.css')

    .scripts(basejs.concat([
        'resources/assets/js/main.js',
    ]), 'public/assets/js/scripts.js', './');
