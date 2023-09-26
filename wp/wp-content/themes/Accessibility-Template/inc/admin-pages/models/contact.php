<?php
if (!defined("ABSPATH")) die();

// すべてのお問い合わせデータを取得する関数
function get_contact_data()
{
  global $wpdb;
  $table_name = $wpdb->prefix . 'contact_form_data';
  return $wpdb->get_results("SELECT * FROM $table_name ORDER BY id DESC", ARRAY_A);
}

// $idに合致するお問い合わせデータを取得する関数
function get_contact_by_id($id = null)
{
  global $wpdb;
  if ($id === null) return false;
  $table_name = $wpdb->prefix . 'contact_form_data';
  return $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $id), ARRAY_A);
}

// お問い合わせデータを更新する処理
function update_contact_data($id = null, $type = null, $corp = null, $name = null, $furigana = null, $tel = null, $email1 = null, $message = null)
{
  global $wpdb;
  if ($id === null) return false;
  $table_name = $wpdb->prefix . 'contact_form_data';
  $data = [
    'type' => $type,
    'corp' => $corp,
    'name' => $name,
    'furigana' => $furigana,
    'tel' => $tel,
    'email1' => $email1,
    'message' => $message
  ];
  $where = ['id' => $id];

  return $wpdb->update(
    $table_name,
    $data,
    $where,
    ['%s', '%s', '%s', '%s', '%s', '%s', '%s']
  );
}

// お問い合わせデータを削除する処理
function delete_contact_data($id = null)
{
  global $wpdb;
  $table_name = $wpdb->prefix . 'contact_form_data';
  return $wpdb->delete($table_name, ['id' => $id], ['%d']);
}

// お問い合わせ一覧の対応済みステータスの状態を更新する処理
function update_mail_status()
{
  global $wpdb;
  $table_name = $wpdb->prefix . 'contact_form_data';

  $id = isset($_POST['id']) ? intval($_POST['id']) : null;
  $status = isset($_POST['mail_status']) ? sanitize_text_field($_POST['mail_status']) : 'not_opened';

  $result = $wpdb->update($table_name, ['mail_status' => $status], ['id' => $id]);

  if ($result !== false) {
    $not_opened_count = $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE mail_status = 'not_opened'");
    wp_send_json_success(['not_opened_count' => $not_opened_count]);
  } else {
    wp_send_json_error();
  }
}

// 対応済みではないお問い合わせの件数を取得する処理
function get_unopened_contact_count()
{
  global $wpdb;
  $table_name = $wpdb->prefix . 'contact_form_data';
  $count = $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE mail_status = 'not_opened'");
  return intval($count);
}

// 直近3ヶ月のお問い合わせ件数を取得する関数
function get_monthly_contact_counts()
{
  global $wpdb;
  $table_name = $wpdb->prefix . 'contact_form_data';

  // 現在の年月を取得
  $now = new DateTime();
  $currentYear = $now->format('Y');
  $currentMonth = $now->format('m');

  // SQLクエリを作成
  $sql = "
  SELECT YEAR(time) as year, MONTH(time) as month, COUNT(*) as count
  FROM $table_name
  WHERE time >= DATE_SUB(NOW(), INTERVAL 3 MONTH)
  GROUP BY YEAR(time), MONTH(time)
  ORDER BY time ASC";

  // クエリの実行
  $results = $wpdb->get_results($sql);

  // デフォルトの月毎のカウント
  $monthly_counts = [
    (int)$currentMonth - 2 => 0,
    (int)$currentMonth - 1 => 0,
    (int)$currentMonth => 0,
  ];

  // 結果を処理
  foreach ($results as $result) {
    if ($result->year == $currentYear) {
      $monthly_counts[(int)$result->month] = (int)$result->count;
    }
  }

  return array_values($monthly_counts);
}
