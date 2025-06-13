document.addEventListener("DOMContentLoaded", () => {

    // Pour envoyer et recevoir côté client
    const socket = io()

    const pseudoTitleContainer = document.getElementById("pseudoTitleContainer")
    const pseudoForm = document.getElementById("pseudoForm")
    const pseudoInput = document.getElementById("pseudo")
    
    const chatContainer = document.getElementById("chat-container")
    chatContainer.style.display = "none"

    const messageForm = document.getElementById("messageForm")
    const messageInput = document.getElementById("m")
    const messageList = document.getElementById("message")


    pseudoForm.addEventListener("submit", (e) => {
        e.preventDefault()
        
        pseudoForm.style.display = "none"
        chatContainer.style.display = "block"

        const pseudoTitle = document.createElement("span")
        pseudoTitle.textContent = pseudoInput.value
        pseudoTitleContainer.append(pseudoTitle)

        socket.emit("set pseudo", pseudoInput.value)
    })

    messageForm.addEventListener("submit", (e) => {
        e.preventDefault()
        if (messageInput.value) {
            socket.emit("chatMessage", messageInput.value)
            messageInput.value = ""
        }
    })

    socket.on("chatMessage", (msgDatas) => {
        console.log("message => " + msgDatas.pseudo + " " + msgDatas.msg)

        const messageDatas = document.createElement("li")
        messageDatas.textContent = `${msgDatas.pseudo} : ${msgDatas.msg}`

        messageList.append(messageDatas)

        messageList.scrollTop = messageList.scrollHeight
    })
})
