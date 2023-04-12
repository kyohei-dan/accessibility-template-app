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
            <span aria-current="page" property="item">お問い合わせ（確認）</span>
          </li>
        </ol>
      </nav>

      <section class="confirm">
        <div class="inner">
          <p class="lead">以下の内容で送信してよろしいですか？</p>
          <form method="post" action="./" id="contact-form" novalidate>
            <dl>
              <div data-name="type">
                <dt>お問い合わせ項目</dt>
                <dd><?php echo h(el($data, 'type')); ?></dd>
              </div>
              <div>
                <dt>会社名</dt>
                <dd><?php echo h(el($data, 'corp')); ?></dd>
              </div>
              <div>
                <dt>お名前</dt>
                <dd class="td-name"><?php echo h(el($data, 'name')); ?></dd>
              </div>
              <div>
                <dt>ふりがな</dt>
                <dd class="td-name"><?php echo h(el($data, 'furigana')); ?></dd>
              </div>
              <div>
                <dt>電話番号</dt>
                <dd><?php echo h(el($data, 'tel')); ?></dd>
              </div>
              <div>
                <dt class="check">メールアドレス</dt>
                <dd><?php echo h(el($data, 'email1')); ?></dd>
              </div>
              <div>
                <dt>お問い合わせ内容</dt>
                <dd><?php echo h(el($data, 'message')); ?></dd>
              </div>
            </dl>
            </table>
            <?php foreach ($data as $key => $value) : ?>
              <input type="hidden" name="<?php echo $key; ?>" value="<?php echo h($value); ?>">
            <?php endforeach; ?>
            <div class="submit-button">
              <button type="submit" name="action" value="back" class="back">戻る</button>
              <button type="submit" name="action" value="send">送信</button>
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