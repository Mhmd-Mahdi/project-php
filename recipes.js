// Open Modal Function
function openModal(recipeId, event) {
    event.preventDefault();  // Prevent the default anchor click behavior

    console.log("Opening modal for recipe: " + recipeId);  // Debugging log

    let modal = document.getElementById("modal-" + recipeId);
    if (modal) {
        modal.style.display = "block";  // Show the modal
        document.body.classList.add("modal-open");
    }
}

// Close Modal Function
function closeModal(recipeId) {
    console.log("Closing modal for recipe: " + recipeId);  // Debugging log

    let modal = document.getElementById("modal-" + recipeId);
    if (modal) {
        modal.style.display = "none";
        document.body.classList.remove("modal-open");
    }
}

// Close Modal when clicking outside the modal content
window.onclick = function (event) {
    // Check all modal elements
    document.querySelectorAll(".modal").forEach((modal) => {
        if (event.target === modal) {
            let recipeId = modal.id.replace("modal-", "");  // Get recipe ID from modal ID
            closeModal(recipeId);  // Close the modal by recipeId
        }
    });
};

// Close modal by the close button (using the span with class "close")
document.querySelectorAll('.close').forEach((closeButton) => {
    closeButton.addEventListener('click', function() {
        // Get the recipe ID from the close button's parent modal
        let recipeId = this.closest('.modal').id.replace("modal-", "");
        closeModal(recipeId);  // Close the modal
    });
});

function toggleDropdown() {
    let dropdown = document.getElementById("userDropdown");
    dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
}