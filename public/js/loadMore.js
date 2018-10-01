var trickCards = [];
var displayedCards = [];
var remainingCards = [];
document.addEventListener('DOMContentLoaded', function () {
    trickCards = Array.prototype.slice.call(document.querySelectorAll('.trick_card'));

    for (var i = 0; i < 15; i++) {
        trickCards[i].classList.remove('hidden');
        displayedCards.push(trickCards[i]);
    }

    Array.prototype.diff = function (a) {
        return this.filter(function (i) {
            return a.indexOf(i) < 0;
        });
    };

    var loadMoreButton = document.querySelector('#load_more_button');
    var remainingCards = trickCards.diff(displayedCards);

    if (remainingCards.length > 0) {
        loadMoreButton.classList.remove('hidden');
    }

    function displayMore () {
        if (remainingCards.length > 0) {
            for (i = 0; i < 15; i++) {
                remainingCards[i].classList.remove('hidden');
                displayedCards.push(remainingCards[i]);
                remainingCards.splice(i, 1);
                if (remainingCards.length === 0) {
                    loadMoreButton.classList.add('hidden');
                }
            }
        }
    }

    loadMoreButton.addEventListener('click', function (e) {
        e.preventDefault();
        displayMore();
    });
});
