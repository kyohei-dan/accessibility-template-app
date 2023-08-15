const reloadScripts = async () => {
  const { functions } = await import("./functions.js");
  const { splide } = await import("./splide-setting.js");

  functions.setConsoleText();
  functions.fixedViewport();
  functions.observeSection();
  functions.scrollAnimation();
  functions.smoothScroll();
  functions.megaMenu();
  functions.drawerMenu();
  functions.tab();
  functions.formValidation();
  functions.changeFormAgreeState();
  functions.modal();
  functions.accordion();
  functions.pageTopButton();
  splide.slider();
};

// 初期読み込み時の処理
window.addEventListener("DOMContentLoaded", () => {
  reloadScripts();
});
