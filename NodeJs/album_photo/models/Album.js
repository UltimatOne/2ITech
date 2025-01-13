import mongoose, { Schema } from "mongoose";

const albumSchema = new Schema(
    {
        title: { type: String, unique: true},
        images: [String]
    }, 
    {
        timestamps: true
    }
)

const Album = mongoose.model('Album', albumSchema);

export { Album }
