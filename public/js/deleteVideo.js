let deleteVideoInputValue = document.querySelector('#trick_form_deleteVideos').value;
let deleteVideoButtons = document.querySelectorAll('.videoDeleteButton');

window.addEventListener("load", function () {
    deleteVideoInputValue = '';
});

deleteVideoButtons.forEach(function (element) {
    element.addEventListener('click', function () {
        let videoInputId = element.previousSibling.previousSibling.getAttribute('for');
        $confirmation = confirm('Voulez-vous vraiment supprimer cette video ? Vous devrez soumettre le formulaire pour enregistrer les changements');
        if ($confirmation) {
            if (deleteVideoInputValue !== '') {
                deleteVideoInputValue += ',';
            }
            deleteVideoInputValue += element.getAttribute('id');
            element.parentElement.parentElement.classList.add('hidden');
            document.querySelector('#' + videoInputId).remove();
        }
    });
});
