window.addEventListener("load", function () {
    document.querySelector('#trick_form_deleteVideos').value = '';
});

let deleteVideoButtons = document.querySelectorAll('.videoDeleteButton');

deleteVideoButtons.forEach(function (element) {
    element.addEventListener('click', function () {
        let videoInputId = element.previousSibling.previousSibling.getAttribute('for');
        $videoConfirmation = confirm('Voulez-vous vraiment supprimer cette video ? Vous devrez soumettre le formulaire pour enregistrer les changements');
        if ($videoConfirmation) {
            if (document.querySelector('#trick_form_deleteVideos').value !== '') {
                document.querySelector('#trick_form_deleteVideos').value += ',';
            }
            document.querySelector('#trick_form_deleteVideos').value += element.getAttribute('id');
            element.parentElement.parentElement.classList.add('hidden');
            document.querySelector('#' + videoInputId).remove();
        }
    });
});
