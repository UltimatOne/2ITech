import express from "express"
import passport from "passport"
import {
    home,
    getSocket,
    getRegisterForm,
    postRegisterForm,
    loginForm,
    postLoginForm,
    dashboard,
    logoutForm,
    chatForm
} from "../controllers/auth.controller.js"

const router = express.Router()

router.get("/", home)

router.get("/socket", getSocket)

router.get("/register", getRegisterForm)
router.post("/saveUser", postRegisterForm)

router.get('/connexion', loginForm)
router.post('/login', passport.authenticate('local', {
    successRedirect: '/dashboard',
    failureRedirect: '/login',
    failureFlash: false
}))
router.post('/login', postLoginForm)
router.get('/dashboard', dashboard)

router.get('/logout', logoutForm)

router.get("/chat", chatForm)

export default router
