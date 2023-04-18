<!DOCTYPE html>
<html>

<head>
  <title>ChatGPT API Chat Application</title>
</head>

<body>
  <h1>ChatGPT API Chat Application</h1>
  <div id="chat-container">
    <!-- チャットメッセージが表示される部分 -->
  </div>
  <input type="text" id="user-input" placeholder="Type your message here">
  <button id="send-btn">Send</button>

  <!-- ChatGPT APIのスクリプト -->
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script>
    // ChatGPT APIのエンドポイント
    const endpoint = 'https://api-inference.huggingface.co/models/microsoft/DialoGPT-medium';
    const YOUR_API_KEY = "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";


    // ユーザーが送信したメッセージをChatGPT APIに送信し、応答を受信する
    const sendMessage = async () => {
      const userInput = document.getElementById("user-input").value;
      if (!userInput) {
        return;
      }
      document.getElementById("user-input").value = "";
      const res = await axios.post(endpoint, {
        "inputs": userInput,
        "parameters": {
          "max_new_tokens": 100,
          "stop_token": "\n"
        }
      }, {
        headers: {
          "Content-Type": "application/json",
          "Authorization": `Bearer ${YOUR_API_KEY}`
        }
      });

      // ChatGPT APIからの応答を表示する
      const chatContainer = document.getElementById("chat-container");
      const chatMessage = document.createElement("p");
      chatMessage.innerText = `User: ${userInput}\nBot: ${res.data.generated_text.trim()}`;
      chatContainer.appendChild(chatMessage);
    };

    // メッセージを送信するためのボタンにイベントリスナーを追加する
    document.getElementById("send-btn").addEventListener("click", sendMessage);
  </script>
</body>

</html>