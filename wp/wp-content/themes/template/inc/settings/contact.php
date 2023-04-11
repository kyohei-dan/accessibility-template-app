<?php

namespace ML\Setting\Contact;

$sys = get_setting("system-mail");

return [
  // メールタイトル
  "title" => "お問い合わせいただきありがとうございます",
  "title_admin" => "お問い合わせがありました",

  // 送信先
  "admin" => $sys["from"],

  // 送信元情報
  "from" => $sys["from"],
  "name" => $sys["name"],

  // フィールドの定義
  "fields" => [
    "corp",
    "name",
    "furigana",
    "tel",
    "email1",
    "email2",
    "type",
    "message"
  ]
];
