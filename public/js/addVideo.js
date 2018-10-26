let videoFormInputs = document.querySelector("#trick_form_videos");
let videoTemplate = videoFormInputs.getAttribute("data-prototype");

let nextVideoId = function () {
    let videoInputNumbers = [];
    let regex = new RegExp("trick_form_videos_(\\d)_url");
    let haystack = document.querySelectorAll("[id^=trick_form_videos]");

    haystack.forEach(function (element) {
        if (regex.test(element.id)) {

            videoInputNumbers.push(parseInt(element.id.replace(/[^\d.]/g, "", ), 10));
        }
    });

    videoInputNumbers.sort(function (a, b) {
        return a - b;
    });

    return videoInputNumbers.pop() + 1;
};

String.prototype.replaceAll = function (search, replacement) {
    let target = this;
    return target.replace(new RegExp(search, "g"), replacement);
};

function addVideoInput (id) {
    let newVideoTemplate = videoTemplate.replaceAll("__name__label__", "Video").replaceAll("__name__", id).trim();

    let div = document.createElement("div");
    div.classList.add("mt-1");
    div.innerHTML = newVideoTemplate;
    videoFormInputs.appendChild(div);
}

if (isNaN(nextVideoId())) {
    addVideoInput(0);
}

let button = document.createElement("div");
button.innerText = "Ajouter une video";
button.classList = "btn btn-primary mt-3";
button.type = "addVideo";
button.addEventListener("click", function () {
    addVideoInput(nextVideoId());
});

videoFormInputs.parentElement.appendChild(button);
