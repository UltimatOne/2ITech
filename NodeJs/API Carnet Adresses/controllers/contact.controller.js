import Contact from "../models/Contact.js"
import { EventEmitter } from "node:events"

const myEmitter = new EventEmitter()

myEmitter.on('contactCreated', (firstname, lastname) => {
    console.log('Le contact ' + firstname + ' ' + lastname + ' a bien été ajouté')
})

const createCookie = (req, res) =>{

    res.cookie("monCookie", "value test 2", { maxAge: 5259600000, httpOnly:true })
    
    res.send("Cookie défini avec succès")
}

const createContact = async (req, res) => {

    const newContact = await Contact.create(req.body)

    myEmitter.emit('contactCreated', newContact.firstname, newContact.lastname)

    res.redirect("/api/contacts")

}

const getCookie = (req, res) => {
    const cookieValue = req.cookies.monCookie
    res.send("la valeur du cookie est : " + cookieValue)
}

const contactFormAdd = async (req, res) => {

    const link = "/api/contacts/newContact"
    const contact = null

    res.render("contactForm", { "link": link, "contact": contact })

}

const contactFormMod = async (req, res) => {

    const contact = await Contact.findById(req.params.id)

    const link = "/api/contacts/update/" + contact.id + "?_method=PATCH"

    res.render("contactForm", { "link": link, "contact": contact })

}

const getContacts = async (req, res) => {

    const contacts = await Contact.find()

    res.render('contacts', {'contacts': contacts })
}

const getContactById = async (req, res) => {
    try {
        const contact = await Contact.findById(req.params.id)

        console.log("contact => ", contact)

        res.send(contact)
    } catch (error) {
        console.log("error =>", error)
        res.send(error)
    }
}

const updateContactById = async (req, res) => {
    try {
        const contact = await Contact.findByIdAndUpdate(req.params.id, req.body, { new: true })

        console.log("contact => ", contact)

        res.redirect("/api/contacts")
    } catch (error) {
        console.log("error =>", error)
        res.send(error)
    }
}

const deleteContactById = async (req, res) => {

    await Contact.findByIdAndDelete(req.params.id)
        .then((deletedContact) => {
            if (deletedContact) {
                console.log("Contact deleted successfully:", deletedContact)
                res.redirect("/api/contacts")
            } else {
                console.log("Contact not found")
                res.send("Contact not found")
            }
        })
}

export {
    createContact,
    getContacts,
    getContactById,
    updateContactById,
    deleteContactById,
    contactFormAdd,
    contactFormMod,
    createCookie,
    getCookie
}
