import {
    IonContent,
    IonHeader,
    IonPage,
    IonTitle,
    IonToolbar,
    IonText,
    IonItem,
    IonCol,
    IonRow,
    IonButton,
} from '@ionic/react';
import Create from '../components/Create';
import './Tab2.css';
import { useHistory } from 'react-router';

const Tab2: React.FC<{ user: any }> = ({ user }) => {

    const navigate = useHistory()

    return (
        <IonPage>
            <IonHeader>
                <IonToolbar>
                    <IonTitle>Nouvelle Annonce</IonTitle>
                </IonToolbar>
            </IonHeader>
            <IonContent fullscreen>
                <IonHeader collapse="condense">
                    <IonToolbar>
                        <IonTitle size="large">Nouvelle Annonce</IonTitle>
                    </IonToolbar>
                </IonHeader>
                {user &&
                    <IonItem>
                        <IonText>Bienvenue {user.prenom} !</IonText>
                    </IonItem>
                }
                {user
                    ? <Create user={user} />
                    : <IonCol className='d-flex flex-column h-100 justify-content-center align-items-center gap-5'>
                        <IonRow>Vous devez être connecté pour accéder à cette page</IonRow>
                        <IonButton color={"dark"} onClick={() => navigate.push("/user")} children={"Connexion"} />
                    </IonCol>
                }
            </IonContent>
        </IonPage>
    );
};

export default Tab2;
