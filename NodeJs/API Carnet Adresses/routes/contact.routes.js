import express from "express"
import {
    createContact,
    getContactById,
    getContacts,
    updateContactById,
    deleteContactById,
    contactFormAdd,
    contactFormMod,
    createCookie,
    getCookie
} from "../controllers/contact.controller.js"
 
const router = express.Router()

router.get("/contacts", getContacts)

router.post("/contacts/newContact", createContact)
router.get("/contacts/add", contactFormAdd)
router.get("/contacts/mod/:id", contactFormMod)

router.patch("/contacts/update/:id", updateContactById)
router.delete("/contacts/delete/:id", deleteContactById)
router.get("/createCookie", createCookie)
router.get("/getCookie", getCookie)

router.get("/contacts/:id", getContactById)

export default router