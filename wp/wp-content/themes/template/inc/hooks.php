<?php

if (!defined("ABSPATH")) die();

// imgタグに自動で付与されるsrcsetを削除する
add_filter('wp_calculate_image_srcset_meta', '__return_null');
