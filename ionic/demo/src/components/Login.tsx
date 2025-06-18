import { IonAlert, IonButton, IonCol, IonContent, IonFab, IonInput, IonItem, IonItemGroup } from '@ionic/react';
import React, { useState } from 'react';
import { auth, db, logError } from "../config"
import { signInWithEmailAndPassword } from "firebase/auth";
import { doc, getDoc } from 'firebase/firestore';
import { useHistory } from 'react-router';

const Login: React.FC<{ close: () => void }> = ({ close }) => {
    const [email, setEmail] = useState("")
    const [pwd, setPwd] = useState("")

    const [alertMessage, setAlertMessage] = useState("")
    const [showAlert, setShowAlert] = useState(false)

    const navigate = useHistory()

    const handleSubmit = () => {
        if (!email || !pwd) {
            setAlertMessage("Veuillez saisir tous les champs")
            setShowAlert(true)
            return
        }
        signInWithEmailAndPassword(auth, email, pwd)
            .then(async (userCredential) => {
                const user = userCredential.user;
                const userDatas = await getDoc(doc(db, "users", user.uid))
                if (userDatas.exists()) {
                    const userTmp = userDatas.data()
                    sessionStorage.setItem("user", JSON.stringify(userTmp))
                }
                navigate.push("/home")
            })
            .catch((error) => {
                const errorCode = error.code;
                const errorMessage = error.message;
                console.log("%c error", logError, errorCode, errorMessage)
                setAlertMessage("Email ou mot de passe incorrecte.")
                setShowAlert(true)
            });
    }

    return (
        <IonContent>
            <IonCol>
                <IonItem>
                    <IonInput
                        label="Votre email"
                        type='email'
                        labelPlacement="floating"
                        placeholder="Saisir votre email"
                        value={email} onIonChange={(e) => setEmail(e.detail.value!)}
                    />
                </IonItem>
                <IonItem>
                    <IonInput
                        label="Votre mot de passe"
                        type='password'
                        labelPlacement="floating"
                        placeholder="Saisir votre mot de passe"
                        value={pwd} onIonInput={(e) => setPwd(e.detail.value!)}
                    />
                </IonItem>
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
            </IonCol>
            <IonFab vertical="bottom" horizontal="center" slot="fixed" style={{ marginBottom: "50px" }}>
                <IonItemGroup>
                    <IonButton onClick={close} color="dark">Annuler</IonButton>
                    <IonButton onClick={handleSubmit} color="dark">Connexion</IonButton>
                </IonItemGroup>
            </IonFab>
        </IonContent>
    );
};

export default Login;
