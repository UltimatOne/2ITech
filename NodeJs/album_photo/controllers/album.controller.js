import { Album } from "../models/Album.js"
import path from "path"
import fs from "fs"

const __dirname = path.resolve()

const getAlbums = async (req, res) => {
    const albums = await Album.find()

    try {
        if (albums.length == 0) {
            req.flash("error", "Pas d'albums trouvés")
        }
        res.render("albums", { albums: albums, errors: req.flash("error"), success: req.flash("success") })
    } catch (error) {
        console.log("error")
    }
}

const getAlbum = async (req, res) => {
    const album = await Album.findById(req.params.id)
    // console.log("album**", album)
    res.render("album", { album: album, errors: req.flash("error"), success: req.flash("success") })
}

const delAlbum = async (req, res) => {
    try {
        let delAlbum = await Album.findOne({ title: req.params.title })
        if (!delAlbum) {
            req.flash("error", `l'album ${req.params.title} n'a pas été trouvé.`)
            res.redirect("/albums")
            return
        }
        const delAlbumId = ""+delAlbum._id

        await delAlbum.deleteOne()

        const albumDir = path.join(__dirname,'public','images', delAlbumId);

        console.log("albumDir", albumDir)
 
        fs.rmSync(albumDir, { recursive: true, force: true });


        req.flash("success", `L'album ${delAlbum.title} a bien été supprimé`)
        res.redirect("/albums")
    } catch (error) {
        console.log("error")
        res.redirect("/albums")
    }
}

const delPicture = async (req, res) => {
    try {
        const albumId = req.params.id
        const album = await Album.findById(albumId)

        const imageId = req.params.imageId
 
        const image = album.images[imageId];

        if (!image) {
            res.redirect(`/albums/${albumId}`);
        }
 
        album.images.splice(imageId, 1)

        await album.save();

        const albumDir = path.join(__dirname,'public','images', albumId, image);

        console.log("albumDir", albumDir)

        fs.unlinkSync(albumDir);

        res.redirect(`/albums/${albumId}`);

    } catch (error) {
       console.log("error")
    }

};

const albumForm = (req, res) => {
    res.render("new-album", { title: "Nouvel album", errors: req.flash("error") })
}

const newAlbum = async (req, res) => {
    try {
        if (!req.body.title || req.body.title == "") {
            req.flash("error", "Le titre de l'album ne peut pas être vide.")
            res.redirect("/album/create")
            return
        }
        const newAlbum = new Album({
            title: req.body.title,
            images: req.body.images,
        })

        await newAlbum.save()
        req.flash("success", `L'album ${newAlbum.title} a bien été ajouté`)

        res.redirect("/albums")
    } catch (error) {
        console.log("error")
        res.redirect("/album/create")
    }
}

const addPicture = async (req, res) => {
    // 
    let uploadPath

    //id de l'album concerné
    const albumId = req.body.id

    // Album concerné
    const album = await Album.findById(albumId)

    // Préparation du début du chemin du dossier où doit être rangé le fichier
    const albumDir = path.join(__dirname, "public", "images", albumId)

    // Vérification de la présence de fichiers dans la requête
    if (!req.files || Object.keys(req.files).length === 0) {
        return res.status(400).send("No files were uploaded.")
    }

    // Traitement des fichiers pour l'enregistrement dans le dossier cible et la base de données
    try {
        const images = req.files.images

        if (images.length > 1) {
            // Vérification du type des fichiers envoyés
            for (let image of images) {
                if (!image.mimetype.startsWith("image/")) {
                    req.flash("error", "Seul les images sont acceptées")
                    res.redirect(`/albums/${album._id}`)
                    return
                }
            }
            for (let image of images) {
                // finalisation du chemin du dossier où doit être rangé le fichier avec son nom
                uploadPath = path.join(albumDir, image.name)

                // vérification de l'existance du dossier où ranger le fichier, si il n'existe pas il est créé
                if (!fs.existsSync(albumDir)) {
                    fs.mkdirSync(albumDir, { recursive: true })
                }

                // déplacement du fichier
                image.mv(uploadPath, function (err) {
                    if (err) return res.status(500).send(err)
                    return
                })

                // enregistrement du nom du fichier dans le tableau album.images
                album.images.push(image.name)
            }
        } else {
            const image = req.files.images
            // Vérification du type du fichier envoyé
            if (!image.mimetype.startsWith("image/")) {
                req.flash("error", "Seul les images sont acceptées")
                res.redirect(`/albums/${album._id}`)
                return
            }

            // finalisation du chemin où doit être rangé le fichier avec son nom
            uploadPath = path.join(albumDir, image.name)

            // vérification de l'existance du dossier où ranger le fichier, si il n'existe pas il est créé
            if (!fs.existsSync(albumDir)) {
                fs.mkdirSync(albumDir, { recursive: true })
            }

            // déplacement du fichier
            image.mv(uploadPath, function (err) {
                if (err) return res.status(500).send(err)
                return
            })

            // enregistrement du nom du fichier dans le tableau album.images
            album.images.push(image.name)
        }
    } catch (error) {
        console.log('error')
    }

    // sauvegarde dans la base de donnée
    await album.save()

    res.redirect(`/albums/${album._id}`)
}

export { albumForm, newAlbum, getAlbums, getAlbum, delAlbum, addPicture, delPicture }
