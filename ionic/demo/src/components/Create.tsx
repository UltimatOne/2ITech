import React, { useState } from 'react'
import { base64FromPath, usePhotoGallery } from '../hooks/usePhotoGallery'
import { IonAlert, IonButton, IonCol, IonGrid, IonImg, IonInput, IonItem, IonItemGroup, IonRow } from '@ionic/react'
import { addDoc, collection } from 'firebase/firestore'
import { db, logError } from '../config'
import axios from 'axios'
import { useHistory } from 'react-router'

const Create: React.FC<{ user: any }> = ({ user }) => {
    const [alertMessage, setAlertMessage] = useState("")
    const [showAlert, setShowAlert] = useState(false)

    const { photos, takePhoto } = usePhotoGallery()

    const [nom, setNom] = useState("")
    const [description, setDescription] = useState("")
    const [prix, setPrix] = useState("")

    const navigate = useHistory()

    const handleSubmit = async () => {
        const fileNames = await Promise.all(
            photos.map(async (photo) => {
                try {
                    const res = await axios.post("http://localhost:3000/uploads", {
                        base64Image: await base64FromPath(photo.webviewPath!),
                        photo: photo.filepath
                    })
                    return res.data
                } catch (error) {
                    console.log("%c error", logError, error)
                    return null
                }
            })
        )
        console.log("fileNames", fileNames)
        if (fileNames.length > 0) {
            await addDoc(collection(db, "annonces"), {
                nom,
                description,
                prix,
                vendeur: user.uid,
                photo: fileNames[0]
            })
            setNom("")
            setDescription("")
            setPrix("")
            setAlertMessage("Votre annonce a bien été créée.")
            setShowAlert(true)
        }
    }


    return (
        <>
            <IonCol className='d-flex flex-column justify-content-center gap-5 mt-3'>
                <IonRow>
                    <IonItem className='w-100'>
                        <IonInput label='Le nom du produit' labelPlacement='floating' placeholder='Saisir le nom du produi' value={nom} onIonChange={(e) => setNom(e.detail.value!)} />
                    </IonItem>
                </IonRow>
                <IonRow>
                    <IonItem className='w-100'>
                        <IonInput label='Desciption du produit' labelPlacement='floating' placeholder='Saisir la description du produit' value={description} onIonChange={(e) => setDescription(e.detail.value!)} />
                    </IonItem>
                </IonRow>
                <IonRow>
                    <IonItem className='w-100'>
                        <IonInput label='Prix' labelPlacement='floating' placeholder='Saisir le prix du produit' value={prix} onIonChange={(e) => setPrix(e.detail.value!)} />
                    </IonItem>
                </IonRow>
                <IonGrid>
                    <IonRow>
                        {photos.map((photo) => (
                            <IonCol size="6" key={photo.filepath}>
                                <IonImg src={photo.webviewPath} />
                            </IonCol>
                        ))}
                    </IonRow>
                </IonGrid>
                <IonItemGroup className='d-flex justify-content-center p-5 gap-5'>
                    <IonButton className='w-25' color={"dark"} onClick={() => takePhoto()}>Prendre une photo</IonButton>
                    <IonButton className='w-25' color={"dark"} onClick={() => handleSubmit()}>Enregistrer le produit</IonButton>
                </IonItemGroup>
            </IonCol>
            <IonAlert
                isOpen={showAlert}
                message={alertMessage}
                buttons={[{
                    text: "ok",
                    handler: () => {
                        navigate.push("/home")
                    }
                }]}
            />
        </>
    )
}

export default Create