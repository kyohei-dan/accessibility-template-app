<!DOCTYPE html>
<html lang="ja">

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
  <meta name="format-detection" content="telephone=no">
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
          <h1>お問い合わせ</h1>
        </div>
      </header>

      <nav class="breadcrumb" aria-label="パンくずリストのナビゲーション">
        <ol>
          <li property="itemListElement">
            <a href="/" property="item">ホーム</a>
          </li>
          <li property="itemListElement">
            <span aria-current="page" property="item">お問い合わせ（入力）</span>
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

          <form method="post" action="">
            <dl>
              <div class="type">
                <dt>お問い合わせ項目</dt>
                <dd>
                  <label>
                    <input type="radio" name="type" value="商品について" <?php if (el($data, 'type') === '商品について') echo 'checked'; ?>>
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
                  <?php if (isset($errors["type"])) { ?>
                    <p class="error"><?php echo $errors["type"]; ?></p>
                  <?php }; ?>
                </dd>
              </div>
              <div>
                <dt>会社名</dt>
                <dd>
                  <input type="text" name="corp" value="<?php echo h(el($data, 'corp')); ?>">
                  <?php if (isset($errors["corp"])) { ?>
                    <p class="error"><?php echo $errors["corp"]; ?></p>
                  <?php }; ?>
                </dd>
              </div>
              <div>
                <dt>お名前</dt>
                <dd>
                  <input type="text" name="name" value="<?php echo h(el($data, 'name')); ?>">
                  <?php if (isset($errors["name"])) { ?>
                    <p class="error"><?php echo $errors["name"]; ?></p>
                  <?php }; ?>
                </dd>
              </div>
              <div>
                <dt>ふりがな</dt>
                <dd>
                  <input type="text" name="furigana" value="<?php echo h(el($data, 'furigana')); ?>">
                  <?php if (isset($errors["furigana"])) { ?>
                    <p class="error"><?php echo $errors["furigana"]; ?></p>
                  <?php }; ?>
                </dd>
              </div>
              <div>
                <dt>電話番号</dt>
                <dd>
                  <input type="tel" name="tel" value="<?php echo h(el($data, 'tel')); ?>">
                  <p>ハイフン（－）なし</p>
                  <?php if (isset($errors["tel"])) { ?>
                    <p class="error"><?php echo $errors["tel"]; ?></p>
                  <?php }; ?>
                </dd>
              </div>
              <div>
                <dt>メールアドレス</dt>
                <dd>
                  <input type="email" name="email1" value="<?php echo h(el($data, 'email1')); ?>">
                  <?php if (isset($errors["email1"])) { ?>
                    <p class="error"><?php echo $errors["email1"]; ?></p>
                  <?php }; ?>
                </dd>
              </div>
              <div>
                <dt class="check">メールアドレス</dt>
                <dd>
                  <input type="email" name="email2" value="<?php echo h(el($data, 'email2')); ?>">
                  <?php if (isset($errors["email2"])) { ?>
                    <p class="error"><?php echo $errors["email2"]; ?></p>
                  <?php }; ?>
                </dd>
              </div>
              <div>
                <dt>お問い合わせ内容</dt>
                <dd><textarea name="message"><?php echo h(el($data, 'message')); ?></textarea>
                  <?php if (isset($errors["message"])) { ?>
                    <p class="error"><?php echo $errors["message"]; ?></p>
                  <?php }; ?>
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
                <input class="js-checkbox" type="checkbox" autocomplete="off">
                <span class="icon"></span>
                <span class="text">上記個人情報の取り扱いについて同意する</span>
              </label>
            </div>

            <div class="submit-button">
              <button class="js-submit-button" type="submit" name="action" value="confirm" disabled="true">確認画面へ進む</button>
            </div>
          </form>
        </div>
      </section>
    </main>

    <?php part("footer"); ?>
  </div>

  <?php wp_footer(); ?>
  <?php part("scripts"); ?>
</body>

</html>