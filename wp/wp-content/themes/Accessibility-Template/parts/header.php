<header class="site-header">
  <div class="inner">
    <a class="skip-link" href="#contents">メインコンテンツにスキップ</a>

    <?php $url = $_SERVER["REQUEST_URI"]; ?>
    <?php echo $url === "/" ? '<h1>' : '<div class="logo">'; ?>
    <a href="/">
      Accessibility Template
    </a>
    <?php echo $url === "/" ? '</h1>' : '</div>'; ?>

    <button class="sp drawer-button js-drawer-button" type="button" aria-label="ナビゲーションメニュー" aria-controls="global-nav" aria-expanded="false">
      <svg aria-hidden="true" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
        <rect width="18" height="1.5" fill="currentColor" ry="0.75" x="3" y="6.25" />
        <rect width="18" height="1.5" fill="currentColor" ry="0.75" x="3" y="11.25" />
        <rect width="18" height="1.5" fill="currentColor" ry="0.75" x="3" y="16.25" />
      </svg>
    </button>

    <nav id="global-nav" aria-label="メインのナビゲーション">
      <ul class="global-menu-list js-global-menu-list">
        <li class="js-global-menu-list-item">
          <a href="/#index1" data-link-id="index1" data-smooth>ホーム</a>
        </li>
        <li class="js-global-menu-list-item">
          <a href="/news/" data-link-id="index2">お知らせ</a>
        </li>
        <li class="js-global-menu-list-item">
          <button type="button" data-link-id="index3" class="js-nav-detail-open-button" aria-expanded="false" aria-haspopup="true" aria-label="サポートのメニューを開閉する">サポート</button>
          <section class="nav-detail js-nav-detail" aria-hidden="true">
            <div class="nav-detail-content">
              <div class="nav-detail-content-header">
                <h2 id="nav-heading">サポート</h2>
                <p>主なサポート内容を紹介します。</p>
                <a href="/#index3">サポート一覧</a>
              </div>
              <ul>
                <li><a href="">顧問契約サポート</a></li>
                <li><a href="">労務管理サポート</a></li>
                <li><a href="">契約サポート</a></li>
              </ul>
            </div>
            <button type="button" class="js-nav-detail-close-button" aria-label="サポートのメニューを閉じる">閉じる</button>
          </section>
        </li>
        <li class="js-global-menu-list-item">
          <a href="/#index4" data-link-id="index4" data-smooth>取扱業務</a>
        </li>
        <li class="js-global-menu-list-item">
          <a href="/#index5" data-link-id="index5" data-smooth>よくある質問</a>
        </li>
        <li class="js-global-menu-list-item">
          <a href="/company/">会社概要</a>
        </li>
        <li class="js-global-menu-list-item">
          <a href="/contact/">お問い合わせ</a>
        </li>
      </ul>
      <div class="js-focus-trap" tabindex="0"></div>
      <button type="button" class="drag-handle">
        <span></span>
      </button>
    </nav>
  </div>
</header>