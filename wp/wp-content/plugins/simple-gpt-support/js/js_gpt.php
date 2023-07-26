<?php

if (!defined('ABSPATH')) exit;

/**
 * JS: gptへの通信処理
 */
add_action(
  'admin_footer-gpt-support_page_sgs_create',
  function () {
?>
  <script>
    (() => {
      const API_URL = "https://api.openai.com/v1/chat/completions";
      const themeButton = document.querySelector(".js-theme-button");
      const resetButton = document.querySelector(".js-reset-button");
      const postButton = document.querySelector(".js-post-button");
      const chatInput = document.querySelector(".js-chat-input");
      const initialInputHeight = chatInput.scrollHeight;
      let API_KEY = "<?php echo get_api_key(); ?>";
      let chatLog = JSON.parse(window.localStorage.getItem("chat-log"));
      let messageList = [{
        role: "system",
        content: `返答する文章には必ずh1やh2やh3の見出しタグやpタグやulタグなど文章の意味にあったhtmlのタグを使用して返答してください。また、<?php echo get_prompt(); ?>`,
      }, ];

      // 改行コードをbrへ変換する関数
      const nl2br = (str = "") => {
        return str.replace(/(\r\n|\r|\n)/g, "<br>");
      };

      // HTMLを生成する関数
      const createElem = (tag, classes = [], attributes = {}, textContent = "") => {
        const elem = document.createElement(tag);

        classes.forEach((className) => {
          elem.classList.add(className);
        });

        Object.keys(attributes).forEach((key) => {
          elem.setAttribute(key, attributes[key]);
        });

        elem.innerHTML = textContent;
        return elem;
      };

      // ユーザが入力したメッセージを追加する関数
      const setMessage = (role = "", prompt = "") => {
        messageList.push({
          role: role,
          content: prompt
        });
      };

      // メッセージをlocalStorageへ保存する関数
      const setLocalStorage = () => {
        localStorage.setItem("chat-log", JSON.stringify(messageList));
      };

      // htmlを描画する関数
      const renderMessages = () => {
        messageList.forEach((message, i) => {
          let liElement;
          // 偶数の要素
          if (i % 2 === 0) {
            liElement = createElem("li", ["request-text"]);
            liElement.textContent = message.content;
          }

          // 奇数の要素
          if (i % 2 === 1) {
            liElement = createElem("li", ["response-text"]);
            let div = createElem("div", [], {}, message.content);
            liElement.appendChild(div);

            let fieldset = createElem("fieldset");
            liElement.appendChild(fieldset);

            let labelTitle = createElem("label");
            fieldset.appendChild(labelTitle);

            let inputTitle = createElem("input", [], {
              type: "radio",
              name: "title-type",
              value: message.content
            });
            labelTitle.appendChild(inputTitle);

            let spanIconTitle = createElem("span", ["icon"]);
            labelTitle.appendChild(spanIconTitle);

            let spanTextTitle = createElem("span", ["text"], {}, "タイトルに選択");
            labelTitle.appendChild(spanTextTitle);

            let labelContent = createElem("label");
            fieldset.appendChild(labelContent);

            let inputContent = createElem("input", [], {
              type: "checkbox",
              name: "content-type[]",
              value: message.content
            });
            labelContent.appendChild(inputContent);

            let spanIconContent = createElem("span", ["icon"]);
            labelContent.appendChild(spanIconContent);

            let spanTextContent = createElem("span", ["text"], {}, "コンテンツに選択");
            labelContent.appendChild(spanTextContent);

            let labelCopy = createElem("label");
            fieldset.appendChild(labelCopy);

            let spanCopyIcon = createElem("span", ["material-symbols-rounded"], {}, "content_copy");
            labelCopy.appendChild(spanCopyIcon);
          }

          document.querySelector(".js-chat-list").appendChild(liElement);
        });
      };

      // 読み込み時の処理
      window.addEventListener("DOMContentLoaded", () => {
        const themeColor = localStorage.getItem("themeColor");
        document.querySelector(".sgs-chat").classList.toggle("light-mode", themeColor === "light_mode");
        themeButton.innerText = document.querySelector(".sgs-chat").classList.contains("light-mode") ? "dark_mode" : "light_mode";

        if (chatLog) {
          messageList = chatLog.filter((obj) => obj.role !== "system");
          renderMessages();
        }

        // テキストエリアを入力したときに高さを調整する処理
        chatInput.addEventListener("input", () => {
          chatInput.style.height = `${initialInputHeight}px`;
          chatInput.style.height = `${chatInput.scrollHeight}px`;
        });

        // テーマボタンを押したときの処理
        themeButton.addEventListener("click", () => {
          document.querySelector(".sgs-chat").classList.toggle("light-mode");
          localStorage.setItem("themeColor", themeButton.innerText);
          themeButton.innerText = document.querySelector(".sgs-chat").classList.contains("light-mode") ? "dark_mode" : "light_mode";
        });

        // リセットボタンを押したときの処理
        resetButton.addEventListener("click", () => {
          if (chatLog) {
            if (confirm("入力したチャットを削除してもいいですか？")) {
              localStorage.removeItem("chat-log");
              location.reload();
            }
          }
        });

        // 記事を投稿するボタンを押したときの処理
        postButton.addEventListener("click", () => {
          const selectElement = document.querySelector(".js-select");
          const selectedValue = selectElement.value;
          if (selectedValue === "") alert("投稿する記事タイプを選択してください。");
        });

        // ユーザーが投稿する記事タイプを変更するときの処理
        document.querySelector(".js-select").addEventListener("change", (e) => {
          let selectedValue = e.currentTarget.value;

          if (selectedValue === "") {
            postButton.disabled = true;
          } else {
            postButton.disabled = false;
          }
        });

        // テキストコピーボタンを押したときの処理
        const parentElement = document.querySelector(".js-chat-list");
        if (!parentElement) return;
        parentElement.addEventListener("click", function(event) {
          const clickedElement = event.target;
          if (!clickedElement.matches(".material-symbols-rounded p")) return;
          const parent = clickedElement.closest(".response-text");
          const reponseTextElement = parent.querySelector(":scope > div p");
          navigator.clipboard.writeText(reponseTextElement.textContent);
          clickedElement.textContent = "done";
          setTimeout(() => (clickedElement.textContent = "content_copy"), 1000);
        });
      });

      // 送信ボタンを押したときの処理
      document.querySelector(".js-send-button").addEventListener("click", (event) => {
        event.preventDefault();

        const prompt = chatInput.value;
        if (!prompt) return;

        setMessage("user", prompt);
        setLocalStorage();

        let sendLiElement = createElem("li", ["request-text"]);
        chatLog = JSON.parse(window.localStorage.getItem("chat-log"));
        sendLiElement.textContent = chatLog[messageList.length - 1].content;

        document.querySelector(".js-chat-list").appendChild(sendLiElement);
        chatInput.value = "";
        chatInput.style.height = `${initialInputHeight}px`;
        document.querySelector(".js-loader").classList.add("is-loading");

        fetch(API_URL, {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
              Authorization: `Bearer ${API_KEY}`,
            },
            body: JSON.stringify({
              model: "gpt-3.5-turbo-16k-0613",
              messages: messageList,
              temperature: 0.9,
              top_p: 1,
              n: 1,
            }),
          })
          .then((response) => {
            if (response.ok) {
              return response.json();
            }
            throw new Error(`エラー： ${response.status}`);
          })
          .then((data) => {
            document.querySelector(".js-loader").classList.remove("is-loading");
            setMessage("assistant", data.choices[0].message.content);
            setLocalStorage();

            let li = createElem("li", ["response-text"]);
            let div = createElem("div", [], {}, data.choices[0].message.content);
            li.appendChild(div);

            let fieldset = createElem("fieldset");
            li.appendChild(fieldset);

            let labelTitle = createElem("label");
            fieldset.appendChild(labelTitle);

            let inputTitle = createElem("input", [], {
              type: "radio",
              name: "title-type",
              value: data.choices[0].message.content
            });
            labelTitle.appendChild(inputTitle);

            let spanIconTitle = createElem("span", ["icon"]);
            labelTitle.appendChild(spanIconTitle);

            let spanTextTitle = createElem("span", ["text"], {}, "タイトルに選択");
            labelTitle.appendChild(spanTextTitle);

            let labelContent = createElem("label");
            fieldset.appendChild(labelContent);

            let inputContent = createElem("input", [], {
              type: "checkbox",
              name: "content-type[]",
              value: data.choices[0].message.content
            });
            labelContent.appendChild(inputContent);

            let spanIconContent = createElem("span", ["icon"]);
            labelContent.appendChild(spanIconContent);

            let spanTextContent = createElem("span", ["text"], {}, "コンテンツに選択");
            labelContent.appendChild(spanTextContent);

            let labelCopy = createElem("label");
            fieldset.appendChild(labelCopy);

            let spanCopyIcon = createElem("span", ["material-symbols-rounded"], {}, "content_copy");
            labelCopy.appendChild(spanCopyIcon);

            document.querySelector(".js-chat-list").appendChild(li);
          })
          .catch((error) => {
            console.error(error.message);
          });
      });
    })();
  </script>
<?php
  }
);
