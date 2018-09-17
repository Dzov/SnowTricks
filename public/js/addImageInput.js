String.prototype.replaceAll = function (search, replacement) {
    var target = this;
    return target.replace(new RegExp(search, 'g'), replacement);
};

function previewImage (input) {
    var ext = input.files[0]['name'].substring(input.files[0]['name'].lastIndexOf('.') + 1).toLowerCase();
    if (input.files && input.files[0] && (ext === "png" || ext === "jpeg" || ext === "jpg")) {
        var reader = new FileReader();
        console.log(input.id + '_img');
        var images = document.querySelectorAll('.' + input.id + '_img');
        reader.onload = function (e) {
            for (var i = 0; i < images.length; i++) {
                images[i].setAttribute('src', e.target.result);
            }
        }

        reader.readAsDataURL(input.files[0]);
    } else {
        document.getElementById(input.id + '_img').setAttribute('src', 'uploads/images/file_upload.png');
    }

}

var $imageFormInputs = document.querySelector('#trick_form_images');
$imageFormInputs.classList += '  d-flex flex-column align-items-center';
$imageFormInputs.style.border = 'none';
var template = $imageFormInputs.getAttribute('data-prototype');

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

id = $imageEditionInputs.length;

addInput(id);

function addInput (id) {
    var newTemplate = template.replaceAll('__name__label__', 'Image').replaceAll('__name__', id).trim();

    var $div = document.createElement('div');
    $div.innerHTML = newTemplate;
    $imageFormInputs.appendChild($div);
}

