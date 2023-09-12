const myMessages = document.querySelector("#messages");

let lastMsgId = 0;
/**
 * Load ALL messages
 */

let audio = new Audio("sounds/bing1-91919.mp3")

//let msgData; 
function loadMessages() {
    fetch("views/chat.php?loadAll")
        .then((result) => result.json())
        .then((data) => {
            console.log(data);
            //msgData = data;
            myMessages.innerHTML = "";

            data.forEach(element => {
                let who = (element.uid !== window.myUserId) ? 'they' : 'me';
                let msgBox = `
                <span class="msg ${who}" data-id="${element.id}">
                    ${element.message}<br>
                    <i>${element.uname}</i>
                </span>
                <br>
            `;
                myMessages.innerHTML += msgBox;
            });

            lastMsgId = data[data.length - 1].id;


        });
}
loadMessages();

/**
 * Sending A message
 */

const chatForm = document.getElementById("msg-box");

chatForm.addEventListener("submit", (event) => {
    event.preventDefault();

    let chatFormData = new FormData(chatForm);

    fetch("views/chat.php?post", { body: chatFormData, method: "POST" })
        .then((res) => {
            refreshMessages();
        });

    chatForm.reset();
});

/**
 * Refreshing the messages
 */

function refreshMessages() {

    let refreshFormData = new FormData();
    refreshFormData.set('lastMsgId', lastMsgId);

    fetch("views/chat.php?resfreshMessages", { body: refreshFormData, method: "POST" })
        .then((res) => res.json())
        .then((data) => {
            console.log(data);

            if (data.length !== 0) {
                audio.play();
                data.forEach(element => {
                    let who = (element.uid !== window.myUserId) ? 'they' : 'me';
                    let msgBox = `
                    <span class="msg ${who}" data-id="${element.id}">
                        ${element.message}<br>
                        <i>${element.uname}</i>
                    </span>
                    <br>
                `;
                    myMessages.innerHTML += msgBox;
                });

                lastMsgId = data[data.length - 1].id;
            }
        });

}

setInterval(refreshMessages, 5000); // 5000 in ms = 5s