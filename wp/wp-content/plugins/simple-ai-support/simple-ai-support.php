<?php

/**
 * Plugin Name: SIMPLE AI SUPPORT
 * Description: SIMPLE AI SUPPORTは、AIを使用して記事作成のサポートができるプラグインです。生成されたテキストは投稿することも可能です。
 * Version: 1.0.0
 * Author: Dan
 * Author URI: https://next-notion-blog-kyohei-dan.vercel.app/
 * License: GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if (!defined('ABSPATH')) exit;

// バージョン
define('SAS_VERSION', '1.0.0');

// URLとパスの定数を用意
define('SAS_PLUGIN_URL', plugins_url('/', __FILE__));
define('SAS_PLUGIN_DIR', plugin_dir_path(__FILE__));

// 一般設定ページ用の関数読み込み
require_once SAS_PLUGIN_DIR . 'inc/functions.php';

// メニューの読み込み
require_once SAS_PLUGIN_DIR . 'menu.php';

// 記事作成ページ読み込み
require_once(plugin_dir_path(__FILE__) . 'pages/page_create.php');
require_once(plugin_dir_path(__FILE__) . 'js/js_ai.php');

// 一般設定ページの読み込み
require_once SAS_PLUGIN_DIR . 'pages/page_settings.php';

/**
 * CSSの読み込み
 */
add_action('admin_enqueue_scripts', function ($hook_suffix) {
  $is_sas_page = false !== strpos($hook_suffix, 'sas_');
  if ($is_sas_page) {
    wp_enqueue_style(
      'sas-create-styles', // idの命名
      SAS_PLUGIN_URL . 'css/page-create.css',
      [],
      SAS_VERSION
    );

    wp_enqueue_style(
      'sas-settings-styles', // idの命名
      SAS_PLUGIN_URL . 'css/page-settings.css',
      [],
      SAS_VERSION
    );

    wp_enqueue_style(
      'sas-font-awesome', // idの命名
      'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css'
    );

    wp_enqueue_style(
      'sas-google-icon', // idの命名
      'https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200'
    );

    wp_enqueue_script('sas-marked', 'https://cdn.jsdelivr.net/npm/marked@4.3.0/lib/marked.umd.min.js', [], SAS_VERSION, true);
    wp_enqueue_script('sas-settings-js', SAS_PLUGIN_URL . 'js/page-settings.js', [], SAS_VERSION, true);
    wp_enqueue_script('sas-create-js', SAS_PLUGIN_URL . 'js/page-create.js', [], SAS_VERSION, true);
  }
});
