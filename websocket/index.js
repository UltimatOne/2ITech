import express from "express"
import router from "./routes/auth.routes.js"
import mongoose from "mongoose"
import session from "express-session"
import methodOverride from "method-override"
import cookieParser from "cookie-parser"
import { createServer } from "node:http"
import { Server } from "socket.io"
import { log } from "node:console"
import passport from "passport"
import configPassport from "./config/passport.js"
 
const app = express()

const httpServer = createServer(app)
const io = new Server(httpServer)
 
mongoose.connect("mongodb://127.0.0.1:27017/chat")
 
app.set("view engine", "ejs")
app.use(express.static("public"))
app.use(express.urlencoded({ extended: false }))
app.use(express.json())
app.use(cookieParser())

// override with POST having ?_method=DELETE
app.use(methodOverride('_method'))
 
app.use(
  session({
    secret: "keyboard cat",
    resave: false,
    saveUninitialized: true,
  })
)

app.use(passport.initialize())
app.use(passport.session())
configPassport(passport)

// pour envoyer et recevoir côté serveur
io.on('connection', (socket) => {
    log("Utilisateur connecté!")

    socket.on('chat message', (msg) => {
      log("message => " + msg )
      io.emit("chat message", msg)
    })

    socket.on('set pseudo', (pseudo) => {
      socket.pseudo = pseudo
      log("socket.pseudo => " + socket.pseudo )
    })

    socket.on('chatMessage', (chatMessage) => {
      log("chatMessage => " + chatMessage )

      const pseudo = socket.pseudo || "Anonyme"

      io.emit("chatMessage", { msg: chatMessage , pseudo: pseudo })
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