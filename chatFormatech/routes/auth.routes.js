import express from "express"
import passport from "passport"
import { postLoginFormatech, logoutFormatech } from "../controllers/auth.controller.js"

const router = express.Router()

router.post('/login', passport.authenticate('local', {
    successMessage: "ok",
    failureMessage: "error",
    failureFlash: false
}))

router.post('/login', postLoginFormatech)

router.get('/logout', logoutFormatech)

export default router
