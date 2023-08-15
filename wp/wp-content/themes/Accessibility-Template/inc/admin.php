<?php

namespace Site\Admin;

if (!defined("ABSPATH")) die();

// Gutenbergエディタを無効化
add_filter('use_block_editor_for_post', '__return_false');

// 投稿画面にサムネイルを表示
add_theme_support('post-thumbnails');

// 管理メニューの整理
add_action("admin_menu", function () {
  $pages = [
    // "index.php", // ダッシュボード
    "edit.php", // 投稿
    // "upload.php", // メディア
    // "edit.php?post_type=page", // 固定ページ
    "edit-comments.php", // コメント
    "themes.php", //外観
    // "plugins.php", // プラグイン
    // "users.php", // ユーザ
    // "tools.php", // ツール
    // "options-general.php", // 設定
  ];

  $subpages = [
    // ["options-general.php", ""],
  ];

  foreach ($pages as $page) remove_menu_page($page);
  foreach ($subpages as $page) remove_submenu_page($page[0], $page[1]);
});

// 管理画面のCSS, JSの読み込み
add_action("admin_print_styles", function () {
  if (file_exists(__DIR__ . "/assets/admin.css")) {
    echo "<style>\n";
    include __DIR__ . "/assets/admin.css";
    echo "</style>\n";
  }
});

add_action("admin_print_footer_scripts", function () {
  if (file_exists(__DIR__ . "/assets/admin.js")) {
    echo "<script>\n";
    include __DIR__ . "/assets/admin.js";
    echo "</script>\n";
  }
});

// ログイン画面のロゴを変更する処理
// add_action("login_head", function () {
//   echo '<style type="text/css">
//   .login h1 a {
//     background-image: url("/assets/img/misc/logo_main.svg");
//     width: 106px;
//     height: 40px;
//     background-size: 106px 40px;
//   }

//   .login form {
//     border: 4px solid #007130;
// }

// .login label {
//   color: #007130;
//   font-weight: 900;
// }

// .wp-core-ui .button-primary {
//   background: #007130;
//   border-color: #007130;
// }

// .wp-core-ui .button-primary:hover {
//   background: #fff;
//   border-color: #007130;
//   color: #007130;
// }
// </style>';
// });
