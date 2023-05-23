import { functions } from "./functions.js";
import { splide } from "./splide-setting.js";

// script.jsファイルの関数を実行する処理
const reloadScripts = () => {
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
  splide.slider();
};

// 初期読み込み時の処理
window.addEventListener("DOMContentLoaded", () => {
  reloadScripts();
});
