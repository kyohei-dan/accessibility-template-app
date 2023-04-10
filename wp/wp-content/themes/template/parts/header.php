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
          <a href="/#index2" data-link-id="index2" class="js-global-menu-Link">お知らせ</a>
        </li>
        <li>
          <a href="/#index3" data-link-id="index3" class="js-global-menu-Link">サポート</a>
        </li>
        <li>
          <a href="/#index4" data-link-id="index4">取扱業務</a>
          <ul class="sp lower-global-nav js-lower-global-nav" aria-hidden="true">
            <li>
              <a href="">給与計算代行・勤怠管理集計</a>
            </li>
            <li>
              <a href="">社会保険・労働保険手続き代行</a>
            </li>
            <li>
              <a href="">労務相談</a>
            </li>
            <li>
              <a href="">社内規程整備コンサルティング</a>
            </li>
            <li>
              <a href="">経営戦略・事業計画書作成支援</a>
            </li>
            <li>
              <a href="">採用定着支援</a>
            </li>
            <li>
              <a href="">各種研修</a>
            </li>
            <li>
              <a href="">性格適正検査フィロソフィコンパス</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="/contact/" data-current-page="contact">お問い合わせ</a>
        </li>
      </ul>
      <div id="js-focus-trap" tabindex="0"></div>
    </nav>
  </div>
</header>