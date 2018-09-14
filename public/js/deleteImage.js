window.addEventListener("load", function(){
    document.querySelector('#trick_form_deleteImages').value = '';
});

$deleteButtons = document.querySelectorAll('.imageDeleteButton');

$deleteButtons.forEach(function (element) {
    element.addEventListener('click', function () {
        $confirmation = confirm('Voulez-vous vraiment supprimer cette image ?');
        if ($confirmation) {
            if (document.querySelector('#trick_form_deleteImages').value !== '') {
                document.querySelector('#trick_form_deleteImages').value += ',';
            }
            document.querySelector('#trick_form_deleteImages').value += element.getAttribute('id');
            element.parentElement.parentElement.classList.add('toDelete');
        }
    });
});

