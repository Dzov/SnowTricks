window.addEventListener("load", function () {
    document.querySelector("#trick_form_deleteImages").value = "";
});

let deleteVideoButtons = document.querySelectorAll(".imageDeleteButton");

deleteVideoButtons.forEach(function (element) {
    element.addEventListener("click", function () {
        let confirmation = confirm("Voulez-vous vraiment supprimer cette image ? Vous devrez soumettre le formulaire pour enregistrer les changements");
        if (confirmation) {
            if (document.querySelector("#trick_form_deleteImages").value !== "") {
                document.querySelector("#trick_form_deleteImages").value += ",";
            }
            document.querySelector("#trick_form_deleteImages").value += element.getAttribute("id");
            element.parentElement.parentElement.classList.add("hidden");
        }
    });
});

