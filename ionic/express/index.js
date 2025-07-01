const express = require('express')
const app = express()
const port = 3000
const fs = require("fs")
const path = require("path")
const cors = require("cors")

app.use('/public', express.static(path.join(__dirname, 'public')))
app.use(cors("*"))
app.use(express.json({ limit: "1000mb" }))

app.get('/', (req, res) => {
  res.send('Hello World!')
})

app.post('/uploads', (req, res) => {

  const { base64Image, photo } = req.body;
  if (!base64Image) {
    return res.status(400).send('Aucune image envoyée');
  }
  const base64Data = base64Image.replace(/^data:image\/(png|jpeg|jpg);base64,/, '');

  const uploadDir = path.join(__dirname, 'public');

  if (!fs.existsSync(uploadDir)) {
    fs.mkdirSync(uploadDir)
  }

  try {
    fs.writeFile((path.join(uploadDir, photo)), base64Data, 'base64', () => { })
    return res.send(photo)
  } catch (error) {
    console.error("erreur", error)
    return res.status(500).send("Echec de l'enregistrement")
  }

})

// Notifications
const admin = require("firebase-admin")
const serviceAccount = require("./serviceAccountKey.json")

admin.initializeApp({
  credential: admin.credential.cert(serviceAccount)
})

const db = admin.firestore();
module.exports = { admin, db };

app.post("/save-token", async (req, res) => {
  const { userId, token } = req.body
  if (!userId || !token) {
    return res.status(400).send("Données manquantes")
  }
  try {
    await db.collection("users").doc(userId).set(
      { fcmToken: token },
      { merge: true }
    )
    console.log("FCM", token)
    res.send({ succes: true })
  } catch (error) {
    console.log("Firestore error", error)
    res.status(500).send("Erreur enregistrement token")
  }
})

/*****************************************ACHAT */
//*****************************************ACHAT */
app.post('/fake-payment', async (req, res) => {
  const { userId, productName, productId } = req.body;


  if (!userId) return res.status(400).send('userId requis');

  try {
    const userDoc = await db.collection('users').doc(userId).get();
    const fcmToken = userDoc.data()?.fcmToken;

    if (!fcmToken) {
      return res.status(404).send('Token FCM non trouvé');
    }

    const message = {
      notification: {
        title: 'Nouvelle vente',
        body: `Votre produit "${productName}" a été acheté`
      },
      data: {
        url: `/show/${productId.toString()}`, // Assure-toi que c'est bien une string
      },
      token: fcmToken
    };
    console.log(message);

    await admin.messaging().send(message);
    res.send({ success: true, message: 'Notification envoyée avec succès' });
  } catch (err) {
    console.error('Erreur envoi test notification :', err);
    res.status(500).send('Erreur envoi notification');
  }
});


app.listen(port, "0.0.0.0", () => {
  console.log(`Example app listening on port ${port}`)
})