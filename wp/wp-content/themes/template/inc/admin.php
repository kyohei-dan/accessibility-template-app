<?php

namespace Site\Admin;

if(!defined("ABSPATH")) die();

/* --------------------------------------------------
 * 管理メニューの整理
 */

add_action("admin_menu", function(){
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

  foreach($pages as $page) remove_menu_page($page);
  foreach($subpages as $page) remove_submenu_page($page[0], $page[1]);
});


/* --------------------------------------------------
 * 管理画面のCSS, JSの読み込み
 */

add_action("admin_print_styles", function(){
  if(file_exists(__DIR__ . "/assets/admin.css")){
    echo "<style>\n";
    include __DIR__ . "/assets/admin.css";
    echo "</style>\n";
  }
});

add_action("admin_print_footer_scripts", function(){
  if(file_exists(__DIR__ . "/assets/admin.js")){
    echo "<script>\n";
    include __DIR__ . "/assets/admin.js";
    echo "</script>\n";
  }
});
