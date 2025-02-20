function openModal(recipeId, event) {
    event.preventDefault();  // Prevent default link action
    var modal = document.getElementById("modal-" + recipeId);
    modal.style.display = "flex";  // Use flex to center the modal content
}

function closeModal(recipeId) {
    var modal = document.getElementById("modal-" + recipeId);
    modal.style.display = "none";  // Hide the modal
}

// Close the modal if the user clicks outside of the modal content
window.onclick = function(event) {
    var modals = document.getElementsByClassName("modal");
    for (var i = 0; i < modals.length; i++) {
        if (event.target == modals[i]) {
            modals[i].style.display = "none";
        }
    }
};
