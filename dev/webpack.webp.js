const path = require("path"); // pathモジュールの読み込み
const { merge } = require("webpack-merge"); // webpackでdevとprodファイルをmergeするためのやつ
const common = require("./webpack.common.js"); // 共通設定をインポート
const CopyWebpackPlugin = require("copy-webpack-plugin");
const ImageminWebpWebpackPlugin = require("imagemin-webp-webpack-plugin");

module.exports = merge(common, {
  mode: "production",
  plugins: [
    // エントリーポイントの設定
    new CopyWebpackPlugin({
      patterns: [
        {
          from: path.resolve(__dirname, "../assets/images"),
          to: path.resolve(__dirname, "../assets/images"),
        },
      ],
    }),

    // webp画像の設定 qualityの数値を変更する
    new ImageminWebpWebpackPlugin({
      config: [
        {
          test: /\.(png|jpe?g)$/i, // 対象拡張子
          options: {
            quality: 90, // 画質の数値
          },
        },
      ],
      overrideExtension: false, // 元画像のファイル名を引き継ぐ設定
    }),
  ],
});
