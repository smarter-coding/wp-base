const mix = require('laravel-mix');

mix.setPublicPath('public');

mix
    .js('assets/js/main.js', 'js')
    .vue({ version: 3 })
    .postCss('assets/css/main.pcss', 'css', [
        require('postcss-import'),
        require('postcss-nested'),
        require('autoprefixer'),
    ])
;
