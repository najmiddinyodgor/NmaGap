function autoGrowTextArea () {
    let elem = document.querySelector('#grow');
    if(elem){
        elem.addEventListener('keyup', function (evt) {
            let elem = evt.target;
            if (elem.clientHeight < elem.scrollHeight) {
                elem.style.height = elem.scrollHeight + "px";
                if (elem.clientHeight < elem.scrollHeight) {
                    elem.style.height =
                        elem.scrollHeight * 2 - elem.clientHeight + "px";
                }
            }
        })
    }
};

autoGrowTextArea();
