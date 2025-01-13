import mongoose, { Schema } from "mongoose";

const contactSchema = new Schema(
    {
        firstname: { type: String },
        lastname: { type: String },
        email: { type: String },
        phone: { type: String }
    }, 
    {
        timestamps: true
    }
)

const Contact = mongoose.model('Contact', contactSchema);

export default Contact
