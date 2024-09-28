const path = require('path');

module.exports = {
    mode: process.env.NODE_ENV === 'development' ? 'development' : 'production',
    devtool: process.env.NODE_ENV === 'production' ? 'source-map' : '',
    entry: {
        app: ['@babel/polyfill','./public/assets/js/app.js'],
    },
    output: {
        path: path.resolve(__dirname, 'public'),
        filename: '[name].js',
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules\/(?!(alpinejs)\/).*/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env'], // Usar o preset-env do Babel
                    },
                },
            },
        ],
    }
}