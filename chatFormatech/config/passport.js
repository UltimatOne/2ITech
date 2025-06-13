import passport from "passport"
import { Strategy } from "passport-local"
import User from "../models/user.js"

export default function () {

    // Global configuration
    passport.use(
        new Strategy(async (username, password, done) => {
            console.log("username", username);
            console.log("password", password);
            try {
                const user = await User.findOne({ username: username })
                if (!user || !user.comparePassword(password)) {
                    return done(null, false, { message: "Identifiants incorrects" })
                }

                return done(null, user)

            } catch (error) {
                return done(error)
            }
        })
    )

    // datas for session
    passport.serializeUser((user, done) => {
        done(null, user.id)
    })

    // get user in session
    passport.deserializeUser(async (id, done) => {
        try {
            const user = await User.findById(id)

            done(null, user)

        } catch (error) {
            done(error)
        }
    })
}
