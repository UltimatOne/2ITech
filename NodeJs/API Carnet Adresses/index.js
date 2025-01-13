import express from "express";
import router from "./routes/contact.routes.js";
import mongoose from "mongoose";
import session from "express-session";
 
const app = express();
 
mongoose.connect("mongodb://127.0.0.1:27017/carnet-adresses");
 
app.set("view engine", "ejs");
app.use(express.static("public"));
app.use(express.urlencoded({ extended: false }));
app.use(express.json());
 
app.use(
  session({
    secret: "keyboard cat",
    resave: false,
    saveUninitialized: true,
  })
);
 
app.get('/', (req, res) => {
  res.send('Hello World!');
});
 
app.use('/api', router);
 
app.use((req, res) => {
  res.status(404);
  res.send("Page non trouvée");
});
 
app.listen(3000, () => {
  console.log("Application est lancée sur le port 3000");
});