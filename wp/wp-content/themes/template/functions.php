<?php

namespace {
  require_once __DIR__ . "/inc/add-routes.php";
  require_once __DIR__ . "/inc/admin.php";
  require_once __DIR__ . "/inc/edit-system-mail.php";
  require_once __DIR__ . "/inc/hooks.php";
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

  function get_setting($name)
  {
    return include __DIR__ . "/inc/settings/{$name}.php";
  }

  function capture($fn)
  {
    ob_start();
    $fn();
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
  }

  // 現在表示されているURLを返す関数
  function get_current_page_url()
  {
    return (el($_SERVER, "HTTPS") ? "https://" : "http://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
  }
};

namespace Site {
  function get_pagination($post_type = "", $post_num = 10, $range = 1)
  {
    $query_args = [
      "post_type" => $post_type,
      "posts_per_page" => $post_num,
      "post_status" => "publish",
      "paged" => get_query_var('paged') ? absint(get_query_var('paged')) : 1,
    ];
    $custom_query = new \WP_Query($query_args);

    // 全ページ数
    $max_pages = $custom_query->max_num_pages;
    (!$max_pages) ? $max_pages = 1 : $max_pages;

    // $post_numに値があれば、$per_pageに値を格納する
    $per_page = ceil($custom_query->found_posts / $post_num);

    // 現在のページ
    global $paged;
    if (empty($paged)) $paged = 1;

    return [
      "max_pages" => $max_pages,
      "current_pages" => $paged,
      "per_page" => (!empty($per_page)) ? $per_page : $max_pages,
      "range" => $range,
    ];
  }

  function get_news_posts($n = -1, $slug = "")
  {
    $query = [
      "post_type" => "news",
      "posts_per_page" => $n,
      "paged" => get_query_var('paged') ? absint(get_query_var('paged')) : 1,
    ];

    if (!empty($slug)) {
      $query["tax_query"] = [
        [
          "taxonomy" => "news-category",
          "field" => "slug",
          "terms" => $slug
        ]
      ];
    }
    return get_posts($query);
  }
}
