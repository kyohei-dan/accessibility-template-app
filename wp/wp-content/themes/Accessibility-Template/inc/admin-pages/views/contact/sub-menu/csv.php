<?php if (!defined("ABSPATH")) die(); ?>

<div id="contact" class="wrap contact-settings">
  <h1 class="wp-heading-inline">CSV出力設定</h1>
  <?php if (!empty($message)) { ?>
    <p class="message success_message"><?php echo esc_html($message); ?></p>
  <?php }; ?>

  <div class="form-container">
    <form method="post" action="">
      <?php wp_nonce_field('output_csv_nonce', 'csv_nonce'); ?>
      <button type="submit" class="update-button" name="csv_settings_save">CSVで出力する</button>
    </form>
  </div>
</div>