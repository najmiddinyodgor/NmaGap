class Messages {
    constructor(id) {
        this.id = id;
    }

    init() {
        let interval = 5000;
        setInterval(async () => {
            let response = await fetch(`/messages/update/${this.id}`);
            if(response.ok) {
                let data = await response.json();
                if(data.length > 0) {
                    document.querySelector('.messages').appendChild(this.__joinAllMsg(data));
                }
            }
        }, interval);
    }

    __joinAllMsg(arr) {
        let fragment = document.createDocumentFragment();
        for(let i = 0; i < arr.length; i++) {
            let msg = document.createElement('div');
            msg.classList.add('msg', 'msg-in');
            msg.innerHTML = this.__createMsg(arr[i]);
            fragment.appendChild(msg);
        }
        return fragment;
    }

    __createMsg(msg) {
        return (
            `<div class='msg-wrap'>
                <a href='/dialog/${msg.from_user}'></a>
                <p class='msg-photo avatar'>
                <img src='/storage/images/${msg.avatar}' alt='user photo'>
                </p>
                <p class='primary-text msg-text'>${msg.message}</p>
                </div>
                <div class='msg-wrap'>
                <h3 class='secondary-text'>${msg.login}</h3>
                <span class='secondary-text'>${msg.sent_at}</span>
            </div>`
        );
    }
}

let elem = document.querySelector('#id');
let id = elem?elem.value:1;
let messages = new Messages(id);
messages.init();
