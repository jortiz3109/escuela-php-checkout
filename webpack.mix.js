const mix = require("laravel-mix");

mix.js("resources/js/app.js", "public/js")
    .vue({version: 3})
    .extract()
    .postCss("resources/css/app.css", "public/css", [
        require("postcss-import"),
        require("tailwindcss"),
        require("autoprefixer"),
    ]);

mix.webpackConfig({
    stats: {
        children: true
    },
    module: {
        rules: [
            {
                test: /\.(postcss)$/,
                use: [
                    'vue-style-loader',
                    { loader: 'css-loader', options: { importLoaders: 1 } },
                    'postcss-loader'
                ]
            }
        ],
    },
});
