<?php

namespace {
  require_once __DIR__ . "/inc/admin.php";
  require_once __DIR__ . "/inc/post-types.php";
  require_once __DIR__ . "/inc/wp-head-clean.php";

  // テストで出力する内容を整形する関数
  function pre($str)
  {
    echo "<pre>";
    print_r($str);
    echo "</pre>";
  }

  // 文字列のエスケープ処理関数
  function h($str): string
  {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
  }

  // $objectが配列やオブジェクトの場合に、$keyに対応する値を取得する関数
  function el($object, $key, $default = null)
  {
    if (is_array($object)) {
      return isset($object[$key]) ? $object[$key] : $default;
    } else {
      return isset($object->$key) ? $object->$key : $default;
    }
  }

  // 指定されたファイルの有無を判定して、ファイルがあればファイルを取得する関数
  function view($view, $vars = [])
  {
    if (file_exists(__DIR__ . "/{$view}.php")) {
      extract($vars);
      include __DIR__ . "/{$view}.php";
    }
  }

  // partsファルダのファイルを呼び出す関数
  function part($part, $vars = [])
  {
    view("/parts/{$part}", $vars);
  }
};

namespace Site {
  // サイト固有の関数をここに記述
}
