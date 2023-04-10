<!DOCTYPE html>
<html lang="ja">

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <?php part("links"); ?>
  <?php part("analytics"); ?>
  <?php wp_head(); ?>
</head>

<body class="single-news">
  <div class="site-wrapper">
    <?php part("header"); ?>

    <main>
      <header class="lower-header">
        <div class="inner">
          <h1>お知らせ</h1>
        </div>
      </header>

      <nav class="breadcrumb" aria-label="パンくずリストのナビゲーション">
        <ol>
          <li property="itemListElement">
            <a href="/" property="item">ホーム</a>
          </li>
          <li property="itemListElement">
            <a href="/news/" property="item">お知らせ</a>
          </li>
          <li property="itemListElement">
            <span aria-current="page" property="item"><?php the_title(); ?></span>
          </li>
        </ol>
      </nav>

      <article class="post">
        <div class="inner">
          <div class="header">
            <h2><?php the_title(); ?></h2>
            <time itemprop="datePublished" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
            <p class="label"><?php echo get_the_terms($post->ID, 'news-category')[0]->name; ?></p>
          </div>
          <div class="editor-contents">
            <?php the_content(); ?>
          </div>
        </div>
      </article>

      <nav class="pagination" aria-label="お知らせ記事のナビゲーション">
        <div class="inner">
          <?php previous_post_link('%link', '前へ'); ?>
          <a href="/news/">一覧へ</a>
          <?php next_post_link('%link', '次へ'); ?>
        </div>
      </nav>
    </main>

    <?php part("footer"); ?>
  </div>

  <?php wp_footer(); ?>
  <?php part("scripts"); ?>
</body>

</html>