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
            <div>
              <dt>社名</dt>
              <dd>株式会社サンプル</dd>
            </div>
            <div>
              <dt>所在地</dt>
              <dd><data value="000-0000">〒000-0000</data><br>大阪府大阪市中央区大阪城1-1</dd>
            </div>
            <div>
              <dt>設立</dt>
              <dd>2023年1月1日</dd>
            </div>
            <div>
              <dt>電話</dt>
              <dd>000-0000-0000</dd>
            </div>
            <div>
              <dt>代表取締役</dt>
              <dd>サンプル</dd>
            </div>
            <div>
              <dt>取引銀行</dt>
              <dd>サンプル銀行</dd>
            </div>
            <div>
              <dt>資本金</dt>
              <dd>1000万円</dd>
            </div>
            <div>
              <dt>問い合わせ</dt>
              <dd>info@sample.com</dd>
            </div>
            <div>
              <dt>事業内容</dt>
              <dd>
                サンプル事業
              </dd>
            </div>
          </dl>
          <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6561.4675086751095!2d135.52228584738896!3d34.686668541698474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6000e0cd5c283afd%3A0xf01d07d5ca11e41!2z5aSn6Ziq5Z-O!5e0!3m2!1sja!2sjp!4v1684897230872!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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