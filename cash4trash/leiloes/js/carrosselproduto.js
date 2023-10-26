document.addEventListener("DOMContentLoaded", function () {
    const carousel = document.querySelector(".carousel");
    const slides = document.querySelectorAll(".slide");
    const prevButton = document.getElementById("prev");
    const nextButton = document.getElementById("next");

    let slideIndex = 0;

    nextButton.addEventListener("click", function () {
        slideIndex = (slideIndex + 1) % slides.length;
        updateCarousel();
    });

    prevButton.addEventListener("click", function () {
        slideIndex = (slideIndex - 1 + slides.length) % slides.length;
        updateCarousel();
    });

    function updateCarousel() {
        const offset = -slideIndex * 100 + "%";
        carousel.style.transform = "translateX(" + offset + ")";
    }
});
