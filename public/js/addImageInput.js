String.prototype.replaceAll = function (search, replacement) {
    var target = this;
    return target.replace(new RegExp(search, 'g'), replacement);
};

var $imagesForm = document.querySelector('#trick_form_images').parentElement;
$imagesForm.classList += ' d-flex flex-column';
var $imagesInput = document.querySelector('#trick_form_images');
var template = $imagesInput.getAttribute('data-prototype');

var id = 0;

var $button = document.createElement('div');
$button.innerText = 'Ajouter une image';
$button.classList = 'btn btn-primary mt-3';
$button.type = 'addImage';
$button.addEventListener('click', function () {
    addInput(++id);
});
$imagesForm.appendChild($button);


function addInput (id) {
    var newTemplate = template.replaceAll('__name__label__', 'Image').replaceAll('__name__', id).trim();

    var $div = document.createElement('div');
    $div.innerHTML = newTemplate;
    $imagesInput.appendChild($div);
}

