<?php if (!defined("ABSPATH")) die(); ?>

<div id="contact" class="wrap">
  <h1 class="wp-heading-inline">お問い合わせ管理 削除</h1>
  <?php if (!empty($message)) { ?>
    <p class="message success_message"><?php echo esc_html($message); ?></p>
  <?php }; ?>

  <div class="form-container">
    <?php if (isset($contact) && !empty($contact)) { ?>
      <form method="post" action="">
        <?php wp_nonce_field('update_contact_nonce', 'contact_nonce'); ?>
        <dl>
          <dt>受信日時</dt>
          <dd>
            <p><?php echo esc_attr($contact['time']); ?></p>
          </dd>
          <dt>お問い合わせ項目</dt>
          <dd>
            <p><?php echo esc_attr($contact['type']); ?></p>
          </dd>
          <dt>会社名</dt>
          <dd>
            <p><?php echo esc_attr($contact['corp']); ?></p>
          </dd>
          <dt>お名前</dt>
          <dd>
            <p><?php echo esc_attr($contact['name']); ?></p>
          </dd>
          <dt>ふりがな</dt>
          <dd>
            <p><?php echo esc_attr($contact['furigana']); ?></p>
          </dd>
          <dt>電話番号</dt>
          <dd>
            <p><?php echo esc_attr($contact['tel']); ?></p>
          </dd>
          <dt>メールアドレス</dt>
          <dd>
            <p><?php echo esc_attr($contact['email1']); ?></p>
          </dd>
          <dt>お問い合わせ内容</dt>
          <dd>
            <p><?php echo esc_textarea($contact['message']); ?></p>
          </dd>
        </dl>
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($contact['id'], ENT_QUOTES); ?>">
        <button type="button" class="back-button" onclick="location.href='<?php echo admin_url('admin.php?page=contact'); ?>'">戻る</button>
        <button type="submit" class="delete-button" name="delete">削除</button>
      </form>
    <?php } else { ?>
      <button type="button" class="back-button" onclick="location.href='<?php echo admin_url('admin.php?page=contact'); ?>'">お問い合わせ一覧ページへ戻る</button>
    <?php }; ?>
  </div>
</div>