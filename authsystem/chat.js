const messages = [
    { avatar: "https://em-content.zobj.net/thumbs/240/apple/325/robot_1f916.png", name: "AI", text: "Hello! How can I assist you today?" },
];

        function renderMessages() {
            const chatBox = document.getElementById("chat-box");
            chatBox.innerHTML = "";
            messages.forEach(msg => {
                const msgDiv = document.createElement("div");
                msgDiv.className = `flex items-start ${msg.type === "me" ? "justify-end" : ""}`;
                msgDiv.innerHTML = `
                    ${msg.type !== "me" ? `<img src="${msg.avatar}" class="w-10 h-10 rounded-full mr-2">` : ""}
                    <div class="bg-gray-600 p-3 rounded-lg max-w-xs">${msg.text}</div>
                    ${msg.type === "me" ? `<img src="${msg.avatar}" class="w-10 h-10 rounded-full ml-2">` : ""}
                `;
                chatBox.appendChild(msgDiv);
            });

            // Automatically scroll to the last message
            chatBox.scrollTop = chatBox.scrollHeight;
        }

        document.getElementById("send-btn").addEventListener("click", () => {
            const input = document.getElementById("message-input");
            if (input.value.trim() !== "") {
                // User message
                messages.push({ avatar: "https://em-content.zobj.net/thumbs/240/apple/325/bust-in-silhouette_1f464.png", name: "You", text: input.value, type: "me" });

                // AI response
                messages.push({ avatar: "https://em-content.zobj.net/thumbs/240/apple/325/robot_1f916.png", name: "AI", text: "This feature is not yet supported!" });

                input.value = "";
                renderMessages();
            }
        });

        renderMessages();
    renderMessages();