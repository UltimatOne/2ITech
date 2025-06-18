import React, { useState } from 'react';
import { IonAlert, IonButton, IonCol, IonContent, IonFab, IonInput, IonItem } from '@ionic/react';
import { auth, db, logError } from "../config"
import { doc, setDoc } from 'firebase/firestore';
import { createUserWithEmailAndPassword } from 'firebase/auth';
import { useHistory } from 'react-router';

const Register: React.FC<{ close: () => void }> = ({ close }) => {
    const [prenom, setPrenom] = useState("")
    const [nom, setNom] = useState("")
    const [email, setEmail] = useState("")
    const [pwd, setPwd] = useState("")

    const [alertMessage, setAlertMessage] = useState("")
    const [showAlert, setShowAlert] = useState(false)

    const isValidMail = (email: string) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)
    const isValidPwd = (pwd: string) => /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$/.test(pwd)

    const navigate = useHistory()

    const handleSubmit = () => {
        if (!nom || !prenom || !email || !pwd) {
            setAlertMessage("Veuillez saisir tous les champs")
            setShowAlert(true)
            return
        }
        if (!isValidMail(email)) {
            setAlertMessage("Veuillez entrer une adresse email valide.")
            setShowAlert(true)
            return
        }
        if (!isValidPwd(pwd)) {
            setAlertMessage("Le mot de passe doit contenir au moins: 8 caractères, 1 majuscule, 1 minuscule, 1 chiffre et 1 caractère spécial")
            setShowAlert(true)
            return
        }
        // Ajout d'un utilisateur avec createUserWithEmailAndPassword
        createUserWithEmailAndPassword(auth, email, pwd)
            .then((userCredential) => {
                // Signed up 
                const user = userCredential.user;
                setDoc(doc(db, "users", user.uid), {
                    prenom,
                    nom,
                    email,
                    uid: user.uid
                })
                close()
            })
            .then(() => navigate.push("/home"))
            .catch((error) => {
                const errorCode = error.code;
                const errorMessage = error.message;
                console.log("%c error", logError, errorCode, errorMessage)
                switch (error.code) {
                    case "auth/email-already-in-use":
                        setAlertMessage("Cette adresse e-mail est déjà utilisée.");
                        break;
                    case "auth/invalid-email":
                        setAlertMessage("L'adresse e-mail est invalide.");
                        break;
                    case "auth/weak-password":
                        setAlertMessage("Le mot de passe est trop faible (minimum 6 caractères).");
                        break;
                    case "auth/missing-password":
                        setAlertMessage("Veuillez entrer un mot de passe.");
                        break;
                    default:
                        setAlertMessage("Une erreur est survenue. Veuillez réessayer.");
                }
                setShowAlert(true)
            });
    }

    return (
        <IonContent>
            <IonCol>
                <IonItem>
                    <IonInput label="Votre prénom" labelPlacement="floating" placeholder="Saisir votre prénom" value={prenom} onIonChange={(e) => setPrenom(e.detail.value!)} />
                </IonItem>
                <IonItem>
                    <IonInput label="Votre nom" labelPlacement="floating" placeholder="Saisir nom" value={nom} onIonChange={(e) => setNom(e.detail.value!)} />
                </IonItem>
                <IonItem>
                    <IonInput label="Votre email" type='email' labelPlacement="floating" placeholder="Saisir votre email" value={email} onIonChange={(e) => setEmail(e.detail.value!)} />
                </IonItem>
                <IonItem>
                    <IonInput label="Votre mot de passe" type='password' labelPlacement="floating" placeholder="Saisir votre mot de passe" value={pwd} onIonInput={(e) => setPwd(e.detail.value!)} />
                </IonItem>
            </IonCol>
            <IonFab vertical="bottom" horizontal="center" slot="fixed" style={{ marginBottom: "50px" }}>
                <IonButton onClick={close} color="dark">Annuler</IonButton>
                <IonButton onClick={handleSubmit} color="dark">S'inscrire</IonButton>
            </IonFab>
            <IonAlert
                isOpen={showAlert}
                message={alertMessage}
                buttons={[{
                    text: "ok",
                    handler: () => {
                        setShowAlert(false)
                    }
                }]}
            />
        </IonContent>
    );
};

export default Register;