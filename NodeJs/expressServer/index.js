import express from "express"
import path from "path"
import session from "express-session"

const app = express()
const port = 3000

const __dirname = path.resolve()

app.use(express.static("public"))
app.use(express.json()) // for parsing application/json
app.use(express.urlencoded({ extended: true })) // for parsing application/x-www-form-urlencoded

app.set('trust_proxy', 1)
app.use(session({
    secret: 'keyboard cat',
    resave: false,
    saveUninitialized: true,
}))

app.post("/form", (req, res) => {
    // récupère les paramètres envoyés depuis un formulaire en méthode post
    console.log("**", req.body)
    const email = req.body.email
    const password = req.body.password
    if (password == "1234") {
        res.send(`Connection Ok, Bonjour ${email}`)
    } else {
        res.redirect("/")
    }
})

// fonction passée en middleware
const test = (req, res, next) => {
    req.user = {nom: 'JJG'}
    next()
}

// la fonction test est passée en middleware et permet d'executer son action avant le rendu html
app.get("/",test, (req, res) => {
    console.log("req.user.nom", req.user.nom);
    const page = path.join(__dirname, "src/views/page.html")
    res.sendFile(page)
})


app.get("/views", (req, res) => {
    if (!req.session.views) {
        req.session.views = 0
    }
    req.session.views++
    console.log("** session", req.session);
    res.send(`Cette page a été consultée ${req.session.views} fois.`)
})

app.get("/myapp/:name", (req, res) => {
    // récupère le paramètre ":name" envoyés par la méthode get
    console.log(req.params)
    let name = req.params.name
    res.send(`Hello ${name}!`)
})

app.use(function (req, res, next) {
    // gestion des mauvaises adresses entrées
    res.status(404).send("Erreur 404, Not found")
})

app.listen(port, () => {
    console.log(`App listening on port ${port}`)
})
