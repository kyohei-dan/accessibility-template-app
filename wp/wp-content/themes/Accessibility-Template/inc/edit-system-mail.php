<?php

add_filter('wp_mail_from_name', function ($email_from) {
  $setting = get_setting("system-mail");
  return $setting["name"];
});

// 送信者メールアドレスを変更
add_filter('wp_mail_from', function ($email_address) {
  $setting = get_setting("system-mail");
  return $setting["from"];
});
