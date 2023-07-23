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

<body class="company" data-barba="wrapper">
  <div class="site-wrapper">

    <?php part("header"); ?>

    <main data-barba="container" data-barba-namespace="company">
      <header class="lower-header">
        <div class="inner">
          <h1>会社概要</h1>
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
            <a href="/company/" aria-current="page" itemprop="item" tabindex="-1">
              <span itemprop="name">会社概要</span>
            </a>
            <meta itemprop="position" content="2" />
          </li>
        </ol>
      </nav>

      <section class="outline" aria-label="会社概要">
        <div class="inner">
          <dl class="outline-list">
            <?php if (!empty(get_field('name'))) { ?>
              <div>
                <dt>社名</dt>
                <dd><?php the_field('name'); ?></dd>
              </div>
            <?php } ?>

            <?php if (!empty(get_field('post'))) { ?>
              <div>
                <dt>所在地</dt>
                <dd><data value="<?php the_field('post'); ?>">〒<?php the_field('post'); ?></data><br><?php the_field('location'); ?></dd>
              </div>
            <?php } ?>

            <?php if (!empty(get_field('foundation'))) { ?>
              <div>
                <dt>設立</dt>
                <dd><?php the_field('foundation'); ?></dd>
              </div>
            <?php } ?>

            <?php if (!empty(get_field('tel'))) { ?>
              <div>
                <dt>電話</dt>
                <dd><?php the_field('tel'); ?></dd>
              </div>
            <?php } ?>

            <?php if (!empty(get_field('ceo'))) { ?>
              <div>
                <dt>代表取締役</dt>
                <dd><?php the_field('ceo'); ?></dd>
              </div>
            <?php } ?>

            <?php if (!empty(get_field('bank'))) { ?>
              <div>
                <dt>取引銀行</dt>
                <dd><?php the_field('bank'); ?></dd>
              </div>
            <?php } ?>

            <?php if (!empty(get_field('capital'))) { ?>
              <div>
                <dt>資本金</dt>
                <dd><?php the_field('capital'); ?></dd>
              </div>
            <?php } ?>

            <?php if (!empty(get_field('contact'))) { ?>
              <div>
                <dt>問い合わせ</dt>
                <dd><?php the_field('contact'); ?></dd>
              </div>
            <?php } ?>

            <?php if (!empty(get_field('business_content'))) { ?>
              <div>
                <dt>事業内容</dt>
                <dd><?php the_field('business_content'); ?></dd>
              </div>
            <?php } ?>
          </dl>

          <div class="map">
            <?php if (!empty(get_field('google_maps_url'))) { ?>
              <iframe src="<?php the_field('google_maps_url'); ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <?php } ?>
          </div>
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