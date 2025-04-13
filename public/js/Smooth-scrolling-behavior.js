// Ensures smooth scrolling and fixed video behavior
window.addEventListener("scroll", () => {
    const overlay = document.querySelector(".overlay");
    const overlayHeight = overlay.offsetHeight;

    if (window.scrollY > overlayHeight) {
        document.querySelector(".background-video").style.display = "none";
    } else {
        document.querySelector(".background-video").style.display = "block";
    }
});
