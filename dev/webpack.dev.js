const { merge } = require('webpack-merge'); // webpackでdevとprodファイルをmergeするためのやつ
const common = require('./webpack.common.js'); // 共通設定をインポート

module.exports = merge(common, {
  mode: 'development',
});
