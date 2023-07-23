<?php

if (!defined('ABSPATH')) exit;

/**
 * APIキーを取得する関数
 */
function get_api_key()
{
  return get_option('settings_api_key');
}

/**
 * プロンプトを取得する関数
 */
function get_prompt()
{
  return get_option('settings_prompt');
}

/**
 * APIキーをマスクして返す関数
 */
function masked_api_key()
{
  $API_KEY = get_option('settings_api_key');
  if (!empty($API_KEY)) {
    $first_key = substr($API_KEY, 0, 5);
    return $first_key . '*****';
  } else {
    return "";
  }
}

/**
 * 設定を保存する関数
 */
function sgs_settings_update()
{
  // 権限（ユーザーのロールが管理者ではない場合処理を行わない）
  if (!current_user_can('manage_options')) return;

  if (!isset($_POST['settings_save'])) return;

  // CSRF対策
  if (!check_admin_referer('sgs_setting_save_action', 'sgs_setting_save_action_token')) return;

  $api_key = sanitize_text_field($_POST['api_key']);
  $prompt = sanitize_text_field($_POST['prompt']);

  if ($api_key !== masked_api_key()) {
    update_option('settings_api_key', $api_key);
  }

  if ($prompt !== get_prompt()) {
    update_option('settings_prompt', $prompt);
  }

  echo '<div class="updated"><p>設定を保存しました</p></div>';
}

/**
 * WordPressに新規投稿を作成する処理
 */
add_action(
  'admin_post_send_new_post',
  function () {
    $post_type = isset($_POST['post-type']) ? $_POST['post-type'] : '';
    $title = isset($_POST['title-type']) ? $_POST['title-type'] : '';
    $content = isset($_POST['content-type']) ? implode(' ', $_POST['content-type']) : '';

    if (!empty($post_type) && !empty($title) && !empty($content)) {
      $my_post = [
        'post_type' => $post_type,
        'post_status' => 'draft',
        'post_title' => wp_strip_all_tags($title),
        'post_content'  => wp_kses_post($content),
        'post_author' => 1,
      ];
      $post_id = wp_insert_post($my_post);
      if (!is_wp_error($post_id)) {
        add_option('post_sent_message', '記事を送信しました', '', 'no');
      }
    }

    wp_redirect(admin_url('admin.php?page=sgs_create'));
    exit;
  }
);
