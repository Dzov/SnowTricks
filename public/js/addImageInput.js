String.prototype.replaceAll = function (search, replacement) {
    var target = this;
    return target.replace(new RegExp(search, 'g'), replacement);
};

var $imagesForm = document.querySelector('#trick_form_images').parentElement;
$imagesForm.classList += ' d-flex flex-column';
var $imageInputs = document.querySelector('#trick_form_images');
var template = $imageInputs.getAttribute('data-prototype');

var $button = document.createElement('div');
$button.innerText = 'Ajouter une image';
$button.classList = 'btn btn-primary mt-3';
$button.type = 'addImage';
$button.addEventListener('click', function () {
    addInput(id++);
});
$imagesForm.appendChild($button);


$imageEditionInputs = [];
$regex = new RegExp('trick_form_images_[\\d]+$');
$haystack = document.querySelectorAll('[id^=trick_form_images]');

for (var i = 0; i < $haystack.length; i++) {
    if ($regex.test($haystack[i].id)) {
        $imageEditionInputs.push($haystack[i]);
    }
}

for (var j = 0; j < $imageEditionInputs.length; j++) {
    $imageEditionInputs[j].className = 'hidden';
}


id = $imageEditionInputs.length + 1;

console.log(id);

function addInput (id) {
    var newTemplate = template.replaceAll('__name__label__', 'Image').replaceAll('__name__', id).trim();

    var $div = document.createElement('div');
    $div.innerHTML = newTemplate;
    $imageInputs.appendChild($div);
}

