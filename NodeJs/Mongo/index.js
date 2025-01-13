import mongoose from "mongoose";
import { Post } from "./models/Post.js";
import { User } from './models/User.js'

async function main() {
    await mongoose.connect('mongodb://127.0.0.1:27017/dwwm')
    
    console.log("Connexion Ok");

    // Make new user with model User
    // const NewUser = new User({
    //     email: 'test@test.fr',
    //     lastname: 'test',
    //     age: 20
    // })
    //insert user to database
    // await NewUser.save()

    // const users = await User.find({})

    // console.log("users", users);

    // const user1 = await User.create({
    //     email: 'test2@test.fr',
    //     lastname: 'test2',
    //     age: 35
    // })

    // console.log("user1",user1);

    const jjg = await User.findOne({email: "jj.goddet@icloud.com"})

    // console.log("jjg", jjg);

    // jjg.age = 45

    // await jjg.save()

    // jjg = await User.findOne({email: "jj.goddet@icloud.com"})

    console.log("jjg", jjg)

    const test = await User.findOne({lastname: "test"})

    console.log("test", test);

    // await Post.create({
    //     title: "Formation Node",
    //     content: "Hello",
    //     status: "DRAFT",
    //     author: test._id
    // })

    const userNames = await User.find().select("lastname")

    console.log("userNames", userNames);

    mongoose.disconnect();

}

main();

// import express from "express"
// import path from "path"
// import session from "express-session"

// const app = express()
// const port = 3000

// const __dirname = path.resolve()

// app.use(express.static("public"))
// app.use(express.json()) // for parsing application/json
// app.use(express.urlencoded({ extended: true })) // for parsing application/x-www-form-urlencoded

// app.set("view engine", "ejs")
// app.set("trust_proxy", 1)
// app.use(
//     session({
//         secret: "keyboard cat",
//         resave: false,
//         saveUninitialized: true,
//         cookie: {
//             maxAge: 604800000
//         }
//     })
// )

// // code her

// app.use(function (req, res, next) {
//     // gestion des mauvaises adresses entrées
//     res.status(404).send("Erreur 404, Not found")
// })

// app.listen(port, () => {
//     console.log(`App listening on port ${port}`)
// })
