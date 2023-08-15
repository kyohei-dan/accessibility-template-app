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

    <main>
      <header class="lower-header">
        <div class="inner">
          <h1 id="formTitle">お問い合わせ</h1>
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
              <span itemprop="name">お問い合わせ（入力）</span>
            </a>
            <meta itemprop="position" content="2" />
          </li>
        </ol>
      </nav>

      <section class="input">
        <div class="inner">
          <p class="lead">
            当社ウェブサイトをご利用いただき、ありがとうございます。<br aria-hidden="true">
            各種お問い合わせについては、それぞれ該当項目をご確認の上、お問い合わせフォームをご利用ください。
            <span>※全て必須項目となります。</span>
          </p>

          <form method="post" action="" aria-labelledby="formTitle">
            <dl>
              <fieldset class="type">
                <dt>
                  <legend>お問い合わせ項目</legend>
                </dt>
                <dd>
                  <label>
                    <input type="radio" name="type" value="商品について" <?php if (el($data, 'type') === '商品について') echo 'checked'; ?> required aria-required="true">
                    <span class="icon"></span>
                    <span class="text">商品について</span>
                  </label>
                  <label>
                    <input type="radio" name="type" value="採用について" <?php if (el($data, 'type') === '採用について') echo 'checked'; ?>>
                    <span class="icon"></span>
                    <span class="text">採用について</span>
                  </label>
                  <label>
                    <input type="radio" name="type" value="仕事について" <?php if (el($data, 'type') === '仕事について') echo 'checked'; ?>>
                    <span class="icon"></span>
                    <span class="text">仕事について</span>
                  </label>
                  <label>
                    <input type="radio" name="type" value="その他" <?php if (el($data, 'type') === 'その他') echo 'checked'; ?>>
                    <span class="icon"></span>
                    <span class="text">その他</span>
                  </label>
                  <span aria-live="polite" role="status">
                    <?php if (isset($errors["type"])) { ?>
                      <span class="error-message js-error-message" aria-hidden="false">お問い合わせ項目を選択してください</span>
                    <?php }; ?>
                    <span class="error-message js-error-message" aria-hidden="true">お問い合わせ項目を選択してください</span>
                    <span class="ok-message js-ok-message" aria-hidden="true">OK</span>
                  </span>
                </dd>
              </fieldset>
              <div>
                <dt><label for="corp">会社名</label></dt>
                <dd>
                  <input id="corp" type="text" name="corp" value="<?php echo h(el($data, 'corp')); ?>" required aria-required="true">
                  <span aria-live="polite" role="status">
                    <?php if (isset($errors["corp"])) { ?>
                      <span class="error-message js-error-message" aria-hidden="false">会社名を入力してください</span>
                    <?php }; ?>
                    <span class="error-message js-error-message" aria-hidden="true">会社名を入力してください</span>
                    <span class="ok-message js-ok-message" aria-hidden="true">OK</span>
                  </span>
                </dd>
              </div>
              <div>
                <dt><label for="name">お名前</label></dt>
                <dd>
                  <input id="name" type="text" name="name" value="<?php echo h(el($data, 'name')); ?>" required aria-required="true">
                  <span aria-live="polite" role="status">
                    <?php if (isset($errors["name"])) { ?>
                      <span class="error-message js-error-message" aria-hidden="false">お名前を入力してください</span>
                    <?php }; ?>
                    <span class="error-message js-error-message" aria-hidden="true">お名前を入力してください</span>
                    <span class="ok-message js-ok-message" aria-hidden="true">OK</span>
                  </span>
                </dd>
              </div>
              <div>
                <dt><label for="furigana">ふりがな</label></dt>
                <dd>
                  <input id="furigana" type="text" name="furigana" value="<?php echo h(el($data, 'furigana')); ?>" required aria-required="true">
                  <span aria-live="polite" role="status">
                    <?php if (isset($errors["furigana"])) { ?>
                      <span class="error-message js-error-message" aria-hidden="false">ふりがなを入力してください</span>
                    <?php }; ?>
                    <span class="error-message js-error-message" aria-hidden="true">ふりがなを入力してください</span>
                    <span class="ok-message js-ok-message" aria-hidden="true">OK</span>
                  </span>
                </dd>
              </div>
              <div>
                <dt><label for="tel">電話番号</label></dt>
                <dd>
                  <input id="tel" type="tel" name="tel" value="<?php echo h(el($data, 'tel')); ?>" required aria-required="true" pattern="\d{2,4}-?\d{2,4}-?\d{3,4}">
                  <span aria-live="polite" role="status">
                    <?php if (isset($errors["tel"])) { ?>
                      <span class="error-message js-error-message" aria-hidden="false"><?php echo $errors["tel"]; ?></span>
                    <?php }; ?>
                    <span class="format-error-message js-format-error-message" aria-hidden="true">電話番号が正しく入力されていません</span>
                    <span class="error-message js-error-message" aria-hidden="true">電話番号を入力してください</span>
                    <span class="ok-message js-ok-message" aria-hidden="true">OK</span>
                  </span>
                </dd>
              </div>
              <div>
                <dt><label for="email1">メールアドレス</label></dt>
                <dd>
                  <input id="email1" type="email" name="email1" value="<?php echo h(el($data, 'email1')); ?>" required aria-required="true" pattern="([a-zA-Z0-9\+_\-]+)(\.[a-zA-Z0-9\+_\-]+)*@([a-zA-Z0-9\-]+\.)+[a-zA-Z]{2,6}" title="メールアドレスは、aaa@example.com のような形式で記入してください。">
                  <span aria-live="polite" role="status">
                    <?php if (isset($errors["email1"])) { ?>
                      <span class="error-message js-error-message" aria-hidden="false"><?php echo $errors["email1"]; ?></span>
                    <?php }; ?>
                    <span class="format-error-message js-format-error-message" aria-hidden="true">メールアドレスが正しく入力されていません</span>
                    <span class="error-message js-error-message" aria-hidden="true">メールアドレスを入力してください</span>
                    <span class="ok-message js-ok-message" aria-hidden="true">OK</span>
                  </span>
                </dd>
              </div>
              <div>
                <dt><label for="message">お問い合わせ内容</label></dt>
                <dd><textarea id="message" name="message" required aria-required="true"><?php echo h(el($data, 'message')); ?></textarea>
                  <?php if (isset($errors["message"])) { ?>
                    <p class="error"><?php echo $errors["message"]; ?></p>
                  <?php }; ?>
                  <span aria-live="polite" role="status">
                    <?php if (isset($errors["message"])) { ?>
                      <span class="error-message js-error-message" aria-hidden="false">お問い合わせ内容を入力してください</span>
                    <?php }; ?>
                    <span class="error-message js-error-message" aria-hidden="true">お問い合わせ内容を入力してください</span>
                    <span class="ok-message js-ok-message" aria-hidden="true">OK</span>
                  </span>
                </dd>
              </div>
            </dl>

            <section class="instruction">
              <dl>
                <dt>個人情報の取り扱いについて</dt>
                <dd>
                  入力されました個人情報は、○○が厳重に管理し、以下の活動に利用いたします。
                  <ol>
                    <li>サービスに関するお問い合わせ、ご相談などにお答えすること</li>
                    <li>セミナーの申込み受付対応、セミナー開催に関連する活動または当社の主催するセミナーのご案内</li>
                    <li>提供する商品・サービスに関するご案内など、各種情報のご提供及び訪問、電話による勧誘、電子メールによる勧誘等の営業活動</li>
                    <li>サービスの改善、又は新たなサービスの開発のために個人を特定しない統計情報の作成及び活用</li>
                  </ol>
                </dd>
              </dl>
            </section>

            <div class="agreement">
              <label>
                <input class="js-checkbox" type="checkbox" autocomplete="off" required aria-required="true">
                <span class="icon"></span>
                <span class="text">上記個人情報の取り扱いについて同意する</span>
              </label>
            </div>

            <div class="submit-button">
              <button class="js-submit-button" type="submit" name="action" value="confirm" aria-disabled="true">確認画面へ進む</button>
            </div>
          </form>
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