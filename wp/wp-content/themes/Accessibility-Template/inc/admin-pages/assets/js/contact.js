window.addEventListener("DOMContentLoaded", () => {
  // お問い合わせ一覧の対応済みスイッチのステータス変更やPOSTを行う処理
  (() => {
    class Switch {
      constructor(domNode) {
        this.switchNode = domNode;
        this.switchNode.addEventListener("click", () => this.toggleStatus());
        this.switchNode.addEventListener("keydown", (event) => this.handleKeydown(event));
      }

      handleKeydown(event) {
        if (event.key === "Enter" || event.key === " ") {
          event.preventDefault();
          this.toggleStatus();
        }
      }

      toggleStatus() {
        const currentState = this.switchNode.getAttribute("aria-checked") === "true";
        const newState = String(!currentState);

        this.switchNode.setAttribute("aria-checked", newState);
        this.sendStatusToServer(newState);
      }

      sendStatusToServer(state) {
        const id = this.switchNode.dataset.id;

        fetch(ajaxurl, {
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded",
          },
          body: `action=update_mail_status&id=${id}&mail_status=${state === "true" ? "opened" : "not_opened"}`,
        })
          .then((response) => response.json())
          .then((data) => {
            if (!data.success || data.data.not_opened_count === undefined) return;

            this.updateMenuBadge(data.data.not_opened_count, "#adminmenu .toplevel_page_contact .wp-menu-name");
            this.updateMenuBadge(data.data.not_opened_count, "#adminmenu .toplevel_page_contact .wp-first-item");
          })
          .catch((error) => {
            console.error("Error:", error);
          });
      }

      updateMenuBadge(count, selector) {
        document.querySelector(".js-not-opened-count").textContent = count;

        const parentElement = document.querySelector(selector);
        let badgeWrapper = parentElement.querySelector(".update-plugins");
        const badgeElement = badgeWrapper ? badgeWrapper.querySelector(".update-count") : null;

        if (count > 0) {
          if (badgeElement) {
            badgeElement.textContent = count;
            badgeWrapper.style.display = "";
          } else {
            const newBadge = document.createElement("span");
            newBadge.className = `update-plugins`;
            newBadge.innerHTML = `<span class="update-count">${count}</span>`;

            if (selector.includes(".wp-first-item")) {
              parentElement.querySelector("a").appendChild(newBadge);
            } else {
              parentElement.appendChild(newBadge);
            }
          }
        } else if (badgeWrapper) {
          badgeWrapper.style.display = "none";
        }
      }
    }

    window.addEventListener("load", () => {
      document.querySelectorAll("[role^=switch]").forEach((element) => new Switch(element));
    });
  })();

  // お問い合わせ件数を表示するグラフ
  // @see https://www.chartjs.org/docs/latest/
  (() => {
    const chartElement = document.querySelector(".js-contact-chart");
    if (!chartElement) return;
    const ctx = chartElement.getContext("2d");

    // 現在の年月を取得
    const now = new Date();
    const currentYear = now.getFullYear();
    const currentMonth = now.getMonth();

    // 直近3ヶ月間の年月を取得
    const last3Months = [new Date(currentYear, currentMonth - 2), new Date(currentYear, currentMonth - 1), now].map((date) => `${date.getMonth() + 1}月`);

    // adminData.monthly_countsはwp_localize_script()から渡している変数
    const data = adminData.monthly_counts;

    const chart = new Chart(ctx, {
      type: "line",
      data: {
        labels: last3Months,
        datasets: [
          {
            label: "お問い合わせ件数",
            data: data,
            borderColor: "rgb(28, 160, 110)",
            backgroundColor: "rgba(28, 160, 110, 0.2)",
            pointStyle: "circle",
            pointRadius: 10,
            pointHoverRadius: 15,
          },
        ],
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              font: {
                size: 16,
                weight: "bold",
              },
            },
          },
          x: {
            ticks: {
              color: "rgb(28, 160, 110)",
              font: {
                size: 16,
                weight: "bold",
              },
            },
          },
        },
        plugins: {
          legend: {
            onClick: function (event, legendItem) {},
          },
        },
      },
    });
  })();
});
