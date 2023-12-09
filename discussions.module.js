import { storeData } from "./firestore.module.js";

function postDiscussionMessage(){

    let username = msgBox.dataset.username;
    let pfp = msgBox.dataset.pfp;

    if(username == '' || pfp == ''){
        alert('You must sign in before posting a message')
        return;
    }

    let discDiv = document.createElement('div');
    let userNameField = document.createTextNode(username);
    let discText = document.createElement('p');
    let discImg = new Image();

    discImg.src = pfp;
    discImg.height = 50;
    discImg.width = 50;
    discImg.classList.add('disc-img');

    discText.textContent = msgBox.value;
    discText.classList.add('disc-body-text');
    
    discDiv.className = 'disc-grid-item';
    discDiv.appendChild(discImg);
    discDiv.appendChild(userNameField);
    discDiv.appendChild(discText);

    document.getElementById('disc-grid-container').appendChild(discDiv);

    storeData(msgBox.value, pfp, username);
    msgBox.value = '';

}


export function initializeMessages(data){

    //Delete all current children
    let messageContainer = document.getElementById('disc-grid-container');
    while (messageContainer.firstChild) {
        messageContainer.removeChild(messageContainer.firstChild);
    }

    for(const timestamp in data.messages){

        const message = data.messages[timestamp];

        console.log("Username", message.username);
        console.log("pfp", message.pfp);


        let discDiv = document.createElement('div');
        let userNameField = document.createTextNode(message.username);
        let discText = document.createElement('p');
        let discImg = new Image();
    
        discImg.src = message.pfp;
        discImg.height = 50;
        discImg.width = 50;
        discImg.classList.add('disc-img');
    
        discText.textContent = message.message;
        discText.classList.add('disc-body-text');
        
        discDiv.className = 'disc-grid-item';
        discDiv.appendChild(discImg);
        discDiv.appendChild(userNameField);
        discDiv.appendChild(discText);
    
        messageContainer.appendChild(discDiv);
    }
}


document.getElementById('disc-msg-btn').addEventListener('click', postDiscussionMessage);
let msgBox = document.getElementById('discussion-message');



/*
function postDiscussionMessage(){


    if(username == '' || pfp == ''){
        alert('You must sign in before posting a message')
        return;
    }

    let discDiv = document.createElement('div');
    let messageBox = document.getElementById('discussion-message');
    let userNameField = document.createTextNode(username);
    let discText = document.createElement('p');
    let discImg = new Image();

    discImg.src = pfp;
    discImg.height = 50;
    discImg.width = 50;
    discImg.classList.add('disc-img');

    discText.textContent = messageBox.value;
    discText.classList.add('disc-body-text');
    
    discDiv.className = 'disc-grid-item';
    discDiv.appendChild(discImg);
    discDiv.appendChild(userNameField);
    discDiv.appendChild(discText);

    document.getElementById('disc-grid-container').appendChild(discDiv);

    messageBox.value = '';

    storeData(messageBox.value, pfp, username);
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

    pfp = responsePayload.picture;
    username = responsePayload.name;

    console.log('Full name: ', responsePayload.name);
    console.log('pic url: ', responsePayload.picture);
    console.log('locale: ', responsePayload.locale);
}

*/