let trickCards = [];
let displayedCards = [];
document.addEventListener("DOMContentLoaded", function () {
    trickCards = Array.prototype.slice.call(document.querySelectorAll(".trick_card"));

    for (let i = 0; i < 15; i++) {
        trickCards[i].classList.remove("hidden");
        displayedCards.push(trickCards[i]);
    }

    Array.prototype.diff = function (a) {
        return this.filter(function (i) {
            return a.indexOf(i) < 0;
        });
    };

    let loadMoreButton = document.querySelector("#load_more_button");
    let remainingCards = trickCards.diff(displayedCards);

    if (remainingCards.length > 0) {
        loadMoreButton.classList.remove("hidden");
    }

    function displayMore () {
        do {
            for (let j = 0; j < remainingCards.length && j < 15; j++) {
                remainingCards[j].classList.remove("hidden");
                displayedCards.push(remainingCards[j]);
                remainingCards.splice(j, 1);
                if (remainingCards.length === 0) {
                    loadMoreButton.classList.add("hidden");
                }
            }
        } while (remainingCards.length > 0);
    }

    loadMoreButton.addEventListener("click", function (e) {
        e.preventDefault();
        displayMore();
    });
});
