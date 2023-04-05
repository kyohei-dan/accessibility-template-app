const path = require("path"); // pathモジュールの読み込み
const { merge } = require("webpack-merge"); // webpackでdevとprodファイルをmergeするためのやつ
const common = require("./webpack.common.js"); // 共通設定をインポート
const CopyWebpackPlugin = require("copy-webpack-plugin");
const ImageMinimizerPlugin = require("image-minimizer-webpack-plugin");

module.exports = merge(common, {
  mode: "production",
  // エントリーポイントの設定
  plugins: [
    new CopyWebpackPlugin({
      patterns: [
        {
          from: path.resolve(__dirname, "../assets/images"),
          to: path.resolve(__dirname, "../assets/images"),
        },
      ],
    }),

    // png, jpeg画像の圧縮設定 qualityの数値を変更する
    new ImageMinimizerPlugin({
      test: /\.(png|jpe?g)$/i,
      minimizer: {
        implementation: ImageMinimizerPlugin.squooshMinify,
        options: {
          encodeOptions: {
            mozjpeg: {
              quality: 90,
            },
            oxipng: {
              level: 3,
              interlace: false,
            },
          },
        },
      },
    }),
  ],
});
