let trickComments = [];
let displayedComments = [];
document.addEventListener("DOMContentLoaded", function () {
    trickComments = Array.prototype.slice.call(document.querySelectorAll(".trick_comment"));

    if (trickComments.length > 0) {
        for (let i = 0; i < 5; i++) {
            trickComments[i].classList.remove("hidden");
            displayedComments.push(trickComments[i]);
        }
    }

    Array.prototype.diff = function (a) {
        return this.filter(function (i) {
            return a.indexOf(i) < 0;
        });
    };

    let loadMoreButton = document.querySelector("#load_more_button");
    let remainingComments = trickComments.diff(displayedComments);

    if (remainingComments.length > 0) {
        loadMoreButton.classList.remove("hidden");
    }

    function displayMore () {
        do {
            for (let j = 0; j < remainingComments.length && j < 15; j++) {
                remainingComments[j].classList.remove("hidden");
                displayedComments.push(remainingComments[j]);
                remainingComments.splice(j, 1);
                if (remainingComments.length === 0) {
                    loadMoreButton.classList.add("hidden");
                }
            }
        } while (remainingComments.length > 0);
    }

    if (null !== loadMoreButton) {
        loadMoreButton.addEventListener("click", function (e) {
            e.preventDefault();
            displayMore();
        });
    }
});
