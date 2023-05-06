<header class="site-header">
  <div class="inner">
    <?php $url = $_SERVER["REQUEST_URI"]; ?>
    <?php echo $url === "/" ? '<h1>' : '<div class="logo">'; ?>
    <a href="/">
      template
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
          <a href="/#index1" data-link-id="index1" data-barba-prevent>ホーム</a>
        </li>
        <li class="js-global-menu-list-item">
          <a href="/#index2" data-link-id="index2" data-barba-prevent>お知らせ</a>
        </li>
        <li class="js-global-menu-list-item">
          <a href="/#index3" data-link-id="index3" data-barba-prevent>サポート</a>
          <section class="nav-detail" aria-hidden="true">
            <div class="nav-detail-content">
              <div class="nav-detail-content-header">
                <h2 id="nav-heading">サポート</h2>
                <p>主なサポート内容を紹介します。</p>
                <a href="">サポート一覧</a>
              </div>
              <ul>
                <li><a href="">顧問契約サポート</a></li>
                <li><a href="">労務管理サポート</a></li>
                <li><a href="">契約サポート</a></li>
              </ul>
            </div>
            <button type="button" aria-label="サポートのメニューを閉じる">閉じる</button>
          </section>
        </li>
        <li class="js-global-menu-list-item">
          <a href="/#index4" data-link-id="index4" data-barba-prevent>取扱業務</a>
        </li>
        <li class="js-global-menu-list-item">
          <a href="/#index5" data-link-id="index5" data-barba-prevent>よくある質問</a>
        </li>
        <li class="js-global-menu-list-item">
          <a href="/contact/" data-barba-prevent>お問い合わせ</a>
        </li>
      </ul>
      <div class="js-focus-trap" tabindex="0"></div>
    </nav>
  </div>
</header>