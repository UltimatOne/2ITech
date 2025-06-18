import { IonButton, IonCheckbox, IonCol, IonContent, IonHeader, IonIcon, IonInput, IonItem, IonLabel, IonList, IonPage, IonRow, IonText, IonTitle, IonToolbar } from '@ionic/react';
import { add, createOutline, trash } from 'ionicons/icons';
import React, { useEffect, useState } from 'react';
import "./Todo.css"
import { useHistory } from 'react-router';
import { addDoc, collection, doc, onSnapshot, query, updateDoc, where } from 'firebase/firestore';
import { db, logError } from '../config';

const ToDo: React.FC<{ user: any }> = ({ user }) => {
    const [tasks, setTasks] = useState<{ id: string, name: string, completed: boolean }[]>([])
    const [task, setTask] = useState<{ id: string, name: string, completed: boolean, }>({ id: "", name: "", completed: false })

    useEffect(() => {
        if (!user) return
        try {
            const q = query(collection(db, "todo"), where("userId", "==", user.uid))
            const tasksSnapshot = onSnapshot(q, (snapshot) => {
                const tasksTmp = snapshot.docs.map((task) => {
                    const taskTmp = task.data()
                    return {
                        id: task.id,
                        name: taskTmp.name,
                        completed: taskTmp.completed
                    }
                })
                setTasks(tasksTmp)
            })
            return () => tasksSnapshot()
        } catch (error) {
            console.log("%c error", logError, error)
        }
    }, [user])

    const handleSubmit = async () => {
        if (task.name !== "") {
            const doc = await addDoc(collection(db, "todo"), {
                name: task.name,
                completed: false,
                userId: user.uid,
            })
            setTasks([...tasks, {...task, id: doc.id}])
            setTask({...task, name: ""})
        }
    }

    function handleChange(e: any) {
        setTask({...task, name: e.detail.value})
    }

    async function handleCompleted(id: string) {
        let completedTmp
        for (const task of tasks) {
            if (task.id === id) {
                completedTmp = task.completed
            }
        }
        const taskRef = doc(db, "todo", id)
        await updateDoc(taskRef, {
            completed: !completedTmp
        })

        setTasks(tasks.map((task) =>
            task.id === id ? { ...task, completed: !task.completed } : task)
        )
    }

    const navigate = useHistory()

    return (
        <IonPage>
            <IonHeader>
                <IonToolbar>
                    <IonTitle>ToDo</IonTitle>
                </IonToolbar>
            </IonHeader>
            <IonContent fullscreen>
                <IonHeader collapse="condense">
                    <IonToolbar>
                        <IonTitle size="large">ToDo</IonTitle>
                    </IonToolbar>
                </IonHeader>
                {user &&
                    <IonItem>
                        <IonText>Bienvenue {user.prenom} !</IonText>
                    </IonItem>
                }
                {user
                    ? <>
                        <IonItem style={{ marginTop: "10px" }}>
                            <IonInput
                                label='Saisir une tâche'
                                labelPlacement='floating'
                                placeholder='Saisir une tâche'
                                name='task'
                                value={task.name}
                                onIonChange={handleChange}
                            />
                            <IonButton shape='round' color="dark" slot='end' onClick={handleSubmit}>
                                <IonIcon aria-hidden="true" icon={add} />
                            </IonButton>
                        </IonItem>
                        <IonList style={{ marginTop: "20px" }}>
                            {
                                tasks.map((t) =>
                                    <IonItem key={t.id}>
                                        <IonCheckbox checked={t.completed} onClick={() => handleCompleted(t.id)} />
                                        <IonLabel className={t.completed ? "completed" : ""} onClick={() => handleCompleted(t.id)}>
                                            {t.name}
                                        </IonLabel>
                                        <IonButton color="primary" onClick={() => { }}>
                                            <IonIcon aria-hidden="true" icon={createOutline} />
                                        </IonButton>
                                        <IonButton color={"danger"} onClick={() => { }}>
                                            <IonIcon aria-hidden="true" icon={trash} />
                                        </IonButton>
                                    </IonItem>
                                )
                            }
                        </IonList>
                    </>
                    : <IonCol className='d-flex flex-column h-100 justify-content-center align-items-center gap-5'>
                        <IonRow>Vous devez être connecté pour accéder à cette page</IonRow>
                        <IonButton color={"dark"} onClick={() => navigate.push("/user")} children={"Connexion"} />
                    </IonCol>
                }
            </IonContent>
        </IonPage>
    );
};

export default ToDo;