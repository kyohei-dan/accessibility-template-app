window.addEventListener("DOMContentLoaded", () => {
  // 360px 未満は JS で viewport を固定する
  (() => {
    const viewport = document.querySelector('meta[name="viewport"]');
    window.addEventListener("resize", () => {
      const viewportContent = window.outerWidth > 360 ? "width=device-width,initial-scale=1" : "width=360";
      if (viewport.getAttribute("content") !== viewportContent) {
        viewport.setAttribute("content", viewportContent);
      }
    });
  })();

  // ビューポートの中心に要素がきたときにclassを追加する処理
  (() => {
    const targetElements = document.querySelectorAll(".js-section");
    if (!targetElements) return;

    const options = {
      root: null,
      rootMargin: "-50% 0px",
      threshold: 0,
    };

    const handleObserve = (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const currentActiveIndex = document.querySelector(".js-global-menu-list .is-current-section");
          if (currentActiveIndex !== null) {
            currentActiveIndex.classList.remove("is-current-section");
          }

          const newActiveIndex = document.querySelector(`a[data-link-id='${entry.target.id}']`);
          newActiveIndex.classList.add("is-current-section");
        }
      });
    };

    const observer = new IntersectionObserver(handleObserve, options);
    targetElements.forEach((target) => {
      observer.observe(target);
    });
  })();

  // headerリンクを押したときのスムーススクロール処理
  (() => {
    const anchorLinks = document.querySelectorAll("a[data-link-id]");
    if (!anchorLinks) return;

    anchorLinks.forEach((anchorLink) => {
      anchorLink.addEventListener("click", () => {
        const targetId = anchorLink.dataset.linkId;
        const targetElement = document.querySelector(`#${targetId}`);
        const targetOffsetTop = window.pageYOffset + targetElement.getBoundingClientRect().top;
        window.scrollTo({
          top: targetOffsetTop,
          behavior: "smooth",
        });
      });
    });
  })();

  // ▼ドロワーメニューの開閉処理
  (() => {
    const body = document.querySelector("body");
    const drawerBtn = document.querySelector(".js-drawer-btn");
    const focusTrap = document.getElementById("js-focus-trap");
    let flg = false;

    if (!drawerBtn) return;

    drawerBtn.addEventListener("click", () => {
      body.classList.toggle("is-drawer-expanded");
      if (flg) {
        drawerBtn.setAttribute("aria-expanded", false);
        flg = false;
      } else {
        drawerBtn.setAttribute("aria-expanded", true);
        flg = true;
      }
    });

    document.addEventListener("keydown", (event) => {
      if (event.key === "Escape") {
        body.classList.remove("is-drawer-expanded");
        drawerBtn.setAttribute("aria-expanded", false);
        drawerBtn.focus();
        flg = false;
      }
    });

    focusTrap.addEventListener("focus", () => {
      drawerBtn.focus();
    });
  })();

  // ▼タブ切り替えの処理
  (() => {
    const tabs = document.querySelectorAll('[role="tab"]');
    const tabList = document.querySelectorAll('[role="tabpanel"]');
    if (!tabs) return;

    tabs.forEach((tabLink) => {
      tabLink.addEventListener("click", (e) => {
        const btnTarget = e.currentTarget;

        tabs.forEach((tabLink) => {
          tabLink.setAttribute("aria-selected", false);
        });

        btnTarget.setAttribute("aria-selected", true);

        tabList.forEach((tabContent) => {
          tabContent.setAttribute("hidden", "hidden");
        });

        document.querySelector(`#${btnTarget.getAttribute("aria-controls")}`).removeAttribute("hidden");
      });
    });
  })();

  // ▼/contact/ チェックボックスの状態に合わせてボタンの状態を変更する処理
  (() => {
    const checkBox = document.querySelector(".js-checkbox");
    const submitBtn = document.querySelector(".js-submit-button");
    if (!checkBox || !submitBtn) return false;

    checkBox.addEventListener("click", function () {
      if (this.checked) {
        submitBtn.removeAttribute("disabled");
      } else {
        submitBtn.setAttribute("disabled", true);
      }
    });
  })();

  // ▼スクロールアニメーション処理
  (() => {
    const targetElements = document.querySelectorAll("*[data-anime='false']");
    if (!targetElements) return;

    const handleObserve = (entries, observer) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.setAttribute("data-anime", "true");
          observer.unobserve(entry.target);
        }
      });
    };

    const options = {
      root: null,
      rootMargin: "-30% 0px",
      threshold: 0,
    };
    const list = [1, 2, 3];
    console.log(list);

    const observer = new IntersectionObserver(handleObserve, options);
    targetElements.forEach((target) => {
      observer.observe(target);
    });
  })();
});
