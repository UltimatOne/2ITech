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
        cookie: {
            maxAge: 604800000
        }
    })
)

app.get("/", (req, res) => {
    res.render("pages/home", { tasks: req.session.tasks ? req.session.tasks : [] })
})

app.get("/addTask", (req, res) => {
    res.render("pages/addTask")
})

app.post("/addTaskController", (req, res) => {
    if (req.body.description == "") res.redirect("/")
    if (!req.session.tasks) {
        req.session.tasks = []
    }
    req.body.status = "Non démarrée"
    console.log("** req.body", req.body);
    req.session.tasks.push(req.body)
    res.redirect("/")
})

app.post("/runTask", (req, res) => {
    const id = req.body.id
    req.session.tasks[id].status = "En cours"
    res.redirect("/")
})

app.post("/stopTask", (req, res) => {
    const id = req.body.id
    req.session.tasks[id].status = "Suspendu"
    res.redirect("/")
})

app.post("/outTask", (req, res) => {
    const id = req.body.id
    req.session.tasks[id].status = "Terminée"
    res.redirect("/")
})

app.post("/delTask", (req, res) => {
    const id = req.body.id
    req.session.tasks.splice(id, 1)
    res.redirect("/")
})

app.use(function (req, res, next) {
    // gestion des mauvaises adresses entrées
    res.status(404).send("Erreur 404, Not found")
})

app.listen(port, () => {
    console.log(`App listening on port ${port}`)
})
