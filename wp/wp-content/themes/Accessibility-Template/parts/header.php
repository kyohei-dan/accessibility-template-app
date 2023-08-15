<header class="site-header">
  <div class="inner">
    <?php $url = $_SERVER["REQUEST_URI"]; ?>
    <?php echo $url === "/" ? '<h1>' : '<div class="logo">'; ?>
    <a href="/">
      Accessibility Template
    </a>
    <?php echo $url === "/" ? '</h1>' : '</div>'; ?>

    <button class="sp drawer-btn js-drawer-btn" type="button" aria-label="ナビゲーションメニュー" aria-controls="global-nav" aria-expanded="false">
      <span class="drawer-line">
        <span class="visually-hidden">
          メニューを開閉する
        </span>
      </span>
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
    </nav>
  </div>
</header>