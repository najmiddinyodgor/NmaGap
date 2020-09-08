function search(elem) {
    if(elem !== null) {
        elem.addEventListener('input', function (evt) {
            let text = this.value;
            searchRequest(text);
        });
    }
}

search(document.querySelector('#search'));

async function searchRequest(value) {
    let response = await fetch(`/search?user=${value}`);

    if(response.ok) {
        let arr = await response.json();
        if(arr.length > 0) {
            document.querySelector('.search div').innerHTML = createUsers(arr);
        } else {
            document.querySelector('.search div').innerHTML = 'No users';
        }

    }
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
                </dl>
            </div>
        `
    });

    return out;
};
