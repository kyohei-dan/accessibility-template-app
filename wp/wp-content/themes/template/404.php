<!DOCTYPE html>
<html lang="ja">

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta name="robots" content="noindex">
  <?php part("links"); ?>
  <?php part("analytics"); ?>
  <?php wp_head(); ?>
</head>

<body class="notfound" data-barba="wrapper">
  <div class="site-wrapper">

    <?php part("header"); ?>

    <main data-barba="container" data-barba-namespace="notfound">
      <header class="lower-header">
        <div class="inner">
          <h1>ページが見つかりません</h1>
        </div>
      </header>

      <nav class="breadcrumb" aria-label="パンくずリストのナビゲーション">
        <ol>
          <li property="itemListElement">
            <a href="/" property="item">ホーム</a>
          </li>
          <li property="itemListElement">
            <span aria-current="page" property="item">404: Not Found</span>
          </li>
        </ol>
      </nav>

      <nav class="breadcrumb" aria-label="パンくずリストのナビゲーション">
        <ol itemscope="itemscope" itemtype="http://schema.org/BreadcrumbList">
          <li property="itemListElement" itemprop="itemListElement" itemscope="itemscope" itemtype="http://schema.org/ListItem">
            <a href="/" itemprop="item">
              <span itemprop="name">ホーム</span>
            </a>
            <meta itemprop="position" content="1" />
          </li>
          <li property="itemListElement" itemprop="itemListElement" itemscope="itemscope" itemtype="http://schema.org/ListItem">
            <a href="#" aria-current="page" itemprop="item" tabindex="-1">
              <span itemprop="name">404: Not Found</span>
            </a>
            <meta itemprop="position" content="2" />
          </li>
        </ol>
      </nav>

      <section class="notfound">
        <div class="inner">
          <h2>お探しのページは見つかりませんでした。</h2>
          <a href="/" class="top-btn">トップページへ戻る</a>
        </div>
      </section>
    </main>

    <?php part("footer"); ?>
    <?php part("loading-mask"); ?>
  </div>

  <?php wp_footer(); ?>
  <?php part("scripts"); ?>
</body>

</html>