        // Import the functions you need from the SDKs you need
        import { initializeApp } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js";
        import { getDatabase, set, ref, onValue } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-database.js";
        import { initializeMessages } from "./discussions.module.js";
        // TODO: Add SDKs for Firebase products that you want to use
        // https://firebase.google.com/docs/web/setup#available-libraries
      
        // Your web app's Firebase configuration
        const firebaseConfig = {
          apiKey: "AIzaSyB3loENzQZhA7OJR5B4SiE7cWsKZfaQGck",
          authDomain: "htmllabs.firebaseapp.com",
          databaseURL:"htmllabs-default-rtdb.europe-west1.firebasedatabase.app",
          projectId: "htmllabs",
          storageBucket: "htmllabs.appspot.com",
          messagingSenderId: "981866400707",
          appId: "1:981866400707:web:3247f1e5ae16741a2f8b76"
        };

        // Initialize Firebase
        const app = initializeApp(firebaseConfig);
        const database = getDatabase(app);
        const readRef = ref(database);

        function getDiscussionData(){
          onValue(readRef, (snapshot) => {
            const data = snapshot.val();
            console.log("Discussion Data:", data);
            initializeMessages(data);
          }, (error) => {
            console.error("Error reading data:", error);
          });
        }

        
        export function storeData(message, pfp, username){
            let msgJson = {
            message: message,
            pfp: pfp,
            username: username
            }

            let currentDate = new Date();

            set(ref(database, 'messages/' + currentDate.toString()), msgJson)
        };

getDiscussionData();