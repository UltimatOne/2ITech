// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAuth } from "firebase/auth";
import { getFirestore } from "firebase/firestore";

// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries


// Your web app's Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyBme0lw5kyJQDDk_iWa4j7XXf_tSPXKKFU",
  authDomain: "dwwm4-3fc43.firebaseapp.com",
  projectId: "dwwm4-3fc43",
  storageBucket: "dwwm4-3fc43.firebasestorage.app",
  messagingSenderId: "895178358983",
  appId: "1:895178358983:web:dc4390c966a2981eb07ee2"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);

// Pour gérer la l'authentification
export const auth = getAuth(app)

// Pour gérer la db
export const db = getFirestore(app)

export const baseUrl = "http://localhost:3000/"

//console log styles
export const logInfo = "background:white; color:black; padding:1px"
export const logSuccess = "background:green; color:white; padding:1px"
export const logWarning = "background:yellow; color:black; padding:1px"
export const logError = "background:red; color:white; padding:1px"
