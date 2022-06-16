function showModal(modalID) {
    const modal = document.getElementById(modalID);
    if (modalID) {
        modal.classList.add("active");
        modal.addEventListener("click", (event) => {
            if (
                event.target.id === modalID ||
                event.target.className === "close"
            ) {
                modal.classList.remove("active");
            }
        });
    }
}

const button = document.querySelectorAll(".modal-open");

button.forEach((item) => {
    item.addEventListener("click", () => showModal("modal-telefone"));
})

