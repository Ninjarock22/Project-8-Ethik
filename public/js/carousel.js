document.addEventListener("DOMContentLoaded", function () {
    console.log("Carousel script loaded!"); // For debugging
    const items = document.querySelectorAll(".carousel-item");
    const next = document.querySelector(".carousel-control.next");
    const prev = document.querySelector(".carousel-control.prev");
    let currentIndex = 0;

    function updateCarousel() {
        items.forEach((item, index) => {
            item.classList.toggle("active", index === currentIndex);
        });
    }

    next.addEventListener("click", () => {
        currentIndex = (currentIndex + 1) % items.length;
        updateCarousel();
    });

    prev.addEventListener("click", () => {
        currentIndex = (currentIndex - 1 + items.length) % items.length;
        updateCarousel();
    });

    updateCarousel(); // Initialize carousel
});
