import Contact from "../models/Contact.js"

const createContact = async (req, res) => {
    const newContact = await Contact.create(req.body)

    console.log("newContact => ", newContact)

    res.send(newContact)

    // await newContact.save()

    // res.send("success", `Le contact ${newContact.firstname} a bien été ajouté`)
}

const getContacts = async (req, res) => {
    const contacts = await Contact.find()

    console.log("contacts => ", contacts)

    res.send(contacts)
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

        res.send(contact)
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
                res.send(deletedContact)
            } else {
                console.log("Contact not found")
                res.send("Contact not found")
            }
        })
}

export { createContact, getContacts, getContactById, updateContactById, deleteContactById }
