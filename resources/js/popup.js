class PopUp  {
    constructor(button) {
        this.openBtn = button;
        this.id = button.dataset.id;
        this.popup = document.querySelector(`#popup-${this.id}`);
        this.closeBtn = this.popup.querySelector('.popup-close');

        this.__show();
        this.__close();
    }

    __show() {
        this.openBtn.addEventListener('click', () => {
            this.popup.classList.add('popup-show');
        });
    }

    __close() {
        this.closeBtn.addEventListener('click', () => {
            this.popup.classList.remove('popup-show');
        });
    }
}

document.querySelectorAll('.popup-open').forEach(button => {
    new PopUp(button);
})
