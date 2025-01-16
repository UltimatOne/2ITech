import User from "../models/user.js"
import bcrypt from "bcryptjs"

const home = (req, res) => {
    res.send("hello World !")
}

const getSocket = (req, res) => {
    res.render("socket")
}

const getRegisterForm = (req, res) => {
    res.render("register")
}

const postRegisterForm = async (req, res) => {
    try {
        const { username, password } = req.body
        const user = new User({ username, password })

        await user.save()

        console.log("user =>", user)

        res.redirect("/")
    } catch (error) {
        res.redirect("/register")
    }
}

const loginForm = (req, res) => {
    res.render("login")
}

const postLoginForm = async (req, res) => {
    try {
        const user = await User.findOne({ username: req.body.username })
        if ( user && await bcrypt.compare(req.body.password, user.password)) {
            req.session.userId = user._id
        } else {
            res.send("Ivalid username or password!")
        }
    } catch (error) {
        res.status(404).send(error)
    }
}

const logoutForm = (req, res, next) => {
    req.logout((err) => {
        if (err) return next(err)
        console.log("req", req)
        res.redirect("/")
    })
}

const dashboard = (req, res) => {
    console.log("req", req)
    if (req.isAuthenticated()) {
        res.render("dashboard", { user: req.user })
    } else {
        res.redirect("/login")
    }
}

const chatForm = (req, res) => {
    res.render("chat")
}

export {
    home,
    getSocket,
    getRegisterForm,
    postRegisterForm,
    loginForm,
    postLoginForm,
    dashboard,
    logoutForm,
    chatForm
}
