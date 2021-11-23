module.exports = {
    testRegex: 'tests/Javascript/.*.test.js$',
    moduleFileExtensions: ['js', 'vue'],
    moduleNameMapper: {
        '^@/(.*)$': '<rootDir>/resources/js/$1',
    },
    transform: {
        '^.+\\.js$': '<rootDir>/node_modules/babel-jest',
        '.*\\.vue$': '<rootDir>/node_modules/vue3-jest',
    },
    testEnvironment: 'jsdom',
}
