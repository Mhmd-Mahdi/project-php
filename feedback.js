function openModal(recipeId, event) {
    event.preventDefault();  
    var modal = document.getElementById("modal-" + recipeId);
    modal.style.display = "flex";  
}

function closeModal(recipeId) {
    var modal = document.getElementById("modal-" + recipeId);
    modal.style.display = "none";  
}

window.onclick = function(event) {
    var modals = document.getElementsByClassName("modal");
    for (var i = 0; i < modals.length; i++) {
        if (event.target == modals[i]) {
            modals[i].style.display = "none";
        }
    }
};
