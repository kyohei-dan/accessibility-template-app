<?php

namespace ML\Routing;

add_action('template_redirect', function () {
  $pages = [
    "contact"
  ];

  foreach ($pages as $page) {
    if (preg_match("@^/{$page}/.*@", $_SERVER["REQUEST_URI"])) {
      status_header(200);
      require_once __DIR__ . "/processes/{$page}.php";
      call_user_func("ML\\Process\\{$page}\\process");
      exit;
    } else if ($_SERVER["REQUEST_URI"] === "/{$page}") {
      wp_safe_redirect("/{$page}/");
      exit;
    }
  }
});
