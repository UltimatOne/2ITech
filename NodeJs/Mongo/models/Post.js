import mongoose, { Schema } from "mongoose";
import { User } from "./User.js";


const postSchema = new Schema({
    title: { type: String, required: true },
    content: String,
    status: {
        type: String,
        enum: ["DRAFT", "PUBLISHED"]
    },
    author: {
        type: mongoose.Types.ObjectId,
        ref: User
    }
})

const Post = mongoose.model("Post", postSchema)

export { Post }