const purgecss = require('@fullhuman/postcss-purgecss')({
    content: [
        './resources/**/*.vue',
        './resources/**/*.js'
    ],
    whitelistPatterns: [ /-(leave|enter|appear)(|-(to|from|active))$/, /data-v-.*/, /v-deep/ ],
    whitelistPatternsChildren: [ /pretty$/, /xmx-.*$/, /^(.*?)\.tooltip/ ],
    defaultExtractor: content => content.match(/[\w-/.:]+(?<!:)/g) || []
})

module.exports = {
    plugins: [
        require('tailwindcss'),
        require('autoprefixer'),
        ...process.env.NODE_ENV === 'production' ? [purgecss] : []
    ]
}
