import express from "express"
import mongoose from "mongoose";
// import path from "path"
import session from "express-session"
import router from "./routes/album.routes.js";
import flash from "connect-flash";
import fileUpload from 'express-fileupload';


const app = express()
const port = 3000

await mongoose.connect('mongodb://127.0.0.1:27017/album_photos')

// const __dirname = path.resolve()

app.use(express.static("public"))
app.use(express.json()) // for parsing application/json
app.use(express.urlencoded({ extended: true })) // for parsing application/x-www-form-urlencoded
app.use(fileUpload())

app.set("view engine", "ejs")
app.set("trust_proxy", 1)
app.use(
    session({
        secret: "keyboard cat",
        resave: false,
        saveUninitialized: true,
        cookie: {
            maxAge: 604800000
        }
    })
)

app.use(flash());

app.use('/', router);

app.use(function (req, res, next) {
    // gestion des mauvaises adresses entrées
    res.status(404).send("Erreur 404, Not found")
})

app.listen(port, () => {
    console.log(`App listening on port ${port}`)
})




