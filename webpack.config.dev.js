const path = require('path');
const webpack = require('webpack');
const WebpackNotifierPlugin = require('webpack-notifier');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const VueLoaderPlugin = require('vue-loader/lib/plugin');

const config = {
    mode: 'development',
    watch: true,
    watchOptions: {
        ignored: /node_modules/,
    },
    entry: {
        global: './src/App/Client/assets/global/js/global/global.js',
        home: './src/App/Client/pages/Home/Home',
        loginregister: './src/App/Client/pages/LoginRegister/LoginRegister',
    },
    output: {
        path: path.resolve("./public/dist/vendor/"),
        filename: "js/[name].js",
    },
    module: {
        rules: [
            {
                test   : /\.(scss|css)$/,
                resolve: {extensions: [".scss", ".css"],},
                use: [
                    'style-loader',
                    MiniCssExtractPlugin.loader,
                    'css-loader',
                    'postcss-loader?sourceMap',
                    'resolve-url-loader?sourceMap',
                    'sass-loader?sourceMap',
                ],
            },
            {
                test: /\.vue$/,
                loader: [
                    {
                        loader: 'vue-loader',
                        options: {
                            loaders: {
                                scss: ['vue-style-loader', MiniCssExtractPlugin.loader, 'css-loader', 'sass-loader', 'postcss-loader'],
                                css: ['vue-style-loader', MiniCssExtractPlugin.loader, 'css-loader', 'postcss-loader'],
                            },
                        },
                    },
                ],
            },
        ],
    },
    resolve: {
        extensions: ['.js', '.vue'],
        alias: {
            vue$: 'vue/dist/vue.js',
        },
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: 'css/[name].css',
            chunkFilename: '[id].css',
            ignoreOrder: false,
        }),
        new webpack.ProvidePlugin({
            Vue: 'vue',
            BootstrapVue: 'bootstrap-vue',
            axios: 'axios',
        }),
        new VueLoaderPlugin(),
    ]
};

module.exports = config;