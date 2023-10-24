<?php
if (!defined("ABSPATH")) die();

function display_contact_page()
{
  if (isset($_GET['action'])) {
    switch ($_GET['action']) {
      case 'edit':
        display_edit_contact_page();
        return;
      case 'delete':
        display_delete_contact_page();
        return;
    }
  }

  $contacts = get_contact_data();
  $total_contacts = count($contacts);
  $not_opened_count = get_unopened_contact_count();
  include __DIR__ . '/../views/contact/index.php';
}

// 編集ページの表示
function display_edit_contact_page()
{
  $message = "";
  $id = isset($_GET['id']) ? intval($_GET['id']) : null;

  if (isset($_POST['update'])) {
    if (!isset($_POST['contact_nonce']) || !wp_verify_nonce($_POST['contact_nonce'], 'update_contact_nonce')) {
      die('不正な送信');
    }
    if (!current_user_can('administrator')) {
      wp_die('あなたには更新を実行する権限がありません。');
    }
    $result = update_contact_data($id, sanitize_text_field($_POST['type']), sanitize_text_field($_POST['corp']), sanitize_text_field($_POST['name']), sanitize_text_field($_POST['furigana']), sanitize_text_field($_POST['tel']), sanitize_email($_POST['email']), sanitize_textarea_field($_POST['message']));
    if ($result !== false) {
      $message = "データが正常に更新されました。";
    } else {
      $message = "データの更新に失敗しました。";
    }
  }

  $contact = get_contact_by_id($id);
  include __DIR__ . '/../views/contact/edit.php';
}

// 削除ページの表示
function display_delete_contact_page()
{
  $message = "";
  $id = isset($_GET['id']) ? intval($_GET['id']) : null;
  if (isset($_POST['delete'])) {
    if (!isset($_POST['contact_nonce']) || !wp_verify_nonce($_POST['contact_nonce'], 'update_contact_nonce')) {
      die('不正な送信');
    }
    if (!current_user_can('administrator')) {
      wp_die('あなたには削除を実行する権限がありません。');
    }
    $result = delete_contact_data($id);
    if ($result !== false) {
      $message = "データが正常に削除されました。";
    } else {
      $message = "データの削除に失敗しました。";
    }
  }

  $contact = get_contact_by_id($id);
  include __DIR__ . '/../views/contact/delete.php';
}

// オプション設定ページの表示
function display_settings_contact_page()
{
  $message = "";

  if (isset($_POST['settings_save'])) {
    if (!isset($_POST['contact_nonce']) || !wp_verify_nonce($_POST['contact_nonce'], 'update_contact_nonce')) {
      die('不正な送信');
    }
    if (!current_user_can('administrator')) {
      wp_die('あなたには設定を変更する権限がありません。');
    }

    $is_updated = update_option('display_chart', isset($_POST['display_chart']));

    if ($is_updated) {
      $message = "設定が正常に更新されました。";
    } else {
      $message = "";
    }
  }

  $display_chart = get_option('display_chart', false);
  include __DIR__ . '/../views/contact/sub-menu/index.php';
}

// CSV出力ページの表示
function display_csv_export_page()
{
  include __DIR__ . '/../views/contact/sub-menu/csv.php';
}
