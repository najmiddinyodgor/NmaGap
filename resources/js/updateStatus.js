function updateStatus() {
    setInterval( () => {
        fetch('/update-status')
    }, 1000);
}

updateStatus();
