<!DOCTYPE html>
<html lang="ja">

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <?php part("links"); ?>
  <?php part("analytics"); ?>
  <?php wp_head(); ?>
</head>

<body class="front-page">
  <div class="site-wrapper">
    <?php part("header"); ?>

    <main>
      <div id="index1" class="splide js-section js-top-splide">
        <div class="splide-slider splide__track">
          <ul class="splide__list">
            <li class="splide__slide">
              <picture>
                <source srcset="/assets/images/top/business01.jpg" media="(max-width: 750px)" width="" height="">
                <img src="/assets/images/top/business01.jpg" alt="" width="" height="">
              </picture>
              <div class="splide-text-area">
                <p>これまでの日本の<br class="sp">スポーツ施設の概念に<br>とらわれない新しい空間を<br class="sp">目指す</p>
              </div>
            </li>
            <li class="splide__slide">
              <picture>
                <source srcset="/assets/images/top/support01.jpg" media="(max-width: 750px)" width="" height="">
                <img src="/assets/images/top/support01.jpg" alt="" width="" height="">
              </picture>
              <div class="splide-text-area">
                <p>スポーツの興奮、<br class="sp">コンサートの熱狂、<br class="sp">新しいビジネスとの出会い<br>「さが躍動」の実現に向けた<br class="sp">整備面積約27.4haの<br class="sp">全体マネジメント</p>
              </div>
            </li>
            <li class="splide__slide">
              <picture>
                <source srcset="/assets/images/dummy/images/noimage-600x400.jpg" media="(max-width: 750px)" width="" height="">
                <img src="/assets/images/dummy/images/noimage-600x400.jpg" alt="" width="" height="">
              </picture>
              <div class="splide-text-area">
                <p>妹島和世氏設計による<br class="sp">大学の新しいシンボル<br>新図書館の建築プロジェクト<br class="sp">を支援</p>
              </div>
            </li>
          </ul>
        </div>

        <div class="splide__arrows">
          <button class="splide__arrow splide__arrow--prev">Prev</button>
          <button class="splide__toggle" type="button">
            <span class="splide__toggle__play">Play</span>
            <span class="splide__toggle__pause">Pause</span>
          </button>
          <button class="splide__arrow splide__arrow--next">Next</button>
        </div>
      </div>

      <section id="index2" class="news js-section" aria-labelledby="heading-id2">
        <div class="inner">
          <div class="c_sec-title" data-anime="false">
            <span class="title-en">INFORMATION</span>
            <h2 class="title-ja" id="heading-id2">お知らせ</h2>
          </div>
          <div role="tablist" data-anime="false">
            <button id="tab-1" role="tab" aria-controls="panel-1" aria-selected="true">すべて</button>
            <button id="tab-2" role="tab" aria-controls="panel-2" aria-selected="false">ニュース</button>
            <button id="tab-3" role="tab" aria-controls="panel-3" aria-selected="false">講演</button>
          </div>
          <div id="panel-1" role="tabpanel" aria-labelledby="tab-1" data-anime="false">
            <div class="inner">
              <?php $posts = Site\get_news_posts(4); ?>
              <?php if ($posts) { ?>
                <ul>
                  <?php foreach ($posts as $post) { ?>
                    <?php setup_postdata($post); ?>
                    <li>
                      <a href="<?php the_permalink(); ?>">
                        <time itemprop="datePublished" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
                        <p><?php the_title(); ?></p>
                      </a>
                    </li>
                  <?php }; ?>
                  <?php wp_reset_postdata(); ?>
                </ul>
              <?php } else { ?>
                <p class="empty-text">現在投稿はありません。</p>
              <?php }; ?>
            </div>
          </div>
          <div id="panel-2" role="tabpanel" aria-labelledby="tab-2" hidden data-anime="false">
            <div class="inner">
              <?php $posts = Site\get_news_posts(4, "news"); ?>
              <?php if ($posts) { ?>
                <ul>
                  <?php foreach ($posts as $post) { ?>
                    <?php setup_postdata($post); ?>
                    <li>
                      <a href="<?php the_permalink(); ?>">
                        <time itemprop="datePublished" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
                        <p><?php the_title(); ?></p>
                      </a>
                    </li>
                  <?php }; ?>
                  <?php wp_reset_postdata(); ?>
                </ul>
              <?php } else { ?>
                <p class="empty-text">現在投稿はありません。</p>
              <?php }; ?>
            </div>
          </div>
          <div id="panel-3" role="tabpanel" aria-labelledby="tab-3" hidden data-anime="false">
            <div class="inner">
              <?php $posts = Site\get_news_posts(4, "kouen"); ?>
              <?php if ($posts) { ?>
                <ul>
                  <?php foreach ($posts as $post) { ?>
                    <?php setup_postdata($post); ?>
                    <li>
                      <a href="<?php the_permalink(); ?>">
                        <time itemprop="datePublished" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
                        <p><?php the_title(); ?></p>
                      </a>
                    </li>
                  <?php }; ?>
                  <?php wp_reset_postdata(); ?>
                </ul>
              <?php } else { ?>
                <p class="empty-text">現在投稿はありません。</p>
              <?php }; ?>
            </div>
          </div>
          <div class="c_btn-more" data-anime="false">
            <a href="/news/" aria-label="お知ら一覧ページを見る">MORE</a>
          </div>
        </div>
      </section>

      <section id="index3" class="sec_support js-section" aria-labelledby="heading-id3" data-anime="false">
        <div class="support-img">
          <picture>
            <source srcset="/assets/images/top/sp/support01.jpg" media="(max-width: 750px)" />
            <img src="/assets/images/top/support01.jpg" alt="">
          </picture>
        </div>
        <div class="inner">
          <div class="c_sec-title">
            <h2 class="title-ja-second" id="heading-id3">3つのサポート</h2>
            <span class="title-en-second">SUPPORT</span>
          </div>
          <ul class="support-list">
            <li>
              <p class="head">RMサポート契約</p>
              <p class="text">企業の成長を支えるパートナーとして、リスクの洗い出しから回避もしくは最小化する対策までトータルにサポートします。</p>
              <div class="c_btn-more">
                <a href="/support/rm/">MORE</a>
              </div>
            </li>
            <li>
              <p class="head">IPOサポート契約</p>
              <p class="text">ベンチャーから中小企業や大企業まで、企業の成長段階に合わせて上場に向けたあらゆる課題の解決策をご提案します。</p>
              <div class="c_btn-more">
                <a href="/support/ipo/">MORE</a>
              </div>
            </li>
            <li>
              <p class="head">労務サポート契約</p>
              <p class="text">複雑化している人事・労務分野の問題に対し、同分野に精通した弁護士が最良のリーガルサービスを継続的にご提供します。</p>
              <div class="c_btn-more">
                <a href="/support/ls/">MORE</a>
              </div>
            </li>
          </ul>
        </div>
      </section>

      <section id="index4" class="sec_business js-section" aria-labelledby="heading-id4" data-anime="false">

        <div class="link-block">
          <div class="business-img">
            <picture>
              <source srcset="/assets/images/top/business01.jpg" media="(max-width: 750px)" />
              <img src="/assets/images/top/business01.jpg" alt="">
            </picture>
          </div>

          <div class="inner">
            <div class="c_sec-title js_fadeIn">
              <h2 class="title-ja-second" id="heading-id4">主な取扱業務</h2>
              <span class="title-en-second">BUSINESS</span>
            </div>
            <p class="sec-lead js_fadeIn">プロフェッショナルが、<br>あなたの企業経営をサポートいたします。</p>
            <ul class="link-list js_fadeToTop">
              <li class="c_btn01"><a href="/practices/#sec_practices01">リスクマネジメント</a></li>
              <li class="c_btn01"><a href="/practices/#sec_practices02">人事・労務</a></li>
              <li class="c_btn01"><a href="/practices/#sec_practices03">不正調査</a></li>
              <li class="c_btn01"><a href="/practices/#sec_practices04">コーポレートガバナンス</a></li>
              <li class="c_btn01"><a href="/practices/#sec_practices05">M & A</a></li>
              <li class="c_btn01"><a href="/practices/#sec_practices06">情報管理</a></li>
              <li class="c_btn01"><a href="/practices/#sec_practices07">ビジネスの適法性検討</a></li>
              <li class="c_btn01"><a href="/practices/#sec_practices08">訴訟・交渉対応</a></li>
              <li class="c_btn01"><a href="/practices/#sec_practices09">研修セミナー</a></li>
            </ul>
          </div>
        </div>
      </section>

      <section class="contact">
        <div class="inner">
          <a href="/contact/" data-anime="false">CONTACT</a>
          <p data-anime="false">まずは、お気軽にお問い合わせください。<br>お急ぎの方は 03-6452-9681 <br class="sp">までお問い合わせください。</p>
        </div>
      </section>
    </main>

    <?php part("footer"); ?>
  </div>

  <?php wp_footer(); ?>
  <?php part("scripts"); ?>
</body>

</html>