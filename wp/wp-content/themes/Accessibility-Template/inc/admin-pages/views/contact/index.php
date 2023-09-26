<?php if (!defined("ABSPATH")) die(); ?>

<div id="contact" class="wrap">
  <h1 class="wp-heading-inline">お問い合わせ一覧</h1>
  <?php $display_chart = get_option('display_chart', false); ?>
  <?php if ($display_chart) { ?>
    <div class="chart-container">
      <canvas class="js-contact-chart contact-chart" width="2400" height="410" aria-label="お問い合わせの件数グラフ" role="img"></canvas>
    </div>
  <?php } ?>
  <p class="result-text">お問い合わせ件数:<b class="total-count"><?php echo esc_html($total_contacts); ?></b>件</p>
  <p class="result-text">
    <output>
      未対応件数:<b class="js-not-opened-count"><?php echo esc_html($not_opened_count); ?></b>件
    </output>
  </p>
  <div class="tabel-container">
    <table class="contact-table">
      <tr>
        <th>対応済み</th>
        <th>受信日時</th>
        <th>お問い合わせ項目</th>
        <th>会社名</th>
        <th>お名前</th>
        <th>ふりがな</th>
        <th>電話番号</th>
        <th>メールアドレス</th>
        <th>お問い合わせ内容</th>
        <th>メニュー</th>
      </tr>
      <?php foreach ($contacts as $row) { ?>
        <tr>
          <td>
            <div role="switch" aria-checked="<?php echo ($row['mail_status'] == 'opened') ? 'true' : 'false'; ?>" tabindex="0" data-id="<?php echo esc_attr($row['id']); ?>" class="js-status-switch">
              <span class="switch">
                <span class="switch-slider"></span>
                <span class="on" aria-hidden="true">はい</span>
                <span class="off" aria-hidden="true">いいえ</span>
              </span>
            </div>
          </td>
          <td><?php echo esc_html($row['time']); ?></td>
          <td><?php echo esc_html($row['type']); ?></td>
          <td><?php echo esc_html($row['corp']); ?></td>
          <td><?php echo esc_html($row['name']); ?></td>
          <td><?php echo esc_html($row['furigana']); ?></td>
          <td><?php echo esc_html($row['tel']); ?></td>
          <td><?php echo esc_html($row['email1']); ?></td>
          <td><?php echo esc_html($row['message']); ?></td>
          <td>
            <a class="edit-button" href="<?php echo admin_url('admin.php?page=contact&action=edit&id=' . intval($row['id'])); ?>">編集</a>
            <a class="delete-button" href="<?php echo admin_url('admin.php?page=contact&action=delete&id=' . intval($row['id'])); ?>">削除</a>
          </td>
        </tr>
      <?php }; ?>
    </table>
  </div>
</div>