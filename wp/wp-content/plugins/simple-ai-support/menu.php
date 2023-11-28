<?php

if (!defined('ABSPATH')) exit;

/**
 * 管理画面にメニューを追加
 */
add_action('admin_menu', function () {
  add_menu_page(
    'SIMPLE AI SUPPORT',
    'AI SUPPORT',
    'manage_options',
    'simple_ai_support',
    'page_simple_ai_support',
    'dashicons-feedback',
    999
  );

  // 記事作成メニュー
  add_submenu_page(
    'simple_ai_support',
    '記事作成',
    '記事作成',
    'manage_options',
    'sas_create', // page slug
    'page_sas_create' // 関数名
  );

  // 一般設定メニュー
  add_submenu_page(
    'simple_ai_support',
    '一般設定',
    '一般設定',
    'manage_options',
    'sas_settings', // page slug
    'page_sas_settings' // 関数名
  );

  // デフォルトで用意されているトップレベルのメニューを削除
  remove_submenu_page('simple_ai_support', 'simple_ai_support');
});
