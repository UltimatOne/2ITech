document.addEventListener("DOMContentLoaded", () => {
    const chat = document.getElementById("chat")
    if (!chat) return

    const logInfo = "background-color: white; color: black; border: 2px solid #ADD8E6; padding: 2px"

    // Pour envoyer et recevoir côté client
    const socket = io("http://localhost:3000")

    console.log("%c chat ouvert", logInfo)

    
    const messagesList = document.getElementById("messagesList")
    const messageForm = document.getElementById("messageForm")
    const messageInput = document.getElementById("messageInput")
    
    const userName = document.getElementById("user_name").textContent.replace(",", "")
    console.log("username", userName)
    socket.emit("set pseudo", userName)

    const inscriptionId = document.getElementById("inscription").value
    const roomId = document.getElementsByClassName("card-title")[0].id


    messageForm.addEventListener("submit", (e) => {
        e.preventDefault()
        if (messageInput.value) {
            socket.emit("set roomId", roomId)
            socket.emit("set inscriptionId", inscriptionId)
            socket.emit("chatMessage", messageInput.value)
            messageInput.value = ""
        }
    })

    socket.on("chatMessage", (msgDatas) => {

        const messageContainer = document.createElement("li")
        if (msgDatas.inscriptionId == inscriptionId) {
            messageContainer.classList.add("right")
        } else {
            messageContainer.classList.add("left")
        }
        const messagePseudo = document.createElement("label")
        const message = document.createElement("p")
        messagePseudo.textContent = `${msgDatas.pseudo}`
        message.textContent = `${msgDatas.message}`
        messageContainer.append(messagePseudo, message)

        messagesList.append(messageContainer)

        messagesList.scrollTop = messagesList.scrollHeight
    })
})
