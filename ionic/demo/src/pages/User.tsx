import { IonAlert, IonButton, IonCol, IonContent, IonFab, IonHeader, IonIcon, IonInput, IonItem, IonItemGroup, IonPage, IonText, IonTitle, IonToolbar } from '@ionic/react';
import React, { useEffect, useState } from 'react';
import Register from '../components/Register';
import Login from '../components/Login';
import { createOutline, logOutOutline, trash } from 'ionicons/icons';
import { doc, updateDoc, deleteDoc } from "firebase/firestore";
import { auth, db, logError, logSuccess } from '../config';
import styles from "./User.module.css"
import MySales from '../components/MySales';

const User: React.FC<{
    user: any,
    setUser: (user: any) => void
}> = ({ user, setUser }) => {

    const [inscription, setInscription] = useState(false)
    const [connexion, setConnexion] = useState(false)
    const [modifiedUser, setModifiedUser] = useState(false)

    const [userTmp, setUserTmp] = useState({
        prenom: "",
        nom: "",
        email: "",
        uid: ""
    })

    useEffect(() => {
        if (user) setUserTmp(user)
    }, [user])

    const [errors, setErrors] = useState({
        prenom: false,
        nom: false
    })

    const [alertMessage, setAlertMessage] = useState("")
    const [showAlert, setShowAlert] = useState(false)
    const [showDeleteAlert, setShowDeleteAlert] = useState(false)

    const handleChange = (e: any) => {
        const input = document.getElementById(e.target.inputId)
        if (!e.detail.value) {
            setErrors({ ...errors, [e.target.name]: true })
            setUserTmp({ ...userTmp, [e.target.name]: e.detail.value })
            setModifiedUser(false)
            input?.focus()
        } else {
            setErrors({ ...errors, [e.target.name]: false })
            setUserTmp({ ...userTmp, [e.target.name]: e.detail.value })
            setModifiedUser(true)
        }
    }

    function logOut() {
        console.log("%c log out", logSuccess)
        auth.signOut()
        setUser("")
    }

    const updateUser = async () => {
        try {
            if (!auth.currentUser) return
            const userRef = doc(db, "users", auth.currentUser.uid)
            await updateDoc(userRef, {
                prenom: userTmp.prenom,
                nom: userTmp.nom
            })
            setUser(userTmp)
            setModifiedUser(false)
            setAlertMessage("Vos informations ont été mise à jour")
            setShowAlert(true)
        } catch (error) {
            console.log("%c erreur de mise à jour des informations utilisateur ", logError, error)
        }
    }

    const deleteUser = async () => {
        if (!auth.currentUser) return
        try {
            await deleteDoc(doc(db, "users", auth.currentUser.uid))
            await auth.currentUser.delete()
            setAlertMessage("Votre compte a bien été supprimé")
            setUser("")
        } catch (error) {
            console.log("%c erreur lors de la suppression des informations utilisateur ", logError, error)
        }
        setShowAlert(true)
    }

    return (
        <IonPage>
            <IonHeader>
                <IonToolbar>
                    <IonTitle>Accéder à mon application</IonTitle>
                </IonToolbar>
            </IonHeader>
            <IonContent fullscreen>
                <IonHeader collapse="condense">
                    <IonToolbar>
                        {user
                            ? <IonTitle size="large">Mon profil</IonTitle>
                            : <IonTitle className={styles.title} size="large">Accéder à mon application</IonTitle>
                        }
                    </IonToolbar>
                </IonHeader>
                {user
                    ? <IonContent>
                        <IonItem>
                            <IonText>Bienvenue {user.prenom} !</IonText>
                            <IonButton slot='end' color='danger' size='small' onClick={() => setShowDeleteAlert(true)}>
                                <IonIcon aria-hidden="true" icon={trash} />
                            </IonButton>
                        </IonItem>
                        <IonCol>
                            <IonItem>
                                <IonCol>
                                    <IonInput
                                        id='prenom'
                                        // label='Votre prénom'
                                        labelPlacement="floating"
                                        placeholder="Saisissez votre prénom"
                                        name='prenom'
                                        value={userTmp.prenom}
                                        onIonChange={(e) => handleChange(e)}
                                    >
                                        <div slot="label">
                                            votre prénom {errors.prenom && <IonText className={styles.alert} color="danger">&nbsp;(Ce champ ne peut pas être vide)</IonText>}
                                        </div>
                                    </IonInput>
                                </IonCol>
                            </IonItem>
                            <IonItem>
                                <IonCol>
                                    <IonInput
                                        id='nom'
                                        // label='Votre nom'
                                        labelPlacement="floating"
                                        placeholder="Saisissez votre nom"
                                        name="nom"
                                        value={userTmp.nom}
                                        onIonChange={(e) => handleChange(e)}
                                    >
                                        <div slot="label">
                                            Votre nom {errors.nom && <IonText className={styles.alert} color="danger">&nbsp;(Ce champ ne peut pas être vide)</IonText>}
                                        </div>
                                    </IonInput>
                                </IonCol>
                            </IonItem>
                            <IonItem>
                                <IonInput disabled label="Votre email" labelPlacement="floating" placeholder="Saisir votre email" value={userTmp.email} />
                            </IonItem>
                        </IonCol>
                        <IonItemGroup className='d-flex gap-4 justify-content-center'>
                            <IonButton color="dark" onClick={() => logOut()}>
                                <IonIcon aria-hidden="true" icon={logOutOutline}></IonIcon>
                            </IonButton>
                            <IonButton disabled={!modifiedUser} color="dark" onClick={updateUser}>
                                <IonIcon aria-hidden="true" icon={createOutline} />
                            </IonButton>
                        </IonItemGroup>
                        <MySales user={user} />
                        <IonAlert
                            isOpen={showAlert}
                            message={alertMessage}
                            buttons={[{
                                text: "ok",
                                // handler: () => {
                                //     setShowAlert(false)
                                // }
                            }]}
                            onDidDismiss={() => setShowAlert(false)}
                        />
                        <IonAlert
                            isOpen={showDeleteAlert}
                            header="Confirmation"
                            message="Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible."
                            buttons={[
                                { text: "Annuler", role: "cancel" },
                                {
                                    text: "Supprimer", handler: () => {
                                        deleteUser()
                                        setShowDeleteAlert(false)
                                    }
                                }
                            ]}
                            onDidDismiss={() => setShowDeleteAlert(false)}
                        />
                    </IonContent>
                    : <>
                        {!inscription && !connexion &&
                            <IonContent>
                                <IonFab vertical="bottom" horizontal="center" slot="fixed" style={{ marginBottom: "50px" }}>
                                    <IonButton color={"dark"} onClick={() => setInscription(true)}>Inscription</IonButton>
                                    <IonButton color={"dark"} onClick={() => setConnexion(true)}>Connexion</IonButton>
                                </IonFab>
                            </IonContent>
                        }
                        {inscription &&
                            <IonContent>
                                <Register close={() => setInscription(false)} />
                            </IonContent>
                        }
                        {connexion &&
                            <IonContent>
                                <Login close={() => setConnexion(false)} />
                            </IonContent>
                        }
                        <IonAlert
                            isOpen={showAlert}
                            message={alertMessage}
                            buttons={[{
                                text: "ok",
                                // handler: () => {
                                //     setShowAlert(false)
                                // }
                            }]}
                            onDidDismiss={() => setShowAlert(false)}
                        />
                    </>
                }
            </IonContent>
        </IonPage>
    );
};

export default User;