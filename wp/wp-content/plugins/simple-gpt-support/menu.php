<?php

if (!defined('ABSPATH')) exit;

/**
 * 管理画面にメニューを追加
 */
add_action('admin_menu', function () {
  add_menu_page(
    'SIMPLE GPT SUPPORT',
    'GPT SUPPORT',
    'manage_options',
    'simple_gpt_support',
    'page_simple_gpt_support',
    'dashicons-feedback',
    999
  );

  // 記事作成メニュー
  add_submenu_page(
    'simple_gpt_support',
    '記事作成',
    '記事作成',
    'manage_options',
    'sgs_create', // page slug
    'page_sgs_create' // 関数名
  );

  // 一般設定メニュー
  add_submenu_page(
    'simple_gpt_support',
    '一般設定',
    '一般設定',
    'manage_options',
    'sgs_settings', // page slug
    'page_sgs_settings' // 関数名
  );

  // デフォルトで用意されているトップレベルのメニューを削除
  remove_submenu_page('simple_gpt_support', 'simple_gpt_support');
});
