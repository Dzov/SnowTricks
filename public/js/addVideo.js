var videoFormInputs = document.querySelector('#trick_form_videos');
var template = videoFormInputs.getAttribute('data-prototype');

var nextId = function () {
    var videoInputNumbers = [];
    var regex = new RegExp('trick_form_videos_(\\d)_identifier');
    var haystack = document.querySelectorAll('[id^=trick_form_videos]');

    haystack.forEach(function (element) {
        if (regex.test(element.id)) {

            videoInputNumbers.push(parseInt(element.id.replace(/[^\d.]/g, '')));
        }
    });

    videoInputNumbers.sort(function (a, b) {
        return a - b;
    });

    return videoInputNumbers.pop() + 1;
};

String.prototype.replaceAll = function (search, replacement) {
    var target = this;
    return target.replace(new RegExp(search, 'g'), replacement);
};

function addInput (id) {
    var newTemplate = template.replaceAll('__name__label__', 'Video').replaceAll('__name__', id).trim();

    var div = document.createElement('div');
    div.classList.add('mb-1');
    div.innerHTML = newTemplate;
    videoFormInputs.insertBefore(div, videoFormInputs.firstChild);
}

if (isNaN(nextId())) {
    addInput(0);
}

var $button = document.createElement('div');
$button.innerText = 'Ajouter une video';
$button.classList = 'btn btn-primary mt-3';
$button.type = 'addVideo';
$button.addEventListener('click', function () {
    addInput(nextId());
});

videoFormInputs.appendChild($button);
