import express from 'express';
import { newAlbum, albumForm, getAlbums, getAlbum, delAlbum, addPicture, delPicture } from '../controllers/album.controller.js';

const router = express.Router()

// création des routes avec appel des controlleurs pour le traitement des données
router.get("/album/create", albumForm)
router.post("/album/new_album", newAlbum )
router.get("/albums", getAlbums )
router.get("/albums/:id", getAlbum )
router.get("/album/:id/delete/:imageId", delPicture)
router.get("/delete_album/:title", delAlbum )
router.post("/album/addpicture", addPicture)

export default router;