import mongoose, { Schema } from "mongoose";

const userSchema = new Schema({
    email: { type: String, unique: true},
    lastname: String,
    age: {type: Number, min: 0},
})

const User = mongoose.model('User', userSchema);

export { User }
