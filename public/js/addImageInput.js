String.prototype.replaceAll = function (search, replacement) {
    var target = this;
    return target.replace(new RegExp(search, 'g'), replacement);
};

var $imagesForm = document.querySelector('#trick_form_images').parentElement;
$imagesForm.classList += ' d-flex flex-column';
var $imageFormInputs = document.querySelector('#trick_form_images');
$imageFormInputs.classList += ' hidden d-flex flex-column align-items-center';
$imageFormInputs.style.border = 'none';
var template = $imageFormInputs.getAttribute('data-prototype');

$imageEditionInputs = [];
$regex = new RegExp('trick_form_images_[\\d]+$');
$inputHaystack = document.querySelectorAll('[id^=trick_form_images]');
$labels = document.querySelectorAll('[for^=trick_form_images]');
$labelHaystack = [];


for (var i = 0; i < $inputHaystack.length; i++) {
    if ($regex.test($inputHaystack[i].id)) {
        $imageEditionInputs.push($inputHaystack[i]);
    }
}


for (var j = 0; j < $imageEditionInputs.length; j++) {
    $imageEditionInputs[j].className = 'hidden';
    template.replaceAll('__name__label__', 'Image').replaceAll('__name__', j).trim();
}

id = $imageEditionInputs.length + 1;

var $button = document.createElement('div');
$button.innerText = 'Ajouter une image';
$button.classList = 'btn btn-primary mt-3';
$button.type = 'addImage';
$button.addEventListener('click', function () {
    $imageFormInputs.classList.remove('hidden');
    addInput(id++);
});
$imagesForm.appendChild($button);


function addInput (id) {
    var newTemplate = template.replaceAll('__name__label__', 'Image').replaceAll('__name__', id).trim();

    var $div = document.createElement('div');
    $div.innerHTML = newTemplate;
    $imageFormInputs.appendChild($div);
}
