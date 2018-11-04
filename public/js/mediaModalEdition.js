let content = document.querySelector('.gallery');

let modalBody = document.querySelector('.gallery-modal-content');
let showMediaButton = document.querySelector('.gallery-button');

function setModalContent () {
    showMediaButton.addEventListener("click", function () {
        modalBody.appendChild(content);
        content.classList.remove('gallery');
    });
}

function setPageContent () {
    let pageBody = document.querySelector('.trick_edit_form');
    pageBody.insertBefore(content, pageBody.firstChild);
    content.classList.add('gallery');
}

window.addEventListener('resize', function () {
    if (document.documentElement.clientWidth < 740) {
        setModalContent();
    }

    if (document.documentElement.clientWidth > 740) {
        setPageContent();
    }
}, true);

if (document.documentElement.clientWidth < 740) {
    setModalContent();
}
