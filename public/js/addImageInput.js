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
imageFormInputs.classList += ' d-flex align-items-center';
imageFormInputs.style.border = 'none';

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

if (isNaN(nextId() ))
{
    addInput(0);
}


// function addControls (input) {
//     var controlsDiv = document.createElement('div');
//     controlsDiv.classList += 'controls d-flex justify-content-around';
//
//     var editLabel = document.createElement('label');
//     editLabel.htmlFor = input.id;
//     editLabel.classList.add('imageEditionPencil');
//     var pencilIcon = document.createElement('i');
//     pencilIcon.classList += "fa fa-pencil";
//     editLabel.appendChild(pencilIcon);
//
//     var deleteLabel = document.createElement('label');
//     deleteLabel.classList.add('imageDeleteButton');
//     var deleteIcon = document.createElement('i');
//     deleteIcon.classList += 'fa fa-trash';
//     deleteLabel.appendChild(deleteIcon);
//
//     controlsDiv.appendChild(editLabel);
//     controlsDiv.appendChild(deleteLabel);
//
//     if (input.parentElement.nextSibling)
//
//     input.parentElement.parentElement.appendChild(controlsDiv);
// }
