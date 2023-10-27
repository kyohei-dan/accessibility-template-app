<!DOCTYPE html>
<html lang="ja">

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta name="robots" content="noindex">
  <?php part("links"); ?>
  <?php part("analytics"); ?>
  <title>お問い合わせ</title>
  <link rel="canonical" href="<?php echo get_current_page_url(); ?>">
  <meta name="description" content="">
  <meta property="og:locale" content="ja_JP">
  <meta property="og:type" content="article">
  <meta property="og:title" content="お問い合わせ">
  <meta property="og:description" content="">
  <meta property="og:url" content="<?php echo get_current_page_url(); ?>">
  <meta property="og:site_name" content="template">
  <meta property="og:image" content="<?php echo (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST']; ?>/assets/images/ogp.jpg">
  <meta name="twitter:card" content="summary_large_image">
</head>

<body class="contact">
  <div class="site-wrapper">
    <?php part("header"); ?>

    <main id="contents">
      <header class="lower-header">
        <div class="inner">
          <h1>お問い合わせ</h1>
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
            <a href="/contact/" aria-current="page" itemprop="item" tabindex="-1">
              <span itemprop="name">お問い合わせ（完了）</span>
            </a>
            <meta itemprop="position" content="2" />
          </li>
        </ol>
      </nav>

      <section class="thanks">
        <div class="inner">
          <p class="lead">お問い合わせありがとうございました</p>
          <p class="text">
            担当者より、改めてご連絡させていただきますので、今しばらくお待ちください。<br aria-hidden="true">
            何卒、よろしくお願い致します。
          </p>
          <div class="top-button">
            <a href="/">TOP</a>
          </div>
        </div>
      </section>
    </main>

    <?php part("page-top-button"); ?>
    <?php part("footer"); ?>
    <?php part("loading-mask"); ?>

  </div>

  <?php wp_footer(); ?>
  <?php part("scripts"); ?>
</body>

</html>