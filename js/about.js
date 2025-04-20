// script.js
document.addEventListener("DOMContentLoaded", () => {
    const aboutContainer = document.querySelector(".about-container");
    aboutContainer.style.opacity = 0;
    aboutContainer.style.transform = "translateY(20px)";
    setTimeout(() => {
      aboutContainer.style.transition = "0.6s ease";
      aboutContainer.style.opacity = 1;
      aboutContainer.style.transform = "translateY(0)";
    }, 300);
  });
  
const showAboutButton = document.getElementById("showAboutButton");
const aboutContainer = document.querySelector(".about-container");

// Add an event listener to the button to toggle visibility of the About section
showAboutButton.addEventListener("click", () => {
  aboutContainer.classList.toggle("show-about");  // Toggle visibility
});