(() => {
  const API_URL = "https://api.openai.com/v1/chat/completions";
  const resetButton = document.querySelector(".js-reset-button");
  const themeButton = document.querySelector(".js-theme-button");
  const chatInput = document.querySelector(".js-chat-input");
  const initialInputHeight = chatInput.scrollHeight;
  let API_KEY = null;
  let chatLog = JSON.parse(window.localStorage.getItem("chat-log"));
  let messageList = [
    {
      role: "system",
      content: "あなたはプロのライターです。テキストがWordPressの記事として投稿されることを想定して、可能な限り最高にわかりやすく丁寧な説明や回答を出力してください。",
    },
  ];

  // APIキーを入力させるアラートを表示させる表示
  const handleAPIKey = () => {
    const localStorageAPIKey = localStorage.getItem("chatgpt-api-key");

    if (localStorageAPIKey) {
      API_KEY = localStorageAPIKey;
    } else {
      const newAPIKey = prompt("API keyを入力してください");
      localStorage.setItem("chatgpt-api-key", newAPIKey.trim());
      API_KEY = newAPIKey.trim();
    }
  };

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

    elem.innerHTML = marked.parse(nl2br(textContent));
    return elem;
  };

  // ユーザが入力したメッセージを追加する関数
  const setMessage = (role = "", prompt = "") => {
    messageList.push({ role: role, content: prompt });
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

        let inputTitle = createElem("input", [], { type: "radio", name: "title-type", value: message.content });
        labelTitle.appendChild(inputTitle);

        let spanIconTitle = createElem("span", ["icon"]);
        labelTitle.appendChild(spanIconTitle);

        let spanTextTitle = createElem("span", ["text"], {}, "タイトルに選択");
        labelTitle.appendChild(spanTextTitle);

        let labelContent = createElem("label");
        fieldset.appendChild(labelContent);

        let inputContent = createElem("input", [], { type: "checkbox", name: "content-type[]", value: message.content });
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
    handleAPIKey();
    const themeColor = localStorage.getItem("themeColor");
    document.body.classList.toggle("light-mode", themeColor === "light_mode");
    themeButton.innerText = document.body.classList.contains("light-mode") ? "dark_mode" : "light_mode";

    if (chatLog) {
      messageList = chatLog.filter((obj) => obj.role !== "system");
      renderMessages();
    }
  });

  // テキストエリアを入力したときに高さを調整する処理
  chatInput.addEventListener("input", () => {
    chatInput.style.height = `${initialInputHeight}px`;
    chatInput.style.height = `${chatInput.scrollHeight}px`;
  });

  // リセットボタンを押したときの処理
  resetButton.addEventListener("click", () => {
    if (confirm("入力したチャットを削除してもいいですか？")) {
      localStorage.removeItem("chat-log");
      location.reload();
    }
  });

  // テーマボタンを押したときの処理
  themeButton.addEventListener("click", () => {
    document.body.classList.toggle("light-mode");
    localStorage.setItem("themeColor", themeButton.innerText);
    themeButton.innerText = document.body.classList.contains("light-mode") ? "dark_mode" : "light_mode";
  });

  // 親要素を取得
  const parentElement = document.querySelector(".js-chat-list");
  parentElement.addEventListener("click", function (event) {
    const clickedElement = event.target;
    if (!clickedElement.matches(".material-symbols-rounded p")) return;
    const parent = clickedElement.closest(".response-text");
    const reponseTextElement = parent.querySelector(":scope > div p");
    navigator.clipboard.writeText(reponseTextElement.textContent);
    clickedElement.textContent = "done";
    setTimeout(() => (clickedElement.textContent = "content_copy"), 1000);
  });

  // 送信ボタンを押したときの処理
  document.querySelector(".js-send-button").addEventListener("click", (event) => {
    event.preventDefault();

    const prompt = chatInput.value;
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
        model: "gpt-3.5-turbo",
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

        let inputTitle = createElem("input", [], { type: "radio", name: "title-type", value: data.choices[0].message.content });
        labelTitle.appendChild(inputTitle);

        let spanIconTitle = createElem("span", ["icon"]);
        labelTitle.appendChild(spanIconTitle);

        let spanTextTitle = createElem("span", ["text"], {}, "タイトルに選択");
        labelTitle.appendChild(spanTextTitle);

        let labelContent = createElem("label");
        fieldset.appendChild(labelContent);

        let inputContent = createElem("input", [], { type: "checkbox", name: "content-type[]", value: data.choices[0].message.content });
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

(() => {
  class Post {
    constructor() {
      this.toast = document.querySelector(".js-toast");
      this.postBtn = document.querySelector(".js-post-button");
      this.chatList = document.querySelector(".js-chat-list");
      this.baseUrl = "/wp-json/wp/v2/";
      this.postType = "news";
      this.requestUrl = `${this.baseUrl}${this.postType}`;
      let checkTitle = "";
      let checkContent = "";
      let timer1;

      this.postBtn.addEventListener("click", () => {
        document.querySelectorAll("input[name='title-type']").forEach((e) => {
          e.checked ? (checkTitle = e.value) : "";
        });

        document.querySelectorAll("input[name='content-type[]']").forEach((e) => {
          e.checked ? (checkContent += e.value) : "";
        });

        this.auth = {
          username: "admin-gpt",
          password: "neMb ohmW dDLx 19bm FXqv Ot2S",
        };

        this.post = {
          title: checkTitle !== "" ? checkTitle : "ダミータイトル",
          content: checkContent !== "" ? checkContent : "ダミーコンテンツ",
          status: "draft",
        };

        this.options = {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            Authorization: `Basic ${window.btoa(`${this.auth.username}:${this.auth.password}`)}`,
          },
          body: JSON.stringify(this.post),
        };

        if (checkTitle !== "" || checkContent !== "") {
          this.postBtn.classList.add("is-loading");

          fetch(this.requestUrl, this.options)
            .then((response) => response.json())
            .then(() => {
              this.postBtn.classList.remove("is-loading");
              document.querySelector(".js-checkmark").classList.add("is-complete");
              this.toast.classList.add("is-complete");

              timer1 = setTimeout(() => {
                document.querySelector(".js-checkmark").classList.remove("is-complete");
                this.toast.classList.remove("is-complete");
              }, 3000);
            })
            .catch((error) => console.error(error));
        }
      });
    }
  }
  new Post();
})();
