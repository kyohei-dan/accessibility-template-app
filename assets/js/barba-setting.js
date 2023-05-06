/**
 * barba.jsを使用してSPAのようなUXを実現しています
 * @see https://barba.js.org/
 */

import { functions } from "./script.js";
import { splide } from "./splide-setting.js";

const mask = document.querySelector(".js-loading-mask");
barba.init({
  debug: false,
  sync: true,
  cacheIgnore: ["/contact/"],
  transitions: [
    {
      name: "global-transitions",
      async leave() {
        mask.classList.add("is-loading");
        await new Promise((resolve) => {
          return setTimeout(resolve, 100);
        });
      },
      beforeEnter({ next }) {
        replaceHeadTags(next);
        window.scrollTo(0, 0);
      },
      async afterEnter() {
        await new Promise((resolve) => {
          return setTimeout(resolve, 100);
        });
        mask.classList.remove("is-loading");
      },
      after() {
        reloadScripts();
        samePageNotReload();
      },
    },
  ],
  views: [
    {
      namespace: "top",
      beforeEnter() {
        document.querySelector("body").classList.add("front-page");
      },
      afterLeave() {
        document.querySelector("body").classList.remove("front-page");
      },
    },
    {
      namespace: "archive-news",
      beforeEnter() {
        document.querySelector("body").classList.add("archive-news");
      },
      afterLeave() {
        document.querySelector("body").classList.remove("archive-news");
      },
    },
    {
      namespace: "single-news",
      beforeEnter() {
        document.querySelector("body").classList.add("single-news");
      },
      afterLeave() {
        document.querySelector("body").classList.remove("single-news");
      },
    },
  ],
});

barba.hooks.after(() => {
  if (typeof ga === "function") {
    ga("set", "page", window.location.pathname);
    ga("send", "pageview");
  }
  if (typeof gtag === "function") {
    gtag("config", window.GA_MEASUREMENT_ID, {
      page_path: window.location.pathname,
    });
  }
});

// script.jsファイルの関数を実行する処理
const reloadScripts = () => {
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

// metaタグの情報を書き換えする処理
const replaceHeadTags = (target) => {
  const head = document.head;
  const targetHead = target.html.match(/<head[^>]*>([\s\S.]*)<\/head>/i)[0];
  const newPageHead = document.createElement("head");
  newPageHead.innerHTML = targetHead;
  const removeHeadTags = ["meta[name='keywords']", "meta[name='description']", "meta[property^='fb']", "meta[property^='og']", "meta[name^='twitter']", "meta[name='robots']", "meta[itemprop]", "link[itemprop]", "link[rel='prev']", "link[rel='next']", "link[rel='canonical']"].join(",");
  const headTags = [...head.querySelectorAll(removeHeadTags)];
  headTags.forEach((item) => {
    head.removeChild(item);
  });
  const newHeadTags = [...newPageHead.querySelectorAll(removeHeadTags)];
  newHeadTags.forEach((item) => {
    head.appendChild(item);
  });
};

// Barbaにて現在と同一ページのリンクをクリックした際リロードをしない設定
const samePageNotReload = () => {
  const eventDelete = (e) => {
    if (e.currentTarget.href === window.location.href) {
      e.currentTarget.hash.replace(/#/, "");
      e.preventDefault();
      e.stopPropagation();
      return;
    }
  };

  const links = [...document.querySelectorAll("a[href]")];
  links.forEach((link) => {
    link.addEventListener("click", (e) => {
      eventDelete(e);
    });
  });
};

// 初期読み込み時の処理
window.addEventListener("DOMContentLoaded", () => {
  functions.setConsoleText();
  reloadScripts();
  samePageNotReload();
});
