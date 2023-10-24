<?php
// CSV出力ページにCSVで出力する処理
function export_csv()
{
  if (!isset($_GET['page']) || $_GET['page'] !== 'contact-csv-export') return;
  if (!isset($_POST['csv_settings_save'])) return;
  if (!isset($_POST['csv_nonce']) || !wp_verify_nonce($_POST['csv_nonce'], 'output_csv_nonce')) die('不正な送信');
  if (!current_user_can('administrator')) wp_die('あなたにはCSVで出力する権限がありません。');

  header('Content-Type: text/csv; charset=cp932');
  header('Content-Disposition: attachment; filename="contacts.csv"');

  $output = fopen('php://output', 'w');

  // ヘッダーの設定と文字化け対策のため、文字コードを変換
  $header = ['id', 'お問い合わせ項目', '会社名', 'お名前', 'ふりがな', '電話番号', 'メールアドレス', 'お問い合わせ内容', 'お問い合わせ日時', '対応済みステータス'];
  mb_convert_variables('SJIS-win', 'UTF-8', $header);
  fputcsv($output, $header);

  // お問い合わせ内容の取得と文字化け対策のため、文字コードを変換
  $contacts = get_contact_data();
  foreach ($contacts as $contact) {
    mb_convert_variables('SJIS-win', 'UTF-8', $contact);
    fputcsv($output, $contact);
  }
  fclose($output);
  exit;
}
