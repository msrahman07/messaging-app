// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyAc8OR_JK8PsW7hCTvonT1LzAFkeQAF56w",
  authDomain: "messagingapp-9b8dd.firebaseapp.com",
  projectId: "messagingapp-9b8dd",
  storageBucket: "messagingapp-9b8dd.appspot.com",
  messagingSenderId: "645017482434",
  appId: "1:645017482434:web:24b4d701079ca4eb4bf75b"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);

const db = app.firestore();
const auth = app.auth();
const provider = new firebase.auth.GoogleAuthProvider();

export {db, auth, provider}