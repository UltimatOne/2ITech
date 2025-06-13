import { Schema, model } from "mongoose";
import bcrypt from "bcryptjs"


const UserSchema = new Schema ({
    username: { type: String, required: true, unique: true },
    password: {
        type: String,
        required: [true, "Please enter an password"],
        minlength: [8, "Minimum password length is 8 characters"]
    }
}, 
{
    timestamps: true
})

UserSchema.pre("save", async function () {
    if (this.isModified("password") ) {
        const salt = await bcrypt.genSalt()
        this.password = await bcrypt.hash(this.password, salt)
    }
})

UserSchema.methods.comparePassword = function (candidatePassword) {
    return bcrypt.compare(candidatePassword, this.password)
}

const User = model("User", UserSchema)

export default User