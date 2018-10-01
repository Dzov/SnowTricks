var nextId = function () {
    var imageInputNumbers = [];
    var regex = new RegExp('trick_form_images_(\\d)_file');
    var haystack = document.querySelectorAll('[id^=trick_form_images]');

    haystack.forEach(function (element) {
        if (regex.test(element.id)) {

            imageInputNumbers.push(parseInt(element.id.replace(/[^\d.]/g, '')));
        }
    });

    imageInputNumbers.sort(function (a, b) {
        return a - b;
    });

    return imageInputNumbers.pop() + 1;
};

String.prototype.replaceAll = function (search, replacement) {
    var target = this;
    return target.replace(new RegExp(search, 'g'), replacement);
};

var imageFormInputs = document.querySelector('#trick_form_images');

var template = imageFormInputs.getAttribute('data-prototype');
imageFormInputs.style.border = 'none';
imageFormInputs.style.width = 'auto';

for (var j = 0; j < imageFormInputs.childElementCount - 1; j++) {
    imageFormInputs.children[j].classList.add('hidden');
}

function addInput (id) {
    var newTemplate = template.replaceAll('__name__label__', 'Image').replaceAll('__name__', id).trim();

    var div = document.createElement('div');
    div.classList.add('mr-3');
    div.innerHTML = newTemplate;
    imageFormInputs.insertBefore(div, imageFormInputs.firstChild);
}

function previewImage (input) {
    var reader = new FileReader();
    var images = document.querySelectorAll('.' + input.id + '_img');
    reader.onload = function (e) {
        for (var i = 0; i < images.length; i++) {
            images[i].setAttribute('src', e.target.result);
        }
    };

    reader.readAsDataURL(input.files[0]);
    if (input.id === ('trick_form_images_' + (nextId() - 1) + '_file')) {
        addInput(nextId());
    }
}

document.addEventListener("DOMContentLoaded", function () {
    if (isNaN(nextId())) {
        addInput(0);
    }

    var uploadIcon = document.querySelectorAll('[src="/OpenClassrooms/P5-SnowTricks/SnowTricks/snow-tricks/public/uploads/images/file_upload.png"]');
    if (uploadIcon.length === 0) {
        addInput(nextId());
    }
});



console.log(nextId());
