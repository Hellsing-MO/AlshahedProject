("use strict");
/**
 * add event on element
*/

const addEventOnElem = function (elem, type, callback) {
  if (elem.length > 1) {
    for (let i = 0; i < elem.length; i++) {
      elem[i].addEventListener(type, callback);
    }
  } else {
    elem.addEventListener(type, callback);
  }
};

/**
 * navbar toggle
*/

const navbar = document.querySelector("[data-navbar]");
const navTogglers = document.querySelectorAll("[data-nav-toggler]");
const navLinks1 = document.querySelectorAll("[data-nav-link]");
const overlay = document.querySelector("[data-overlay]");

const toggleNavbar = function () {
  navbar.classList.toggle("active");
  overlay.classList.toggle("active");
};

addEventOnElem(navTogglers, 'click', toggleNavbar);

const closeNavbar = function () {
    navLinks1.classList.remove("active");
    overlay.classList.remove("active");
};

addEventOnElem(navLinks1, "click", closeNavbar);

/**
 * header active when scroll down to 100px
*/

const header = document.querySelector("[data-header]")
const backTopBtn = document.querySelector("[data-back-top-btn]")

const activeElem = function () {
  if(window.scrollY > 20) {
    header.classList.add("active");
  }else {
    header.classList.remove("active");
  }
};

addEventOnElem(window, "scroll", activeElem);



// sleder
var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 30,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      600: {
        slidesPerView: 3
      },
    },
  });

//scroll reveal
console.log("Initializing ScrollReveal...");

ScrollReveal({
    reset: false,
    distance: '80px',
    duration: 2000,
    delay: 200,
    easing: 'cubic-bezier(0.4, 0, 0.2, 1)',
    origin: 'bottom',
    interval: 100
});

// Reveal elements with different origins
ScrollReveal().reveal('.revial-top', {
    origin: 'top',
    distance: '60px',
    duration: 1500,
    delay: 200
});

ScrollReveal().reveal('.revial-bottom', { 
    origin: 'bottom',
    distance: '60px',
    duration: 1500,
    delay: 200
});

ScrollReveal().reveal('.revial-lift', {
    origin: 'left',
    distance: '60px',
    duration: 1500,
    delay: 200
});

ScrollReveal().reveal('.revial-right', {
    origin: "right",
    distance: '60px',
    duration: 1500,
    delay: 200
});

// Debug: Check if elements exist
document.addEventListener('DOMContentLoaded', function() {
    console.log("DOM loaded, checking for animation elements...");
    
    const topElements = document.querySelectorAll('.revial-top');
    const leftElements = document.querySelectorAll('.revial-lift');
    const rightElements = document.querySelectorAll('.revial-right');
    const bottomElements = document.querySelectorAll('.revial-bottom');
    
    console.log(`Found ${topElements.length} top elements`);
    console.log(`Found ${leftElements.length} left elements`);
    console.log(`Found ${rightElements.length} right elements`);
    console.log(`Found ${bottomElements.length} bottom elements`);
    
    // Check for category boxes specifically
    const categoryBoxes = document.querySelectorAll('.category-box');
    console.log(`Found ${categoryBoxes.length} category boxes`);
    
    categoryBoxes.forEach((box, index) => {
        console.log(`Category box ${index + 1}:`, box.className);
    });
});

console.log("ScrollReveal initialization complete");