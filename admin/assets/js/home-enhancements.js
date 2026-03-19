// ===== Smooth Fade/Slide Reveal on Scroll =====
const revealElements = document.querySelectorAll(".reveal-on-scroll");

const revealOnScroll = () => {
  const triggerBottom = window.innerHeight * 0.85;

  revealElements.forEach(el => {
    const elementTop = el.getBoundingClientRect().top;
    if (elementTop < triggerBottom) {
      el.classList.add("show");
    }
  });
};

window.addEventListener("scroll", revealOnScroll);
window.addEventListener("load", revealOnScroll);

// ===== Gallery Lightbox Effect =====
document.querySelectorAll(".gallery-img").forEach(img => {
  img.addEventListener("click", () => {
    const lightbox = document.createElement("div");
    lightbox.id = "lightbox-overlay";
    lightbox.innerHTML = `
      <div class="lightbox-content">
        <img src="${img.src}" alt="${img.alt}">
        <span class="lightbox-close">&times;</span>
      </div>
    `;
    document.body.appendChild(lightbox);

    document.querySelector(".lightbox-close").addEventListener("click", () => {
      lightbox.remove();
    });

    lightbox.addEventListener("click", (e) => {
      if (e.target.id === "lightbox-overlay") lightbox.remove();
    });
  });
});

// ===== Reviews Slider Swipe Support (Mobile & Drag) =====
const sliderTrack = document.querySelector(".reviews-slider-track");
let isDown = false;
let startX, scrollLeft;

if (sliderTrack) {
  sliderTrack.style.cursor = "grab";

  sliderTrack.addEventListener("mousedown", (e) => {
    isDown = true;
    startX = e.pageX - sliderTrack.offsetLeft;
    scrollLeft = sliderTrack.scrollLeft;
    sliderTrack.style.cursor = "grabbing";
  });

  sliderTrack.addEventListener("mouseleave", () => {
    isDown = false;
    sliderTrack.style.cursor = "grab";
  });

  sliderTrack.addEventListener("mouseup", () => {
    isDown = false;
    sliderTrack.style.cursor = "grab";
  });

  sliderTrack.addEventListener("mousemove", (e) => {
    if (!isDown) return;
    e.preventDefault();
    const x = e.pageX - sliderTrack.offsetLeft;
    const walk = (x - startX) * 2; // scroll speed
    sliderTrack.scrollLeft = scrollLeft - walk;
  });

  // Mobile touch
  let touchStartX = 0;
  sliderTrack.addEventListener("touchstart", e => {
    touchStartX = e.touches[0].clientX;
  });

  sliderTrack.addEventListener("touchmove", e => {
    const touchX = e.touches[0].clientX;
    const deltaX = touchStartX - touchX;
    sliderTrack.scrollLeft += deltaX;
    touchStartX = touchX;
  });
}

// ===== Reviews Auto Scroll (smooth infinite loop) =====
const reviewWrapper = document.querySelector(".reviews-slider-wrapper");
const reviewTrack = document.querySelector(".reviews-slider-track");

if (reviewWrapper && reviewTrack) {
  let scrollAmount = 0;
  const maxScroll = reviewTrack.scrollWidth - reviewWrapper.clientWidth;
  let speed = 0.3; // px per frame

  function autoScrollReviews() {
    scrollAmount += speed;
    if (scrollAmount >= maxScroll) {
      scrollAmount = 0; // loop
    }
    reviewWrapper.scrollLeft = scrollAmount;
    requestAnimationFrame(autoScrollReviews);
  }

  autoScrollReviews();

  reviewWrapper.addEventListener("mouseenter", () => {
    speed = 0;
  });

  reviewWrapper.addEventListener("mouseleave", () => {
    speed = 0.3;
  });
}
/*for scoop*/
// Example: allow changing main image dynamically
document.addEventListener("DOMContentLoaded", () => {
  const mainImage = document.querySelector(".icecream-poster img");
  // Example: replace with a new URL
  // mainImage.src = "new-image-url.jpg";
});

