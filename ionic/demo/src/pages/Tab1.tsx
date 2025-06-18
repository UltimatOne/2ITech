import {
    IonAlert,
    IonButton,
    IonCard,
    IonCardContent,
    IonCardHeader,
    IonCardSubtitle,
    IonCardTitle,
    IonChip,
    IonContent,
    IonHeader,
    IonIcon,
    IonImg,
    IonItem,
    IonItemGroup,
    IonLabel,
    IonPage,
    IonRow,
    IonSearchbar,
    IonText,
    IonTitle,
    IonToolbar
} from '@ionic/react'
import './Tab1.css'
import { addDoc, collection, doc, getDoc, onSnapshot, query, where } from 'firebase/firestore'
import { baseUrl, db, logError } from '../config'
import { useEffect, useState } from 'react'
import { pricetagOutline } from 'ionicons/icons'
import axios from 'axios'
import { Player, Controls } from '@lottiefiles/react-lottie-player'
import bestSaleAnimation from "../lotties/Animation_best_sale.json"

const Tab1: React.FC<{ user: any }> = ({ user }) => {
    const [alertMessage, setAlertMessage] = useState("")
    const [showAlert, setShowAlert] = useState(false)

    const [annonces, setAnnonces] = useState<any[]>([])
    const [showAnnonce, setShowAnnonce] = useState<boolean>(false)
    const [annonce, setAnnonce] = useState<any>()
    const [annonceId, setAnnonceId] = useState<string>("")

    const [searchTerm, setSearchTerm] = useState<string>("")
    const [searchResults, setSearchResults] = useState<any[]>([])

    useEffect(() => {
        if (user.uid) {
            try {
                const q = query(collection(db, "annonces"), where("vendeur", "!=", user.uid))
                const annoncesSnapshot = onSnapshot(q, (snapshot) => {
                    const annoncesTmp = snapshot.docs.map((doc) => {
                        const data = doc.data()
                        return {
                            id: doc.id,
                            ...data,
                            photo: baseUrl + "public/" + data.photo
                        }
                    })
                    setAnnonces(annoncesTmp)
                })
                return () => annoncesSnapshot()
            } catch (error) {
                console.log("%c error", logError, error)
            }
        } else {
            try {
                const q = query(collection(db, "annonces"))
                const annoncesSnapshot = onSnapshot(q, (snapshot) => {
                    const annoncesTmp = snapshot.docs.map((doc) => {
                        const data = doc.data()
                        return {
                            id: doc.id,
                            ...data,
                            photo: baseUrl + "public/" + data.photo
                        }
                    })
                    setAnnonces(annoncesTmp)
                })
                return () => annoncesSnapshot()
            } catch (error) {
                console.log("%c error", logError, error)
            }
        }
    }, [user])

    const getAnnonce = async () => {
        const annonceDataSnap = await getDoc(doc(db, "annonces", annonceId))
        const annonceDataTmp = annonceDataSnap.data()
        const userDataSnap = await getDoc(doc(db, "users", annonceDataTmp?.vendeur))
        const userTmp = userDataSnap.data()
        setAnnonce({ ...annonceDataTmp, vendeurName: userTmp?.prenom, photo: baseUrl + "public/" + annonceDataTmp?.photo, id: annonceId })
        setShowAnnonce(true)
    }

    useEffect(() => {
        if (!annonceId) return
        getAnnonce()
    }, [annonceId])

    const handleSubmit = async () => {
        try {
            await addDoc(collection(db, "orders"), {
                acheteur: user?.uid,
                vendeur: annonce.vendeur,
                acheteurName: user.prenom,
                productId: annonce.id,
                productName: annonce.nom,
                productPrice: annonce.prix,
                checked: false
            })

            await axios.post(baseUrl + 'fake-payment', {
                userId: user?.uid,
                productName: annonce.nom,
                productId: annonce.id,
            });
            setAlertMessage("Votre achat est validé")
            setShowAlert(true)
        } catch (error) {
            console.log("%c error", logError, error)
        }
    }

    useEffect(() => {
        if (searchTerm.length < 3) setSearchResults([])
        const results: any[] = []
        for (const annonce of annonces) {
            if (annonce.nom.includes(searchTerm) || annonce.description.includes(searchTerm)) {
                results.push(annonce)
            }
        }
        if (results.length > 0) {
            setSearchResults(results)
        }
    }, [searchTerm])

    return (
        <IonPage>
            <IonHeader>
                <IonToolbar>
                    <IonTitle>Accueil</IonTitle>
                </IonToolbar>
            </IonHeader>
            <IonContent>
                <IonHeader collapse="condense">
                    <IonToolbar>
                        <IonTitle size="large">Accueil</IonTitle>
                    </IonToolbar>
                </IonHeader>
                <IonAlert
                    isOpen={showAlert}
                    message={alertMessage}
                    buttons={[{
                        text: "ok",
                        handler: () => {
                            setShowAlert(false)
                            setAnnonceId("")
                            setShowAnnonce(false)
                        }
                    }]}
                />
                {user &&
                    <IonItem>
                        <IonText>Bienvenue {user.prenom} !</IonText>
                    </IonItem>
                }
                <IonSearchbar value={searchTerm} placeholder='Recherchez un produit' onIonChange={(e) => setSearchTerm(e.detail.value!)} />
                {!showAnnonce
                    ? <IonRow className='d-flex gap-3'>
                        {searchResults.length > 0
                            ? searchResults.map((annonce, key) => {
                                return (
                                    <div key={key} className='position-relative w-25 h-25'>
                                        {annonce.exclu &&
                                            <Player
                                                autoplay
                                                loop
                                                src={bestSaleAnimation}
                                                style={{ height: '150px', width: '150px', position: 'absolute', right: 5, zIndex: 10 }}
                                            >
                                                <Controls visible={false} />
                                            </Player>
                                        }
                                        <IonCard className='h-100' key={key} onClick={() => setAnnonceId(annonce.id)}>
                                            <IonImg src={annonce.photo} alt={annonce.nom} />
                                            <IonCardHeader>
                                                <IonCardTitle>{annonce.nom}</IonCardTitle>
                                            </IonCardHeader>
                                        </IonCard>
                                    </div>
                                )
                            })
                            : annonces.map((annonce, key) => {
                                return (
                                    <div key={key} className='position-relative w-25 h-25'>
                                        {annonce.exclu &&
                                            <Player
                                                autoplay
                                                loop
                                                src={bestSaleAnimation}
                                                style={{ height: '150px', width: '150px', position: 'absolute', right: 5, zIndex: 10 }}
                                            >
                                                <Controls visible={false} />
                                            </Player>
                                        }
                                        <IonCard className='h-100' onClick={() => setAnnonceId(annonce.id)}>
                                            <IonImg src={annonce.photo} alt={annonce.nom} />
                                            <IonCardHeader>
                                                <IonCardTitle>{annonce.nom}</IonCardTitle>
                                            </IonCardHeader>
                                        </IonCard>
                                    </div>
                                )
                            })
                        }
                    </IonRow>
                    : <IonContent>
                        <div className='position-relative'>
                            {annonce.exclu &&
                                <Player
                                    autoplay
                                    loop
                                    src={bestSaleAnimation}
                                    style={{ height: '150px', width: '150px', position: 'absolute', right: 5, zIndex: 10 }}
                                >
                                    <Controls visible={false} />
                                </Player>
                            }
                            <IonCard>
                                <IonCardHeader>
                                    <IonCardSubtitle>Vendeur: {annonce?.vendeurName}</IonCardSubtitle>
                                    <IonImg src={annonce?.photo} alt={annonce?.nom} />
                                    <IonCardTitle>{annonce?.nom}</IonCardTitle>
                                </IonCardHeader>
                                <IonCardContent className='d-flex flex-column'>
                                    <IonText>{annonce?.description}</IonText>
                                    <IonChip className=' ms-auto'>
                                        <IonIcon icon={pricetagOutline} color='primary'></IonIcon>
                                        <IonLabel>{annonce?.prix} €</IonLabel>
                                    </IonChip>
                                </IonCardContent>
                            </IonCard>
                        </div>
                        <IonItemGroup className='d-flex justify-content-center gap-5'>
                            <IonButton className='w-25' onClick={() => {
                                setAnnonceId("")
                                setShowAnnonce(false)
                            }} color={"dark"}>Retour</IonButton>
                            {user && <IonButton className='w-25' color="dark" onClick={handleSubmit} >Acheter ce produit</IonButton>}
                        </IonItemGroup>
                    </IonContent>
                }
            </IonContent>
        </IonPage>
    );
};

export default Tab1
