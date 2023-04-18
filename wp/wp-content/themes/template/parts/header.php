<header class="site-header">
  <div class="inner">
    <?php $url = $_SERVER["REQUEST_URI"]; ?>
    <?php echo $url === "/" ? '<h1>' : '<div class="logo">'; ?>
    <a href="/">
      template
    </a>
    <?php echo $url === "/" ? '</h1>' : '</div>'; ?>

    <button class="sp js-drawer-btn" type="button" aria-label="ナビゲーションメニュー" aria-controls="global-nav" aria-expanded="false">
      <span class="drawer-line">
        <span class="visually-hidden">
          メニューを開閉する
        </span>
      </span>
    </button>

    <nav id="global-nav" aria-label="メインのナビゲーション">
      <ul class="js-global-menu-list">
        <li>
          <a href="/#index1" data-link-id="index1">ホーム</a>
        </li>
        <li>
          <a href="/#index2" data-link-id="index2">お知らせ</a>
        </li>
        <li>
          <a href="/#index3" data-link-id="index3">サポート</a>
        </li>
        <li>
          <a href="/#index4" data-link-id="index4">取扱業務</a>
        </li>
        <li>
          <a href="/#index5" data-link-id="index5">よくある質問</a>
        </li>
        <li>
          <a href="/contact/">お問い合わせ</a>
        </li>
      </ul>
      <div class="js-focus-trap" tabindex="0"></div>
    </nav>
  </div>
</header>