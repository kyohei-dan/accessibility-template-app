<?php
if (!defined("ABSPATH")) die();

require_once __DIR__ . '/controllers/contact.php';
require_once __DIR__ . '/models/contact.php';
require_once __DIR__ . '/actions/contact.php';

// お問い合わせ内容を保存するためのテーブルをDBへ生成する処理
add_action('init', function () {
  global $wpdb;
  $table_name = $wpdb->prefix . 'contact_form_data';

  // テーブルが存在する場合は処理をスキップ
  if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") === $table_name) {
    return;
  }

  $charset_collate = $wpdb->get_charset_collate();
  $sql = "CREATE TABLE $table_name (
      id mediumint(9) NOT NULL AUTO_INCREMENT,
      type text NOT NULL,
      corp text NOT NULL,
      name text NOT NULL,
      furigana text NOT NULL,
      tel text NOT NULL,
      email1 text NOT NULL,
      message text NOT NULL,
      time TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
      mail_status VARCHAR(255) DEFAULT 'not_opened',
      PRIMARY KEY (id)
  ) $charset_collate;";

  require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
  dbDelta($sql);
});

// 管理画面にメニューページを作成
add_action("admin_menu", function () {
  $menu_title = "お問い合わせ ";
  $not_opened_count = get_unopened_contact_count();
  if ($not_opened_count > 0) {
    $menu_title .= " <span class='update-plugins'><span class='update-count'>$not_opened_count</span></span>";
  }
  add_menu_page("お問い合わせ", $menu_title, "manage_options", "contact", "display_contact_page", "dashicons-email");

  // オプション設定メニュー
  add_submenu_page(
    'contact',
    'オプション設定',
    'オプション設定',
    'manage_options',
    'contact-settings',
    'display_settings_contact_page'
  );

  // CSV出力メニュー
  add_submenu_page(
    'contact',
    'CSV出力',
    'CSV出力',
    'manage_options',
    'contact-csv-export',
    'display_csv_export_page'
  );
}, 10);

// CSSとJSファイルの読み込み
add_action('admin_enqueue_scripts', function () {
  wp_enqueue_style('custom_contact', get_template_directory_uri() . '/inc/admin-pages/assets/css/contact.css');
  wp_enqueue_script('custom_contact_chart', 'https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js', [], null, true);
  wp_enqueue_script('custom_contact', get_template_directory_uri() . '/inc/admin-pages/assets/js/contact.js', [], null, true);

  // JSへ渡す変数の値を設定
  $localized_data = [
    'ajaxUrl' => admin_url('admin-ajax.php'),
    'monthly_counts' => get_monthly_contact_counts(),
  ];

  wp_localize_script('custom_contact', 'adminData', $localized_data);
});

// お問い合わせ一覧の対応済みステータスの状態が変更されたときのフック
add_action('wp_ajax_update_mail_status', 'update_mail_status');
add_action('wp_ajax_nopriv_update_mail_status', 'update_mail_status');

// HTTPヘッダを用意する必要があるため、初期読み込みでexport_csv関数をセットする
add_action('init', 'export_csv');
