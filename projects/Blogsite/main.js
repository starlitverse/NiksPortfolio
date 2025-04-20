document.getElementById("messageForm").addEventListener("submit", function(event) {
    event.preventDefault();

    let name = document.getElementById("name").value;
    let message = document.getElementById("message").value;

    let storedMessages = JSON.parse(localStorage.getItem("messages")) || [];
    storedMessages.push({ name: name, message: message });
    localStorage.setItem("messages", JSON.stringify(storedMessages));

    alert("Message submitted! It will appear in the About section.");
    document.getElementById("messageForm").reset();
});

document.addEventListener("DOMContentLoaded", function() {
    let messagesContainer = document.getElementById("messages-container");
    let storedMessages = JSON.parse(localStorage.getItem("messages")) || [];

    if (storedMessages.length === 0) {
        messagesContainer.innerHTML = "<p>No messages yet. Be the first to leave one!</p>";
    } else {
        messagesContainer.innerHTML = "";
        storedMessages.forEach((msg, index) => {
            let messageDiv = document.createElement("div");
            messageDiv.classList.add("message-box");
            messageDiv.innerHTML = `<strong>${msg.name}:</strong> ${msg.message} <br><small>Posted just now</small>`;
            messagesContainer.appendChild(messageDiv);
        });
    }
});