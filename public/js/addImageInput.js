let nextId = function () {
    let imageInputs = document.querySelectorAll('.imageInput');
    let regex = new RegExp('trick_form_images_(\\d)_file');

    let imageInputNumbers = [];
    for (let imageInput of imageInputs){
        imageInputNumbers.push(parseInt(imageInput.id.match(regex)[1]));
    }

    imageInputNumbers.sort(function (a, b) {
        return a - b;
    });


    return imageInputNumbers.pop() + 1;
};

String.prototype.replaceAll = function (search, replacement) {
    let target = this;
    return target.replace(new RegExp(search, 'g'), replacement);
};

let imageFormInputs = document.querySelector('#trick_form_images');

let template = imageFormInputs.getAttribute('data-prototype');
imageFormInputs.style.border = 'none';
imageFormInputs.style.width = 'auto';

for (let j = 0; j < imageFormInputs.childElementCount - 1; j++) {
    imageFormInputs.children[j].classList.add('hidden');
}

function addInput (id) {
    let newTemplate = template.replaceAll('__name__label__', 'Image').replaceAll('__name__', id).trim();

    let div = document.createElement('div');
    div.classList.add('mr-3');
    div.innerHTML = newTemplate;
    imageFormInputs.insertBefore(div, imageFormInputs.firstChild);
}

function previewImage (input) {
    let reader = new FileReader();
    let images = document.querySelectorAll('.' + input.id + '_img');
    reader.onload = function (e) {
        for (let i = 0; i < images.length; i++) {
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

    let uploadIcon = document.querySelectorAll('[src="/OpenClassrooms/P5-SnowTricks/SnowTricks/snow-tricks/public/uploads/images/file_upload.png"]');
    if (uploadIcon.length === 0) {
        addInput(nextId());
    }
});
