function openModal(modalId) {
    document.getElementById(modalId).style.display = "block";

    // Disable background scrolling
    document.body.classList.add("modal-open");
}

// Close modal
function closeModal(modalId) {
    document.getElementById(modalId).style.display = "none";

    // Re-enable background scrolling
    document.body.classList.remove("modal-open");
}

// Close modal when clicking outside
window.onclick = function (event) {
    const modals = document.querySelectorAll(".modal");
    modals.forEach((modal) => {
        if (event.target === modal) {
            modal.style.display = "none";
            document.body.classList.remove("modal-open");
        }
    });
};
