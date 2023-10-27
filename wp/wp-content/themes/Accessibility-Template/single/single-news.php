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

    <main id="contents">
      <header class="lower-header">
        <div class="inner">
          <h1>お知らせ</h1>
        </div>
      </header>

      <nav class="breadcrumb" aria-label="パンくずリストのナビゲーション">
        <ol itemscope="itemscope" itemtype="http://schema.org/BreadcrumbList">
          <li property="itemListElement" itemprop="itemListElement" itemscope="itemscope" itemtype="http://schema.org/ListItem">
            <a href="/" itemprop="item">
              <span itemprop="name">ホーム</span>
            </a>
            <meta itemprop="position" content="1" />
          </li>
          <li property="itemListElement" itemprop="itemListElement" itemscope="itemscope" itemtype="http://schema.org/ListItem">
            <a href="/news/" itemprop="item">
              <span itemprop="name">お知らせ</span>
            </a>
            <meta itemprop="position" content="2" />
          </li>
          <li property="itemListElement" itemprop="itemListElement" itemscope="itemscope" itemtype="http://schema.org/ListItem">
            <a href="<?php the_permalink(); ?>" aria-current="page" itemprop="item" tabindex="-1">
              <span itemprop="name"><?php the_title(); ?></span>
            </a>
            <meta itemprop="position" content="3" />
          </li>
        </ol>
      </nav>

      <article class="post">
        <div class="inner">
          <div class="header">
            <h2><?php the_title(); ?></h2>
            <time aria-label="投稿日" itemprop="datePublished" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
            <p class="label" aria-label="カテゴリ"><?php echo get_the_terms($post->ID, 'news-category')[0]->name; ?></p>
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

    <?php part("page-top-button"); ?>
    <?php part("footer"); ?>
    <?php part("loading-mask"); ?>
  </div>

  <?php wp_footer(); ?>
  <?php part("scripts"); ?>
</body>

</html>