<?php if (!defined("ABSPATH")) die(); ?>

<div id="contact" class="wrap">
  <h1 class="wp-heading-inline">お問い合わせ管理 編集</h1>
  <?php if (!empty($message)) { ?>
    <p class="message success_message"><?php echo esc_html($message); ?></p>
  <?php }; ?>

  <div class="form-container">
    <form method="post" action="">
      <?php wp_nonce_field('update_contact_nonce', 'contact_nonce'); ?>
      <dl>
        <dt>受信日時</dt>
        <dd>
          <p><?php echo esc_attr($contact['time']); ?></p>
        </dd>
        <dt><label for="type">お問い合わせ項目</label></dt>
        <dd><input id="type" type="text" name="type" value="<?php echo esc_attr($contact['type']); ?>"></dd>
        <dt><label for="corp">会社名</label></dt>
        <dd><input id="corp" type="text" name="corp" value="<?php echo esc_attr($contact['corp']); ?>"></dd>
        <dt><label for="name">お名前</label></dt>
        <dd><input id="name" type="text" name="name" value="<?php echo esc_attr($contact['name']); ?>"></dd>
        <dt><label for="furigana">ふりがな</label></dt>
        <dd><input id="furigana" type="text" name="furigana" value="<?php echo esc_attr($contact['furigana']); ?>"></dd>
        <dt><label for="tel">電話番号</label></dt>
        <dd><input id="tel" type="text" name="tel" value="<?php echo esc_attr($contact['tel']); ?>"></dd>
        <dt><label for="email1">メールアドレス</label></dt>
        <dd><input id="email1" type="email" name="email1" value="<?php echo esc_attr($contact['email1']); ?>"></dd>
        <dt><label for="message">お問い合わせ内容</label></dt>
        <dd><textarea id="message" name="message"><?php echo esc_textarea($contact['message']); ?></textarea></dd>
      </dl>
      <input type="hidden" name="id" value="<?php echo htmlspecialchars($contact['id'], ENT_QUOTES); ?>">
      <button type="button" class="back-button" onclick="location.href='<?php echo admin_url('admin.php?page=contact'); ?>'">戻る</button>
      <button type="submit" class="update-button" name="update">更新</button>
    </form>
  </div>
</div>