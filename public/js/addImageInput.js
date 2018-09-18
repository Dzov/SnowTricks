// String.prototype.replaceAll = function (search, replacement) {
//     var target = this;
//     return target.replace(new RegExp(search, 'g'), replacement);
// };
//
// var $imageFormInputs = document.querySelector('#trick_form_images');
// $imageFormInputs.classList += '  d-flex flex-column align-items-center';
// $imageFormInputs.style.border = 'none';
// var template = $imageFormInputs.getAttribute('data-prototype');
//

//
// for (var i = 0; i < $haystack.length; i++) {
//     if ($regex.test($haystack[i].id)) {
//         $imageEditionInputs.push($haystack[i]);
//     }
// }
//
// // TODO -> see if can replace images with original input, if yes, remove hidden class
//
// for (var j = 0; j < $imageEditionInputs.length; j++) {
//     $imageEditionInputs[j].className = 'hidden';
// }
//
function getNextInputId () {
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
}

String.prototype.replaceAll = function (search, replacement) {
    var target = this;
    return target.replace(new RegExp(search, 'g'), replacement);
};

function addInput () {
    var imageFormInputs = document.querySelector('#trick_form_images');
    var template = imageFormInputs.getAttribute('data-prototype');
    // $imageFormInputs.classList += '  d-flex flex-column align-items-center';
    // $imageFormInputs.style.border = 'none';
    var newTemplate = template.replaceAll('__name__label__', 'Image').replaceAll('__name__', getNextInputId()).trim();

    var div = document.createElement('div');
    div.innerHTML = newTemplate;
    imageFormInputs.appendChild(div);
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
    if (input.id === ('trick_form_images_' + (getNextInputId() - 1) + '_file')) {
        console.log('poop');
        addInput(getNextInputId());
    }
}


