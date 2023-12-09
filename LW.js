
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration

/*
const firebaseConfig = {
  apiKey: "AIzaSyB3loENzQZhA7OJR5B4SiE7cWsKZfaQGck",
  authDomain: "htmllabs.firebaseapp.com",
  projectId: "htmllabs",
  storageBucket: "htmllabs.appspot.com",
  messagingSenderId: "981866400707",
  appId: "1:981866400707:web:3247f1e5ae16741a2f8b76"
};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);
let database = firebase.database();
let msgsRef = database.ref('messages');

*/


let imgIndex = 0;
let imageSources = ['me.jpg', 'ski.png', 'rundkast.png', 'peng.png'];


function changeImg(index){
    //Fetches the element
    let img = document.getElementById("aboutImg");
    //Adjusts the index
    imgIndex += index;
    

    //Ensures that we don't exceed boundaries 
    if(imgIndex < 0) imgIndex = imageSources.length-1;
    if(imgIndex >= imageSources.length) imgIndex = 0;
    
    //Sets the image source
    img.src = imageSources[imgIndex];
}

function decodeJwtResponse(token) {
    var base64Url = token.split(".")[1];
    var base64 = base64Url.replace(/-/g, "+").replace(/_/g, "/");
    var jsonPayload = decodeURIComponent(
    atob(base64)
    .split("")
    .map(function (c) {
        return "%" + ("00" + c.charCodeAt(0).toString(16)).slice(-2);
    })
    .join("")
    );

    let signInBtn = document.getElementById('google-sign-in-btn');
    signInBtn.remove();

    return JSON.parse(jsonPayload);
}


function handleCredentialResponse(response) {
   // decodeJwtResponse() is a custom function defined by you
   // to decode the credential response.
    const responsePayload = decodeJwtResponse(response.credential);

    let pfp = responsePayload.picture;
    let username = responsePayload.name;

    let msgBox = document.getElementById('discussion-message');
    msgBox.dataset.username = username;
    msgBox.dataset.pfp = pfp;

    console.log('Full name: ', responsePayload.name);
    console.log('pic url: ', responsePayload.picture);
    console.log('locale: ', responsePayload.locale);
}