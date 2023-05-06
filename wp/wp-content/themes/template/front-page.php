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

<body class="front-page" data-barba="wrapper">
  <div class="site-wrapper">
    <?php part("header"); ?>

    <div data-barba="container" data-barba-namespace="top">

      <main>
        <div id="index1" class="splide js-section js-top-splide">
          <div class="splide-slider splide__track">
            <ul class="splide__list">
              <li class="splide__slide">
                <picture>
                  <source srcset="/assets/images/top/business01.jpg" media="(max-width: 750px)" width="" height="">
                  <img src="/assets/images/top/business01.jpg" alt="" width="" height="" decoding="async" fetchpriority="high">
                </picture>
                <div class="splide-text-area">
                  <p>この文章はダミー<br>です。文字の大きさ、量、字間、行間等を<br>確認するために入れています。</p>
                </div>
              </li>
              <li class="splide__slide">
                <picture>
                  <source srcset="/assets/images/top/support01.jpg" media="(max-width: 750px)" width="" height="">
                  <img src="/assets/images/top/support01.jpg" alt="" width="" height="" decoding="async" fetchpriority="high">
                </picture>
                <div class="splide-text-area">
                  <p>この文章はダミー<br>です。文字の大きさ、量、字間、行間等を<br>確認するために入れています。</p>
                </div>
              </li>
              <li class="splide__slide">
                <picture>
                  <source srcset="/assets/images/dummy/images/noimage-600x400.jpg" media="(max-width: 750px)" width="" height="">
                  <img src="/assets/images/dummy/images/noimage-600x400.jpg" alt="" width="" height="" decoding="async" fetchpriority="high">
                </picture>
                <div class="splide-text-area">
                  <p>この文章はダミー<br>です。文字の大きさ、量、字間、行間等を<br>確認するために入れています。</p>
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
            <h2 id="heading-id2">お知らせ</h2>
            <span class="title-en">INFORMATION</span>

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
                          <time aria-label="投稿日" itemprop="datePublished" datetime="<?php the_time('Y-m-d'); ?>T<?php the_time('H:i:sP'); ?>"><?php the_time('Y.m.d'); ?></time>
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
                          <time aria-label="投稿日" itemprop="datePublished" datetime="<?php the_time('Y-m-d'); ?>T<?php the_time('H:i:sP'); ?>"><?php the_time('Y.m.d'); ?></time>
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
                          <time aria-label="投稿日" itemprop="datePublished" datetime="<?php the_time('Y-m-d'); ?>T<?php the_time('H:i:sP'); ?>"><?php the_time('Y.m.d'); ?></time>
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
            <a href="/news/" class="more-btn" aria-label="お知らせ一覧ページを見る">
              MORE
              <svg aria-hidden="true" viewBox="0 0 50.827 11.375">
                <line x2="50" transform="translate(0 5.328)" fill="none" stroke="#fff" stroke-width="1" />
                <path d="M0,6.987,5.295,0l5.283,6.987" transform="translate(49.999) rotate(90)" fill="none" stroke="#fff" stroke-width="1" />
              </svg>
            </a>
          </div>
        </section>

        <section id="index3" class="support js-section" aria-labelledby="heading-id3" data-anime="false">
          <div class="support-img" aria-hidden="true" data-anime="false">
            <picture>
              <source srcset="/assets/images/top/sp/support01.jpg" media="(max-width: 750px)" width="1130" height="400" />
              <img src="/assets/images/top/support01.jpg" alt="" width="1130" height="400" loading="lazy" decoding="async">
            </picture>
          </div>

          <div class="inner">
            <h2 id="heading-id3">3つのサポート</h2>
            <span class="title-en">SUPPORT</span>
            <ul>
              <li>
                <h3>顧問契約サポート</h3>
                <p>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。</p>
                <a href="" aria-label="詳しく見る">
                  MORE
                  <svg aria-hidden="true" viewBox="0 0 50.827 11.375">
                    <line x2="50" transform="translate(0 5.328)" fill="none" stroke="#fff" stroke-width="1" />
                    <path d="M0,6.987,5.295,0l5.283,6.987" transform="translate(49.999) rotate(90)" fill="none" stroke="#fff" stroke-width="1" />
                  </svg>
                </a>
              </li>
              <li>
                <h3>労務管理サポート</h3>
                <p>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。</p>
                <a href="" aria-label="詳しく見る">
                  MORE
                  <svg aria-hidden="true" viewBox="0 0 50.827 11.375">
                    <line x2="50" transform="translate(0 5.328)" fill="none" stroke="#fff" stroke-width="1" />
                    <path d="M0,6.987,5.295,0l5.283,6.987" transform="translate(49.999) rotate(90)" fill="none" stroke="#fff" stroke-width="1" />
                  </svg>
                </a>
              </li>
              <li>
                <h3>契約サポート</h3>
                <p>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。</p>
                <a href="" aria-label="詳しく見る">
                  MORE
                  <svg aria-hidden="true" viewBox="0 0 50.827 11.375">
                    <line x2="50" transform="translate(0 5.328)" fill="none" stroke="#fff" stroke-width="1" />
                    <path d="M0,6.987,5.295,0l5.283,6.987" transform="translate(49.999) rotate(90)" fill="none" stroke="#fff" stroke-width="1" />
                  </svg>
                </a>
              </li>
            </ul>
          </div>
        </section>

        <section id="index4" class="business js-section" aria-labelledby="heading-id4" data-anime="false">
          <div class="business-img" aria-hidden="true">
            <picture>
              <source srcset="/assets/images/top/business01.jpg" media="(max-width: 750px)" width="" height="" />
              <img src="/assets/images/top/business01.jpg" alt="" width="" height="" loading="lazy" decoding="async">
            </picture>
          </div>

          <div class="inner">
            <h2 id="heading-id4">取扱業務</h2>
            <span class="title-en">BUSINESS</span>
            <ul>
              <li>
                <button type="button" class="js-modal-btn" aria-haspopup="dialog">
                  <span>経営法務支援</span>
                  <svg aria-hidden="true" viewBox="0 0 50.827 11.375">
                    <line x2="50" transform="translate(0 5.328)" fill="none" stroke="#000" stroke-width="1" />
                    <path d="M0,6.987,5.295,0l5.283,6.987" transform="translate(49.999) rotate(90)" fill="none" stroke="#000" stroke-width="1" />
                  </svg>
                </button>
              </li>
              <li>
                <button type="button" class="js-modal-btn" aria-haspopup="dialog">
                  <span>スタートアップ支援</span>
                  <svg aria-hidden="true" viewBox="0 0 50.827 11.375">
                    <line x2="50" transform="translate(0 5.328)" fill="none" stroke="#000" stroke-width="1" />
                    <path d="M0,6.987,5.295,0l5.283,6.987" transform="translate(49.999) rotate(90)" fill="none" stroke="#000" stroke-width="1" />
                  </svg>
                </button>
              </li>
              <li>
                <button type="button" class="js-modal-btn" aria-haspopup="dialog">
                  <span>経営コンサルティング</span>
                  <svg aria-hidden="true" viewBox="0 0 50.827 11.375">
                    <line x2="50" transform="translate(0 5.328)" fill="none" stroke="#000" stroke-width="1" />
                    <path d="M0,6.987,5.295,0l5.283,6.987" transform="translate(49.999) rotate(90)" fill="none" stroke="#000" stroke-width="1" />
                  </svg>
                </button>
              </li>
              <li>
                <button type="button" class="js-modal-btn" aria-haspopup="dialog">
                  <span>事業承認支援</span>
                  <svg aria-hidden="true" viewBox="0 0 50.827 11.375">
                    <line x2="50" transform="translate(0 5.328)" fill="none" stroke="#000" stroke-width="1" />
                    <path d="M0,6.987,5.295,0l5.283,6.987" transform="translate(49.999) rotate(90)" fill="none" stroke="#000" stroke-width="1" />
                  </svg>
                </button>
              </li>
              <li>
                <button type="button" class="js-modal-btn" aria-haspopup="dialog">
                  <span>一般民事・家事事件</span>
                  <svg aria-hidden="true" viewBox="0 0 50.827 11.375">
                    <line x2="50" transform="translate(0 5.328)" fill="none" stroke="#000" stroke-width="1" />
                    <path d="M0,6.987,5.295,0l5.283,6.987" transform="translate(49.999) rotate(90)" fill="none" stroke="#000" stroke-width="1" />
                  </svg>
                </button>
              </li>
              <li>
                <button type="button" class="js-modal-btn" aria-haspopup="dialog">
                  <span><abbr title="知的財産">知財</abbr>トラブル</span>
                  <svg aria-hidden="true" viewBox="0 0 50.827 11.375">
                    <line x2="50" transform="translate(0 5.328)" fill="none" stroke="#000" stroke-width="1" />
                    <path d="M0,6.987,5.295,0l5.283,6.987" transform="translate(49.999) rotate(90)" fill="none" stroke="#000" stroke-width="1" />
                  </svg>
                </button>
              </li>
              <li>
                <button type="button" class="js-modal-btn" aria-haspopup="dialog">
                  <span>倒産関連・M</span>
                  <svg aria-hidden="true" viewBox="0 0 50.827 11.375">
                    <line x2="50" transform="translate(0 5.328)" fill="none" stroke="#000" stroke-width="1" />
                    <path d="M0,6.987,5.295,0l5.283,6.987" transform="translate(49.999) rotate(90)" fill="none" stroke="#000" stroke-width="1" />
                  </svg>
                </button>
              </li>
              <li>
                <button type="button" class="js-modal-btn" aria-haspopup="dialog">
                  <span>労務管理&A</span>
                  <svg aria-hidden="true" viewBox="0 0 50.827 11.375">
                    <line x2="50" transform="translate(0 5.328)" fill="none" stroke="#000" stroke-width="1" />
                    <path d="M0,6.987,5.295,0l5.283,6.987" transform="translate(49.999) rotate(90)" fill="none" stroke="#000" stroke-width="1" />
                  </svg>
                </button>
              </li>
              <li>
                <button type="button" class="js-modal-btn" aria-haspopup="dialog">
                  <span>講演・セミナー</span>
                  <svg aria-hidden="true" viewBox="0 0 50.827 11.375">
                    <line x2="50" transform="translate(0 5.328)" fill="none" stroke="#000" stroke-width="1" />
                    <path d="M0,6.987,5.295,0l5.283,6.987" transform="translate(49.999) rotate(90)" fill="none" stroke="#000" stroke-width="1" />
                  </svg>
                </button>
              </li>
            </ul>
          </div>
        </section>

        <section id="index5" class="faq js-section" aria-labelledby="heading-id5" data-anime="false">
          <div class="inner">
            <h2 id="heading-id5">よくある質問</h2>
            <span class="title-en">FAQ</span>
            <details class="js-accordion">
              <summary class="js-accordion-title">質問タイトル①</summary>
              <div class="accordion-content js-accordion-content">
                <div class="content-inner">
                  <p>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。 この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。 この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。 この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。</p>
                </div>
              </div>
            </details>
            <details class="js-accordion">
              <summary class="js-accordion-title">質問タイトル②</summary>
              <div class="accordion-content js-accordion-content">
                <div class="content-inner">
                  <p>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。 この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。 この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。 この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。</p>
                </div>
              </div>
            </details>
            <details class="js-accordion">
              <summary class="js-accordion-title">質問タイトル③</summary>
              <div class="accordion-content js-accordion-content">
                <div class="content-inner">
                  <p>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。 この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。 この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。 この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。</p>
                </div>
              </div>
            </details>
          </div>
        </section>

        <div class="contact">
          <div class="inner">
            <a href="/contact/">CONTACT</a>
            <p>まずは、お気軽にお問い合わせください。<br aria-hidden="true">お急ぎの方は 00-0000-0000<br class="sp" aria-hidden="true"> までお問い合わせください。</p>
          </div>
        </div>

      </main>

      <div class="modal-bg js-modal-bg" tabindex="-1"></div>
      <div class="modal" aria-modal="false" aria-hidden="true" aria-labelledby="modal-id1">
        <div class="inner">
          <button class="modal-close-btn js-modal-close-btn" aria-label="モーダルを閉じる"></button>
          <h2 id="modal-id1">経営法務支援</h2>
          <dl>
            <dt>具体的なサポート内容</dt>
            <dd>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。 この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。 この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。 この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。</dd>
          </dl>
          <div class="js-modal-focus-trap" tabindex="0"></div>
        </div>
      </div>
      <div class="modal" aria-modal="false" aria-hidden="true" aria-labelledby="modal-id2">
        <div class="inner">
          <button class="modal-close-btn js-modal-close-btn" aria-label="モーダルを閉じる"></button>
          <h2 id="modal-id2">スタートアップ支援</h2>
          <dl>
            <dt>具体的なサポート内容</dt>
            <dd>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。 この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。 この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。 この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。</dd>
          </dl>
          <div class="js-modal-focus-trap" tabindex="0"></div>
        </div>
      </div>
      <div class="modal" aria-modal="false" aria-hidden="true" aria-labelledby="modal-id3">
        <div class="inner">
          <button class="modal-close-btn js-modal-close-btn" aria-label="モーダルを閉じる"></button>
          <h2 id="modal-id3">経営コンサルティング</h2>
          <dl>
            <dt>具体的なサポート内容</dt>
            <dd>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。 この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。 この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。 この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。</dd>
          </dl>
          <div class="js-modal-focus-trap" tabindex="0"></div>
        </div>
      </div>
      <div class="modal" aria-modal="false" aria-hidden="true" aria-labelledby="modal-id4">
        <div class="inner">
          <button class="modal-close-btn js-modal-close-btn" aria-label="モーダルを閉じる"></button>
          <h2 id="modal-id4">事業承認支援</h2>
          <dl>
            <dt>具体的なサポート内容</dt>
            <dd>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。 この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。 この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。 この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。</dd>
          </dl>
          <div class="js-modal-focus-trap" tabindex="0"></div>
        </div>
      </div>
      <div class="modal" aria-modal="false" aria-hidden="true" aria-labelledby="modal-id5">
        <div class="inner">
          <button class="modal-close-btn js-modal-close-btn" aria-label="モーダルを閉じる"></button>
          <h2 id="modal-id5">一般民事・家事事件</h2>
          <dl>
            <dt>具体的なサポート内容</dt>
            <dd>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。 この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。 この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。 この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。</dd>
          </dl>
          <div class="js-modal-focus-trap" tabindex="0"></div>
        </div>
      </div>
      <div class="modal" aria-modal="false" aria-hidden="true" aria-labelledby="modal-id6">
        <div class="inner">
          <button class="modal-close-btn js-modal-close-btn" aria-label="モーダルを閉じる"></button>
          <h2 id="modal-id6"><abbr title="知的財産">知財</abbr>トラブル</h2>
          <dl>
            <dt>具体的なサポート内容</dt>
            <dd>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。 この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。 この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。 この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。</dd>
          </dl>
          <div class="js-modal-focus-trap" tabindex="0"></div>
        </div>
      </div>
      <div class="modal" aria-modal="false" aria-hidden="true" aria-labelledby="modal-id7">
        <div class="inner">
          <button class="modal-close-btn js-modal-close-btn" aria-label="モーダルを閉じる"></button>
          <h2 id="modal-id7">倒産関連・M&A</h2>
          <dl>
            <dt>具体的なサポート内容</dt>
            <dd>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。 この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。 この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。 この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。</dd>
          </dl>
          <div class="js-modal-focus-trap" tabindex="0"></div>
        </div>
      </div>
      <div class="modal" aria-modal="false" aria-hidden="true" aria-labelledby="modal-id8">
        <div class="inner">
          <button class="modal-close-btn js-modal-close-btn" aria-label="モーダルを閉じる"></button>
          <h2 id="modal-id8">労務管理</h2>
          <dl>
            <dt>具体的なサポート内容</dt>
            <dd>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。 この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。 この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。 この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。</dd>
          </dl>
          <div class="js-modal-focus-trap" tabindex="0"></div>
        </div>
      </div>
      <div class="modal" aria-modal="false" aria-hidden="true" aria-labelledby="modal-id9">
        <div class="inner">
          <button class="modal-close-btn js-modal-close-btn" aria-label="モーダルを閉じる"></button>
          <h2 id="modal-id9">講演・セミナー</h2>
          <dl>
            <dt>具体的なサポート内容</dt>
            <dd>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。 この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。 この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。 この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。</dd>
          </dl>
          <div class="js-modal-focus-trap" tabindex="0"></div>
        </div>
      </div>
    </div>


    <?php part("footer"); ?>
    <?php part("loading-mask"); ?>
  </div>

  <?php wp_footer(); ?>
  <?php part("scripts"); ?>
</body>

</html>