<!DOCTYPE html>
<html lang="ja">

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta name="robots" content="noindex">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <?php part("links"); ?>
  <?php part("analytics"); ?>
  <?php wp_head(); ?>
</head>

<body class="chat">
  <div class="site-wrapper">
    <main>
      <div class="inner">
        <div class="chat-contents">
          <ul class="js-chat-list"></ul>
          <div class="loader js-loader">
            <div class="one"></div>
            <div class="two"></div>
            <div class="three"></div>
            <div class="four"></div>
          </div>
        </div>

        <div class="typing-container">
          <div class="typing-content">
            <div class="typing-textarea">
              <textarea class="js-chat-input" id="chat-input" spellcheck="false" placeholder="入力してください" required></textarea>
              <span id="send-btn" class="material-symbols-rounded js-send-button">send</span>
            </div>
            <div class="typing-controls">
              <span class="material-symbols-rounded js-theme-button">light_mode</span>
              <span class="material-symbols-rounded js-reset-button">delete</span>
            </div>
          </div>
          <div class="post">
            <button type="button" class="post-button js-post-button">
              WordPressへ投稿
              <svg class="checkmark js-checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                <circle class="checkmark-circle" cx="26" cy="26" r="25" fill="none"></circle>
                <path class="checkmark-check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"></path>
              </svg>
            </button>
          </div>
        </div>
      </div>
    </main>

    <div class="toast js-toast">
      <i class="fas fa-solid fa-check check"></i>
      <div class="message">
        <span class="text">WordPressへ投稿しました！</span>
      </div>
    </div>

  </div>

  <?php wp_footer(); ?>
  <script src="https://cdn.jsdelivr.net/npm/marked@4.3.0/lib/marked.umd.min.js"></script>
  <script src="/assets/js/gpt-setting.js" defer></script>
</body>

</html>