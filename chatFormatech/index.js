import express from "express"
import router from "./routes/auth.routes.js"
import mongoose from "mongoose"
import session from "express-session"
import methodOverride from "method-override"
import cookieParser from "cookie-parser"
import bodyParser from "body-parser"
import { createServer } from "node:http"
import { Server } from "socket.io"
import { log } from "node:console"
import passport from "passport"
import configPassport from "./config/passport.js"
import axios from "axios"

const app = express()

const httpServer = createServer(app)
const io = new Server(httpServer, { cors: {} })
mongoose.connect("mongodb://127.0.0.1:27017/chat")

app.use(express.static("public"))
app.use(express.urlencoded({ extended: false }))
app.use(express.json())
app.use(cookieParser())

// override with POST having ?_method=DELETE
app.use(methodOverride('_method'))

app.use(
  session({
    secret: "Formatech chat",
    resave: false,
    saveUninitialized: true,
  })
)
app.use(bodyParser.urlencoded({ extended: false }));

app.use(passport.initialize())
app.use(passport.session())
configPassport(passport)

// pour envoyer et recevoir côté serveur
io.on('connection', (socket) => {
  log("Utilisateur connecté!")

  socket.on('chat message', (msg) => {
    log("message => " + msg)
    io.emit("chat message", msg)
  })

  socket.on('set pseudo', (userName) => {
    socket.pseudo = userName
    log("socket.pseudo => " + socket.pseudo)
  })
  socket.on('set roomId', (roomId) => {
    socket.roomId = roomId
    log("socket.roomId => " + socket.roomId)
  })
  socket.on('set inscriptionId', (inscriptionId) => {
    socket.inscriptionId = inscriptionId
    log("socket.inscriptionId => " + socket.inscriptionId)
  })

  socket.on('chatMessage', (newMessage) => {
    log("chatMessage => " + newMessage)

    const pseudo = socket.pseudo || "Anonyme"
    const roomId = socket.roomId
    const inscriptionId = socket.inscriptionId

    axios.post("http://localhost2it/formatech/index.php?page=message_post", {
      roomId: roomId,
      inscriptionId: inscriptionId,
      message: newMessage
    })
      .then((resp) => {
        console.log(resp)
      })
      .catch((error) => {
        console.error("error => ", error)
      })

    io.emit("chatMessage", { message: newMessage, roomId: roomId, pseudo: pseudo, inscriptionId: inscriptionId })
  })

  socket.on("disconnect", () => {
    log("utilisateur déconnecté!")
  })
})

app.use('/', router)

app.use((req, res) => {
  res.status(404)
  res.send("Page non trouvée")
});

httpServer.listen(3000, () => {
  console.log("Application est lancée sur le port 3000")
})