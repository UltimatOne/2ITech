import express from "express"
import path from "path"
import session from "express-session"

const app = express()
const port = 3000

const __dirname = path.resolve()

app.use(express.static("public"))
app.use(express.json()) // for parsing application/json
app.use(express.urlencoded({ extended: true })) // for parsing application/x-www-form-urlencoded

app.set("view engine", "ejs")
app.set("trust_proxy", 1)
app.use(
    session({
        secret: "keyboard cat",
        resave: false,
        saveUninitialized: true,
    })
)

app.get("/", (req, res) => {
    res.render("pages/home")
})

app.get("/hello"/*/:name"*/, (req, res) => {
    const name = "JJG"
    res.render("pages/hello", { name/*: req.params.name*/ })
})

app.get("/articles", (req, res) => {
    const articles = [
        { title: "Cours Node.js", category: "Dev mob" },
        { title: "Cours PHP", category: "Dev web" },
        { title: "Cisco", category: "Réseau" },
        { title: "Cours react", category: "Dev mobile" },
    ]
    res.render("pages/articles", { articles })
})

app.use(function (req, res, next) {
    // gestion des mauvaises adresses entrées
    res.status(404).send("Erreur 404, Not found")
})

app.listen(port, () => {
    console.log(`App listening on port ${port}`)
})
