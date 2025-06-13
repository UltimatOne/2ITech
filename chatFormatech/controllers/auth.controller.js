import User from "../models/user.js"
import bcrypt from "bcryptjs"

const postLoginFormatech = async (req, res) => {
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

const logoutFormatech = (req, res, next) => {
    req.logout((err) => {
        if (err) return next(err)
        if (req.isAuthenticated()) {
            console.log("req", req)
            res.send("ok")
        } else {
            res.redirect("error")
        }
    })
}

export {
    postLoginFormatech,
    logoutFormatech,
}
