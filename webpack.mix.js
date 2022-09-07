const mix = require('laravel-mix');

mix.js([
    'resources/assets/js/jquery-3.4.1.min.js',
    'resources/js/base/spa/app.js',
], 'public/assets/app/js/spa/app.js')
    .scripts([
        'resources/assets/js/plugins/plugins.bundle.js',
        'resources/assets/js/plugins/prismjs.bundle.js',
        'resources/assets/js/scripts.bundle.js',
        'resources/assets/js/plugins/fullcalendar.bundle.js',
        'resources/assets/js/plugins/gmaps.js',
        'resources/assets/js/widgets.js',
    ],'public/assets/app/js/spa/all.js')
    .vue()
    .styles([
        'resources/assets/css/app.scss',
        'resources/assets/css/custom.css',
        'resources/assets/css/plugins/fullcalendar.bundle.rtl.css',
        'resources/assets/css/plugins/plugins.bundle.rtl.css',
        'resources/assets/css/plugins/prismjs.bundle.rtl.css',
        'resources/assets/css/style.bundle.rtl.css',
        'resources/assets/css/theme/header/base/light.rtl.css',
        'resources/assets/css/theme/header/menu/light.rtl.css',
        'resources/assets/css/theme/brand/dark.rtl.css',
        'resources/assets/css/theme/aside/dark.rtl.css',
        ], 'public/assets/app/css/app.css');
