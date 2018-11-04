let originalContent = document.querySelector(".trick__slider--container");
let clonedContent = originalContent.cloneNode(true);
let modalBody = document.querySelector(".gallery-modal-content");
let showMediaButton = document.querySelector(".gallery-button");
showMediaButton.addEventListener("click", function () {
    modalBody.appendChild(clonedContent);
    clonedContent.classList.remove("gallery");
});
