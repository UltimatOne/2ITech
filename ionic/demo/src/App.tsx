import { Redirect, Route } from 'react-router-dom'
import {
    IonApp,
    IonIcon,
    IonLabel,
    IonRouterOutlet,
    IonTabBar,
    IonTabButton,
    IonTabs,
    setupIonicReact
} from '@ionic/react'
import { IonReactRouter } from '@ionic/react-router'
import { calendar, home, images, logInOutline, person } from 'ionicons/icons'
import Tab1 from './pages/Tab1'
import Tab2 from './pages/Tab2'
import ToDo from './pages/ToDo'
import UserPage from './pages/User'

/* Core CSS required for Ionic components to work properly */
import '@ionic/react/css/core.css'

/* Basic CSS for apps built with Ionic */
import '@ionic/react/css/normalize.css'
import '@ionic/react/css/structure.css'
import '@ionic/react/css/typography.css'

/* Optional CSS utils that can be commented out */
import '@ionic/react/css/padding.css'
import '@ionic/react/css/float-elements.css'
import '@ionic/react/css/text-alignment.css'
import '@ionic/react/css/text-transformation.css'
import '@ionic/react/css/flex-utils.css'
import '@ionic/react/css/display.css'

/**
 * Ionic Dark Mode
 * -----------------------------------------------------
 * For more info, please see:
 * https://ionicframework.com/docs/theming/dark-mode
 */

/* import '@ionic/react/css/palettes/dark.always.css' */
/* import '@ionic/react/css/palettes/dark.class.css' */
import '@ionic/react/css/palettes/dark.system.css'

/* Theme variables */
import './theme/variables.css'
import { useEffect, useState } from 'react'
import { auth, db } from './config'
import { onAuthStateChanged, User } from 'firebase/auth'
import { doc, getDoc } from 'firebase/firestore'
import useFCM from './hooks/useFCM'

setupIonicReact()

const App: React.FC = () => {

    const [user, setUser] = useState<any>("")
    const [currentUser, setCurrentUser] = useState<User | null>(null)

    useFCM()

    useEffect(() => {
        onAuthStateChanged(auth, (currentUser) => {
            setCurrentUser(currentUser)
        })
        const fetchUserData = async () => {
            if(currentUser) {
                const userRef = doc(db, "users", currentUser.uid)
                const userSnap = await getDoc(userRef)

                if (userSnap.exists()) {
                    const data = userSnap.data()
                    setUser(data)
                }
            }
        }
        fetchUserData()
    }, [currentUser])

    return (
        <IonApp>
            <IonReactRouter>
                <IonTabs>
                    <IonRouterOutlet>
                        <Route exact path="/home">
                            <Tab1 user={user} />
                        </Route>
                        <Route exact path="/tab2">
                            <Tab2 user={user} />
                        </Route>
                        <Route exact path="/todo">
                            <ToDo user={user} />
                        </Route>
                        <Route exact path="/user">
                            <UserPage user={user} setUser={setUser} /*logIn={logIn} logOut={logOut}*/ />
                        </Route>
                        <Route exact path="/">
                            <Redirect to="/home" />
                        </Route>
                    </IonRouterOutlet>
                    <IonTabBar slot="bottom">
                        <IonTabButton tab="tab1" href="/home">
                            <IonIcon color="dark" aria-hidden="true" icon={home} />
                            <IonLabel>Accueil</IonLabel>
                        </IonTabButton>
                        <IonTabButton tab="tab2" href="/tab2">
                            <IonIcon color="dark" aria-hidden="true" icon={images} />
                            <IonLabel>Vendre</IonLabel>
                        </IonTabButton>
                        <IonTabButton tab="ToDo" href="/todo">
                            <IonIcon color="dark" aria-hidden="true" icon={calendar} />
                            <IonLabel>Todo</IonLabel>
                        </IonTabButton>
                        {user
                            ? <IonTabButton tab="user" href="/user">
                                <IonIcon color="dark" aria-hidden="true" icon={person} />
                                <IonLabel>Vous</IonLabel>
                            </IonTabButton>
                            : <IonTabButton tab="user" href="/user">
                                <IonIcon color="dark" aria-hidden="true" icon={logInOutline} />
                                <IonLabel>Connexion</IonLabel>
                            </IonTabButton>
                        }
                    </IonTabBar>
                </IonTabs>
            </IonReactRouter>
        </IonApp>
    )
}

export default App
