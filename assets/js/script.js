export const functions = {
  // ▼コンソール出力用
  setConsoleText: () => {
    const text = ["\n %c Developed by Kyohei Dan. -> https://portfolio-app-main.vercel.app/ \n\n", "background: #0000FF; padding:5px 0;color: #ffffff;"];
    window.console.log.apply(console, text);
  },

  // ▼360px 未満は JS で viewport を固定する
  fixedViewport: () => {
    const viewport = document.querySelector('meta[name="viewport"]');
    window.addEventListener("resize", () => {
      const viewportContent = window.outerWidth > 360 ? "width=device-width,initial-scale=1" : "width=360";
      if (viewport.getAttribute("content") !== viewportContent) {
        viewport.setAttribute("content", viewportContent);
      }
    });
  },

  // ▼ビューポートの中心に要素がきたときにclassを追加する処理
  observeSection: () => {
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
  },

  // ▼スクロールアニメーション処理
  scrollAnimation: () => {
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
      rootMargin: "-20% 0px",
      threshold: 0,
    };

    const observer = new IntersectionObserver(handleObserve, options);
    targetElements.forEach((target) => {
      observer.observe(target);
    });
  },

  // ▼headerリンクを押したときのスムーススクロール処理
  smoothScroll: () => {
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
  },

  // ▼メガメニューがあるリンクをクリックした際に
  megaMenu: () => {
    const navDetail = document.getElementsByClassName("nav-detail")[0];
    const liElements = document.getElementsByTagName("li");
    for (let i = 0; i < liElements.length; i++) {
      liElements[i].addEventListener("mouseover", function () {
        if (this.classList.contains("nav-detail")) {
          this.classList.add("new-class");
        }
      });
    }

    const parent = document.querySelectorAll(".js-global-menu-list-item");
    parent.forEach((e) => {
      e.addEventListener("mouseover", () => {
        let section = e.querySelector(".nav-detail");
        if (section) {
          section.setAttribute("aria-hidden", false);
        }
      });

      e.addEventListener("mouseleave", () => {
        let section = e.querySelector(".nav-detail");
        if (section) {
          section.setAttribute("aria-hidden", true);
        }
      });
    });
  },

  // ▼ドロワーメニューの開閉処理
  drawerMenu: () => {
    const drawerBtn = document.querySelector(".js-drawer-btn");
    const drawerAnchorLinks = document.querySelectorAll("[data-link-id]");
    if (!drawerBtn) return;

    function handledrawerOpen() {
      if (drawerBtn.getAttribute("aria-expanded") === "false") {
        document.querySelector("body").setAttribute("data-expanded", "true");
        drawerBtn.setAttribute("aria-expanded", true);
      } else {
        document.querySelector("body").setAttribute("data-expanded", "false");
        drawerBtn.setAttribute("aria-expanded", false);
      }
    }

    drawerBtn.addEventListener("click", handledrawerOpen);

    if (window.matchMedia("(max-width: 750px)").matches) {
      drawerAnchorLinks.forEach((drawerAnchorLink) => {
        drawerAnchorLink.addEventListener("click", handledrawerOpen);
      });
    }

    document.addEventListener("keydown", (event) => {
      if (event.key === "Escape") {
        document.querySelector("body").setAttribute("data-expanded", "false");
        drawerBtn.setAttribute("aria-expanded", false);
        drawerBtn.focus();
      }
    });

    document.querySelector(".js-focus-trap").addEventListener("focus", () => {
      drawerBtn.focus();
    });
  },

  // ▼タブ切り替えの処理
  tab: () => {
    const tabs = document.querySelectorAll('[role="tab"]');
    const tabContents = document.querySelectorAll('[role="tabpanel"]');
    if (!tabs) return;

    tabs.forEach((tab) => {
      tab.addEventListener("click", (e) => {
        const btnTarget = e.currentTarget;

        btnTarget.parentNode.querySelectorAll('[aria-selected="true"]').forEach((e) => {
          e.setAttribute("aria-selected", false);
        });

        btnTarget.setAttribute("aria-selected", true);

        tabContents.forEach((tabContent) => {
          tabContent.setAttribute("hidden", "hidden");
        });

        document.querySelector(`#${btnTarget.getAttribute("aria-controls")}`).removeAttribute("hidden");
      });
    });
  },

  // ▼ /contact/ JSでのフォームバリデーション処理
  formValidation: () => {
    const targetElements = document.querySelectorAll("input,textarea");
    if (!targetElements) return;

    targetElements.forEach((target) => {
      target.addEventListener("input", (e) => {
        const inputElement = e.currentTarget;
        const parentElement = inputElement.parentNode.querySelector("span[role='status']");
        if (!parentElement) return;

        parentElement.querySelectorAll("span").forEach((element) => {
          element.setAttribute("aria-hidden", "true");
        });
      });

      target.addEventListener("change", (e) => {
        const inputElement = e.currentTarget;
        const parentElement = inputElement.parentNode.querySelector("span[role='status']");
        if (!parentElement) return;

        if (inputElement.value === "") {
          inputElement.classList.add("is-invalid");
          parentElement.querySelector(".js-error-message").setAttribute("aria-hidden", "false");
        } else if (inputElement.validity.patternMismatch) {
          inputElement.classList.add("is-invalid");
          parentElement.querySelector(".js-format-error-message").setAttribute("aria-hidden", "false");
        } else {
          inputElement.classList.remove("is-invalid");
          parentElement.querySelector(".js-ok-message").setAttribute("aria-hidden", "false");
        }
      });
    });
  },

  // ▼ /contact/ チェックボックスの状態に合わせてボタンの状態を変更する処理
  changeFormAgreeState: () => {
    const checkBox = document.querySelector(".js-checkbox");
    const submitBtn = document.querySelector(".js-submit-button");
    if (!checkBox || !submitBtn) return;

    checkBox.addEventListener("click", (e) => {
      if (e.currentTarget.checked) {
        submitBtn.removeAttribute("disabled");
      } else {
        submitBtn.setAttribute("disabled", true);
      }
    });
  },

  // ▼モーダル処理
  modal: () => {
    class Modal {
      constructor() {
        this.modalBtns = document.querySelectorAll(".js-modal-btn");
        this.beforeFocusedElement = null;
        this.modalContent = null;
        this.numberingModal();
        this.handleModalOpen();
        this.handleModalClose();
        this.handleAttributeChange();
        this.handleFocusedElement();
      }

      numberingModal() {
        this.modalBtns.forEach((modalBtn, i) => {
          modalBtn.setAttribute("data-modal-btn", i + 1);
        });

        document.querySelectorAll("[aria-modal]").forEach((modal, i) => {
          modal.setAttribute("data-modal-content", i + 1);
        });
      }

      handleModalOpen() {
        this.modalBtns.forEach((modalBtn) => {
          modalBtn.addEventListener("click", () => {
            const scrollbarWidth = window.innerWidth - document.body.clientWidth;
            document.body.style.paddingRight = `${scrollbarWidth}px`;

            document.querySelector("body").setAttribute("data-modal-expanded", "true");
            document.querySelector("body").setAttribute("data-user-select", "false");
            document.querySelector("main").setAttribute("aria-hidden", "true");
            document.querySelector(".js-modal-bg").setAttribute("data-modal-expanded", "true");

            const modalNumber = modalBtn.getAttribute("data-modal-btn");
            this.modalContent = document.querySelector(`[data-modal-content="${modalNumber}"]`);
            this.modalContent.setAttribute("aria-modal", "true");
            this.modalContent.setAttribute("aria-hidden", "false");
            this.modalContent.setAttribute("role", "dialog");

            const focusableElements = this.modalContent.querySelectorAll("a[href], button");
            this.beforeFocusedElement = document.activeElement;
            focusableElements[0].focus();

            this.modalContent.querySelector(".js-modal-focus-trap").addEventListener("focus", () => {
              this.modalContent.querySelector(".js-modal-close-btn").focus();
            });
          });
        });
      }

      handleAttributeChange() {
        if (this.modalContent) {
          document.querySelector("body").removeAttribute("data-modal-expanded");
          document.querySelector("body").removeAttribute("data-user-select");
          document.querySelector("main").removeAttribute("aria-hidden");
          document.querySelector(".js-modal-bg").removeAttribute("data-modal-expanded");
          this.modalContent.setAttribute("aria-modal", "false");
          this.modalContent.setAttribute("aria-hidden", "true");
          this.modalContent.removeAttribute("role");
        }
      }

      handleFocusedElement() {
        if (this.beforeFocusedElement) {
          this.beforeFocusedElement.focus();
          this.beforeFocusedElement = null;
        }
      }

      handleModalClose() {
        document.querySelectorAll(".js-modal-close-btn, .js-modal-bg").forEach((closeBtn) => {
          closeBtn.addEventListener("click", () => {
            const scrollbarWidth = window.innerWidth - document.body.clientWidth;
            document.body.style.paddingRight = `${scrollbarWidth}px`;
            this.handleAttributeChange();
            this.handleFocusedElement();
          });
        });

        document.addEventListener("keydown", (e) => {
          if (e.key === "Escape") {
            const scrollbarWidth = window.innerWidth - document.body.clientWidth;
            document.body.style.paddingRight = `${scrollbarWidth}px`;
            this.handleAttributeChange();
            this.handleFocusedElement();
          }
        });
      }
    }

    new Modal();
  },

  // ▼アコーディオン機能
  accordion: () => {
    const accordions = document.querySelectorAll(".js-accordion");
    if (!accordions) return;

    accordions.forEach((accordion) => {
      let animation = null;
      const title = accordion.querySelector(".js-accordion-title");
      const content = accordion.querySelector(".js-accordion-content");

      title.addEventListener("click", (e) => {
        e.preventDefault();

        if (!accordion.open) {
          accordion.open = true;
          accordion.setAttribute("data-expanded", "true");
          animation = content.animate(
            [
              { height: 0, opacity: 0 },
              { height: `${content.offsetHeight}px`, opacity: 1 },
            ],
            { duration: 400, easing: "ease-out" }
          );

          animation.onfinish = () => {
            accordion.open = true;
            animation = null;
          };
        } else {
          accordion.removeAttribute("data-expanded");
          animation = content.animate(
            [
              { height: `${content.offsetHeight}px`, opacity: 1 },
              { height: 0, opacity: 0 },
            ],
            { duration: 400, easing: "ease-out" }
          );

          animation.onfinish = () => {
            accordion.open = false;
            animation = null;
          };
        }
      });
    });
  },
};
