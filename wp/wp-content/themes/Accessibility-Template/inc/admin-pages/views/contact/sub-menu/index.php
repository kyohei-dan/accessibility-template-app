<?php if (!defined("ABSPATH")) die(); ?>

<div id="contact" class="wrap contact-settings">
  <h1 class="wp-heading-inline">お問い合わせオプション設定</h1>
  <?php if (!empty($message)) { ?>
    <p class="message success_message"><?php echo esc_html($message); ?></p>
  <?php }; ?>

  <div class="form-container">
    <form method="post" action="">
      <?php wp_nonce_field('update_contact_nonce', 'contact_nonce'); ?>
      <div class="form-group">
        <label>
          <input type="checkbox" name="display_chart" <?php checked($display_chart, true); ?>>
          <span class="icon"></span>
          <span class="text">グラフを表示させるか</span>
        </label>
      </div>

      <button type="submit" class="update-button" name="settings_save">設定を更新する</button>
    </form>
  </div>
</div>