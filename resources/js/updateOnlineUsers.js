async function updateOnlineUsers(button) {
    let timer = setTimeout(async function update() {
        let response = await fetch('/online-users');
        if(response.ok) {
            let arr = await response.json();
            button.innerHTML = "Online users: " + arr.length;
            document.querySelector('.users div').innerHTML = createUsers(arr);
        }
        timer = setTimeout(update, 5000);
    }, 100);
}

function createUsers(arr) {
    let out = '';

    arr.forEach(user => {
        out += `
            <div class="user-info">
                <a href="/dialog/${user.id}"></a>
                <p class="avatar">
                    <img src="/storage/images/${user.avatar}" alt='user photo'>
                </p>
                <dl>
                    <dt class="primary-text">${user.login}</dt>
                    <dd class="succes-text">
                        online
                    </dd>
                </dl>
            </div>
        `
    });

    return out;
}

let button = document.querySelector('.modal-btn');
if(button) {
    updateOnlineUsers(button);
}
