function openModal(modalId) {
    document.getElementById(modalId).style.display = "block";

    // Disable background scrolling
    document.body.classList.add("modal-open");
}
function toggleDropdown() {
    let dropdown = document.getElementById("userDropdown");
    dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
}
function openInfoModal() {
    document.getElementById("infoModal").style.display = "block";
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
