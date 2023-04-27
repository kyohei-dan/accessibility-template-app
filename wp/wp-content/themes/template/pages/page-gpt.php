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

<body class="chat">
  <div class="site-wrapper">
    <!-- <aside>
      <div class="inner">
        <button type="button" class="new-chat-btn">New chat</button>
        <ul>
          <li>
            <a>test</a>
          </li>
          <li>
            <a>test</a>
          </li>
          <li>
            <a>test</a>
          </li>
        </ul>
      </div>
    </aside> -->

    <main>
      <div class="inner">
        <div class="chat-contents">
          <ul class="js-chat-list">
          </ul>
          <div class="loader js-loader">
            <div class="one"></div>
            <div class="two"></div>
            <div class="three"></div>
            <div class="four"></div>
          </div>
        </div>

        <div class="form">
          <form class="chat-form">
            <textarea class="chat-input js-chat-input" placeholder="内容を入力してください..."></textarea>
          </form>

          <div class="post">
            <button type="button" class="reset-button js-reset-button">すべてリセット</button>
            <button type="button" class="post-button js-post-button">
              WordPressへ投稿
              <svg class="checkmark js-checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                <circle class="checkmark-circle" cx="26" cy="26" r="25" fill="none"></circle>
                <path class="checkmark-check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"></path>
              </svg>
            </button>
            <button type="button" class="send-button js-send-button" disabled>送信</button>
          </div>
        </div>
      </div>
    </main>
  </div>

  <?php wp_footer(); ?>
  <script src="/assets/js/libs/marked.min.js" defer></script>
  <script src="/assets/js/gpt.js" defer></script>
</body>

</html>