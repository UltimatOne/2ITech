import { IonButton, IonCol, IonContent, IonItem, IonRow, IonText } from '@ionic/react'
import { collection, doc, getDocs, query, updateDoc, where } from 'firebase/firestore'
import React, { useEffect, useState } from 'react'
import { db, logError } from '../config'

const MySales: React.FC<{ user: any }> = ({ user }) => {

    const [mySales, setMySales] = useState<any[]>([])

    const getMySales = async () => {
        try {
            const q = query(collection(db, "orders"), where("vendeur", "==", user.uid))
            const querySnapshot = await getDocs(q)
            const mySalesTmp: any[] = []
            querySnapshot.forEach((doc) => {
                mySalesTmp.push({ id: doc.id, ...doc.data() })
            })
            setMySales(mySalesTmp)
        } catch (error) {
            console.log("%c error", logError, error)
        }
    }

    useEffect(() => {
        if (user.uid) {
            getMySales()
        }
    }, [user])

    const handleSubmit = async (id: string) => {
        const saleRef = doc(db, "orders", id)
        await updateDoc(saleRef, {
            checked: true
        });
        setMySales(mySales.map((sale) => {
            return sale.id === id ? { ...sale, checked: true } : sale
        }))
    }


    return (
        mySales.length > 0
            ? <IonCol>
                <IonContent>
                    {mySales.map((sale, key) => {
                        return (
                            <IonItem key={key}>
                                <IonCol>
                                    <IonRow>Produit :{sale.productName}</IonRow>
                                    <IonRow>Acheteur :{sale.acheteurName}</IonRow>
                                    <IonRow>Montant :{sale.productPrice} €</IonRow>
                                </IonCol>
                                {!sale.checked
                                    && <>
                                        <IonText color={"success"}>Nouveau</IonText>
                                        <IonButton onClick={() => handleSubmit(sale.id)} color={"primary"}>ok</IonButton>
                                    </>
                                }
                            </IonItem>
                        )
                    })}
                </IonContent>
            </IonCol>
            : null
    )
}

export default MySales;