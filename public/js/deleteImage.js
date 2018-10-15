let deleteImageInputValue = document.querySelector('#trick_form_deleteImages').value;

window.addEventListener("load", function () {
    deleteImageInputValue = '';
});

$deleteVideoButtons = document.querySelectorAll('.imageDeleteButton');

$deleteVideoButtons.forEach(function (element) {
    element.addEventListener('click', function () {
        $confirmation = confirm('Voulez-vous vraiment supprimer cette image ? Vous devrez soumettre le formulaire pour enregistrer les changements');
        if ($confirmation) {
            if (deleteImageInputValue !== '') {
                deleteImageInputValue += ',';
            }
            deleteImageInputValue += element.getAttribute('id');
            element.parentElement.parentElement.classList.add('hidden');
        }
    });
});

