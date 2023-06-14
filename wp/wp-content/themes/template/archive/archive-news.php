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

<body class="archive-news" data-barba="wrapper">
  <div class="site-wrapper">

    <?php part("header"); ?>

    <main data-barba="container" data-barba-namespace="archive-news">
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
            <a href="/news/" aria-current="page" itemprop="item" tabindex="-1">
              <span itemprop="name">お知らせ</span>
            </a>
            <meta itemprop="position" content="2" />
          </li>
        </ol>
      </nav>

      <section class="posts" aria-label="お知らせ記事">
        <div class="inner">
          <?php $posts = Site\get_news_posts(10); ?>
          <?php if ($posts) { ?>
            <ul>
              <?php foreach ($posts as $post) { ?>
                <?php setup_postdata($post); ?>
                <li>
                  <a href="<?php the_permalink(); ?>">
                    <div class="info">
                      <time aria-label="投稿日" itemprop="datePublished" datetime="<?php the_time('Y-m-d'); ?>T<?php the_time('H:i:sP'); ?>"><?php the_time('Y.m.d'); ?></time>
                      <p><?php echo get_the_terms($post->ID, 'news-category')[0]->name; ?></p>
                    </div>
                    <p class="title"><?php the_title(); ?></p>
                  </a>
                </li>
              <?php }; ?>
              <?php wp_reset_postdata(); ?>
            </ul>
          <?php } else { ?>
            <p class="empty-text">現在、お知らせ記事はありません。</p>
          <?php }; ?>
        </div>
      </section>

      <nav class="pagination" aria-label="ページネーション">
        <div class="inner">
          <?php $p = Site\get_pagination(10); ?>
          <?php if ($p['per_page'] !== 1) { ?>
            <?php if ($p['current_pages'] > 1) { ?>
              <a class="prev-link" href="<?php echo get_pagenum_link($p['current_pages'] - 1); ?>">前のページ</a>
            <?php } else { ?>
              <a class="prev-link empty"></a>
            <?php } ?>
            <ul>
              <?php for ($i = 1; $i <= $p['per_page']; $i++) { ?>
                <?php if (!($i >= $p['current_pages'] + $p['range'] + 1 || $i <= $p['current_pages'] - $p['range'] - 1)) { ?>
                  <?php if ($p['current_pages'] === $i) { ?>
                    <li class="is_current-page">
                      <a aria-current="page"><span class="visually-hidden">page </span><?php echo $i ?></a>
                    </li>
                  <?php } else { ?>
                    <li>
                      <a href="<?php echo esc_url(get_pagenum_link($i)); ?>"><span class="visually-hidden">page </span><?php echo $i ?></a>
                    </li>
                  <?php } ?>
                <?php } ?>
              <?php } ?>
            </ul>
            <?php if ($p['current_pages'] < $p['per_page']) { ?>
              <a class="next-link" href="<?php echo get_pagenum_link($p['current_pages'] + 1); ?>">次のページ</a>
            <?php } else { ?>
              <a class="next-link empty"></a>
            <?php } ?>
          <?php } else { ?>
            <a class="prev-link empty"></a>
            <ul>
              <li class="is_current-page">
                <a aria-current="page"><span class="visually-hidden">page </span>1</a>
              </li>
            </ul>
            <a class="next-link empty"></a>
          <?php } ?>
        </div>
      </nav>
    </main>

    <?php part("footer"); ?>
    <?php part("loading-mask"); ?>
  </div>

  <?php wp_footer(); ?>
  <?php part("scripts"); ?>
</body>

</html>