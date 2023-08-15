<?php

if (!defined("ABSPATH")) die();

// 不要な設定を削除（アクションフックのinitでプラグインとテーマが読み込まれたあとに実行）
add_action("init", function () {
  remove_action("wp_robots", "wp_robots_max_image_preview_large");
  remove_action("wp_head", "print_emoji_detection_script", 7);
  remove_action("wp_print_styles", "print_emoji_styles");
  remove_action("wp_enqueue_scripts", "wp_common_block_scripts_and_styles");
  remove_action("wp_enqueue_scripts", "wp_enqueue_global_styles");
  remove_action("wp_head", "rest_output_link_wp_head");
  remove_action("wp_head", "wp_oembed_add_discovery_links");
  remove_action("wp_head", "wp_oembed_add_host_js");
  remove_action("template_redirect", "rest_output_link_header", 11);
  remove_action("wp_head", "rsd_link");
  remove_action("wp_head", "wlwmanifest_link");
  remove_action("wp_head", "wp_generator");
  remove_action("wp_head", "rel_canonical");
  remove_action("wp_head", "wp_shortlink_wp_head");
});

// 不要なcssを削除（アクションフックのwp_enqueue_scriptsでファイルを読み込んで指定したlinkタグを削除）
add_action("wp_enqueue_scripts", function () {
  wp_dequeue_style("dashicons");
  wp_dequeue_style("classic-theme-styles");
  wp_dequeue_style("global-styles");
  wp_dequeue_style("wp-block-library");
});
