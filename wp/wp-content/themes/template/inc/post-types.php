<?php

if(!defined("ABSPATH")) die();

add_action("init", function(){
  // ニュース
  register_post_type("news", [
    "label" => "ニュース",
    "public" => true,
    "has_archive" => true,
    "supports" => ["title"],
  ]);


  // パーマリンクの変更
  add_filter("post_type_link", function($link, $post){
    if(in_array($post->post_type, ["news"])) {
      return home_url("/{$post->post_type}/{$post->ID}");
    } else {
      return $link;
    }
  }, 1, 2);

  add_filter("rewrite_rules_array", function($rules){
    $new_rewrite_rules = [
      'news/([0-9]+)/?$' => 'index.php?post_type=news&p=$matches[1]',
    ];
    return $new_rewrite_rules + $rules;
  });

});
