// function generateText() {
//   const apiKey = "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";
//   const prompt = document.getElementById("input-text").value;

//   const url = `https://api.openai.com/v1/engines/davinci-codex/completions?prompt=${prompt}&max_tokens=150`;

//   const headers = {
//     "Content-Type": "application/json",
//     Authorization: `Bearer ${apiKey}`,
//   };

//   fetch(url, {
//     method: "POST",
//     headers: headers,
//   })
//     .then((response) => response.json())
//     .then((data) => {
//       const output = document.getElementById("output");
//       output.innerHTML = data.choices[0].text;
//     })
//     .catch((error) => console.error(error));
// }

// const apiKey = "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";
// const promptInput = document.querySelector("#prompt-input");

// promptInput.addEventListener("keyup", function (event) {
//   if (event.keyCode === 13) {
//     const prompt = promptInput.value;

//     fetch("https://api.openai.com/v1/engines/davinci-codex/completions", {
//       method: "POST",
//       headers: {
//         "Content-Type": "application/json",
//         Authorization: `Bearer ${apiKey}`,
//       },
//       body: JSON.stringify({
//         prompt: prompt,
//         max_tokens: 60,
//         temperature: 0.5,
//         n: 1,
//         stop: "\n",
//       }),
//     })
//       .then((response) => {
//         if (!response.ok) {
//           throw new Error("エラーが発生しました。");
//         }

//         return response.json();
//       })
//       .then((data) => {
//         if (!data.choices || data.choices.length === 0) {
//           throw new Error("応答が見つかりませんでした。");
//         }

//         const message = data.choices[0].text.trim();
//         console.log(message);
//       })
//       .catch((error) => {
//         console.log(error.message);
//       });
//   }
// });

// document.getElementById("chat-form").addEventListener("submit", async (event) => {
//   event.preventDefault();
//   const userInput = document.getElementById("user-input");
//   const message = userInput.value.trim();
//   if (!message) return;

//   userInput.value = "";
//   userInput.disabled = true;

//   // APIに問い合わせ
//   const response = await fetchChatGpt(message);

//   // 応答を表示
//   appendMessage("ChatGPT", response);

//   userInput.disabled = false;
//   userInput.focus();
// });

// async function fetchChatGpt(message) {
//   const API_URL = "https://api.openai.com/v1/engines/davinci-codex/completions";
//   const API_KEY = "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";

//   const headers = {
//     "Content-Type": "application/json",
//     Authorization: `Bearer ${API_KEY}`,
//   };

//   const body = JSON.stringify({
//     prompt: message,
//     max_tokens: 50, // 応答の最大トークン数を指定
//     n: 1,
//     stop: null,
//     temperature: 0.7,
//   });

//   const response = await fetch(API_URL, {
//     method: "POST",
//     headers: headers,
//     body: body,
//   });

//   const data = await response.json();
//   return data.choices[0].text.trim();
// }

const chatLog = document.querySelector(".chat-log");
const chatInput = document.querySelector("#chat-input");
const sendButton = document.querySelector("#send-button");

const API_ENDPOINT = "https://api.openai.com/v1/engine/davinci-codex/completions";
const YOUR_API_KEY = "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";

function sendMessage() {
  const message = chatInput.value.trim();
  if (message === "") {
    return;
  }
  chatInput.value = "";

  const data = {
    prompt: message,
    max_tokens: 50,
    temperature: 0.5,
    n: 1,
  };
  const headers = {
    "Content-Type": "application/json",
    Authorization: `Bearer ${YOUR_API_KEY}`,
  };
  fetch(API_ENDPOINT, {
    method: "POST",
    headers: headers,
    body: JSON.stringify(data),
  })
    .then((response) => response.json())
    .then((data) => {
      const text = data.choices[0].text.trim();
      appendMessage(message, text);
    })
    .catch((error) => {
      console.error(error);
    });
}

function appendMessage(input, output) {
  const messageContainer = document.createElement("div");
  messageContainer.classList.add("message-container");

  const inputElement = document.createElement("div");
  inputElement.classList.add("message", "input");
  inputElement.textContent = input;
  messageContainer.appendChild(inputElement);

  const outputElement = document.createElement("div");
  outputElement.classList.add("message", "output");
  outputElement.textContent = output;
  messageContainer.appendChild(outputElement);

  chatLog.appendChild(messageContainer);
}

sendButton.addEventListener("click", sendMessage);
