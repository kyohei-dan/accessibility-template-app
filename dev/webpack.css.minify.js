const { merge } = require("webpack-merge"); // webpackでdevとprodファイルをmergeするためのやつ
const common = require("./webpack.common.js"); // 共通設定をインポート
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin"); // styles.cssをminifyするやつ

module.exports = merge(common, {
  mode: "production",
  optimization: {
    minimizer: [new CssMinimizerPlugin()],
  },
});
