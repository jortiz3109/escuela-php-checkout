const mix = require('laravel-mix');

mix.browserSync({
    proxy: process.env.APP_URL,
    notify: false
});

mix.js('resources/js/app.js', 'public/js')
    .vue({version: 3})
    .webpackConfig((webpack) => {
        return {
            plugins: [
                new webpack.DefinePlugin({
                    __VUE_OPTIONS_API__: true,
                    __VUE_PROD_DEVTOOLS__: false,
                }),
            ],
        };
    });

mix.postCss('resources/css/app.css', 'public/css', [
    require('tailwindcss'),
]);
