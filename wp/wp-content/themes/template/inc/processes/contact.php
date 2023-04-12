<?php

namespace ML\Process\contact;

function process()
{
  switch ($_SERVER["REQUEST_METHOD"]) {
    case "GET":
      view("contact/input", ["data" => []]);
      break;

    case "POST":
      $data = get_form_data($_POST);
      $errors = confirm($data);
      $vars = ["data" => $data, "errors" => $errors];

      if (count($errors) > 0) {
        view("contact/input", $vars);
        return;
      }

      switch (el($_POST, "action")) {
        case "confirm":
          view("contact/confirm", $vars);
          break;

        case "send":
          send($data);
          view("contact/thanks");
          break;

        default:
          view("contact/input", $vars);
          break;
      }
  }
}

function get_form_data($post)
{
  $setting = get_setting("contact");
  $data = [];

  foreach ($setting["fields"] as $field) $data[$field] = el($post, $field);
  return $data;
}

function confirm($data)
{
  $errors = [];

  if (el($data, "type", "") === "") $errors["type"] = "お問い合わせ項目を選択してください";

  if (el($data, "corp") === "") $errors["corp"] = "会社名を入力してください";

  if (el($data, "name") === "") $errors["name"] = "お名前を入力してください";

  if (el($data, "furigana") === "") $errors["furigana"] = "ふりがなを入力してください";

  if (el($data, "tel") === "") {
    $errors["tel"] = "電話番号を入力してください";
  } else if (!preg_match('/\d{2,4}-?\d{2,4}-?\d{3,4}/', el($data, "tel"))) {
    $errors["tel"] = "電話番号が正しく入力されていません";
  }

  if (el($data, "email1") === "") {
    $errors["email1"] = "メールアドレスを入力してください";
  } else if (!preg_match('/([a-zA-Z0-9\+_\-]+)(\.[a-zA-Z0-9\+_\-]+)*@([a-zA-Z0-9\-]+\.)+[a-zA-Z]{2,6}/', el($data, "email1"))) {
    $errors["email1"] = "メールアドレスが正しく入力されていません";
  }

  if (el($data, "message", "") === "") {
    $errors["message"] = "お問い合わせ内容を入力してください";
  }

  return $errors;
}

function send($data)
{
  $setting = get_setting("contact");
  $headers = [
    "From: {$setting['from']}",
    'Content-Type: text/plain; charset="UTF-8"',
  ];

  // 管理者宛
  $message = capture(function () use ($data) {
    include __DIR__ . "/../mail-body/contact-admin.php";
  });

  foreach (explode(",", $setting["admin"]) as $email) {
    wp_mail($email, $setting["title_admin"], $message, $headers);
  }

  // ユーザ宛
  $message = capture(function () use ($data) {
    include __DIR__ . "/../mail-body/contact-user.php";
  });
  wp_mail($data["email1"], $setting["title"], $message, $headers);
}
