<?php
global $post;
$page = $post->post_name;
get_template_part( 'pages/page', $page);

