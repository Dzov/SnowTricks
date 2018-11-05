let nextId = function () {
    let imageInputs = document.querySelectorAll(".imageInput");
    let regex = new RegExp("trick_form_images_(\\d)_file");

    let imageInputNumbers = [];
    for (let imageInput of imageInputs) {
        imageInputNumbers.push(parseInt(imageInput.id.match(regex)[1]));
    }

    imageInputNumbers.sort(function (a, b) {
        return a - b;
    });


    return imageInputNumbers.pop() + 1;
};

function removeUpload(element)
{
    let inputToRemove = document.querySelector("#" + element);
    inputToRemove.parentElement.parentElement.remove();
}

function createTemplate () {
    let htmlTemplate =
        '<div>' +
        '    <div id="trick_form_images___name__">' +
        '        <div>' +
        '            <label for="trick_form_images___name___file" class="mb-0">' +
        '                <img src='+imageSource+' width="150" height="150" class="trick_form_images___name___file_img">' +
        '            </label>' +
        '            <input type="file" hidden id="trick_form_images___name___file" class="imageInput" name="trick_form[images][__name__][file]" onchange="previewImage(this)">' +
        '        </div>' +
        '        <div class="controls d-flex justify-content-around hidden" id="trick_form_images___name___file_controls">' +
        '            <label for="trick_form_images___name___file" class="imageEditionPencil">'+
        '                <i class="fa fa-pencil"></i>' +
        '            </label>' +
        '            <label onclick="removeUpload(\'trick_form_images___name__\')">' +
        '                <i class="fa fa-trash"></i>' +
        '            </label>' +
        '        </div>' +
        '    </div>' +
        '</div>';

    return htmlTemplate;
}

String.prototype.replaceAll = function (search, replacement) {
    let target = this;
    return target.replace(new RegExp(search, "g"), replacement);
};

let imageFormInputs = document.querySelector("#trick_form_images");
imageFormInputs.setAttribute("data-prototype", createTemplate());
imageFormInputs.style.border = "none";
imageFormInputs.style.width = "auto";

for (let j = 0; j < imageFormInputs.childElementCount - 1; j++) {
    imageFormInputs.children[j].classList.add("hidden");
}

function addInput (id) {
    let rawTemplate = createTemplate();
    let newTemplate = rawTemplate.replaceAll("__name__label__", "Image").replaceAll("__name__", id).trim();

    let div = document.createElement("div");
    div.classList.add("mr-3");
    div.innerHTML = newTemplate;
    imageFormInputs.insertBefore(div, imageFormInputs.firstChild);
}

function previewImage (input) {
    let reader = new FileReader();
    let images = document.querySelectorAll("." + input.id + "_img");
    reader.onload = function (e) {
        for (let i = 0; i < images.length; i++) {
            images[i].setAttribute("src", e.target.result);
        }
    };

    reader.readAsDataURL(input.files[0]);
    let controls = document.querySelector("#" + input.id + "_controls");
    controls.classList.remove("hidden");
    if (input.id === ("trick_form_images_" + (nextId() - 1) + "_file")) {
        addInput(nextId());
    }
}

document.addEventListener("DOMContentLoaded", function () {
    if (isNaN(nextId())) {
        addInput(0);
    } else {
        addInput(nextId());
    }
});
