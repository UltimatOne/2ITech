import express from "express";
import { createContact, getContactById, getContacts, updateContactById, deleteContactById } from "../controllers/contact.controller.js";
 
const router = express.Router();

router.post("/contacts/newContact", createContact )
router.get("/contacts", getContacts )
router.get("/contacts/:id", getContactById )
router.patch("/contacts/update/:id", updateContactById )
router.delete("/contacts/delete/:id", deleteContactById )

export default router;