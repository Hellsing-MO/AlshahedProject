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

ScrollReveal({
    // reset: true,
    distance:'80px',
    duration:2000,
    delay:200
});

ScrollReveal().reveal('.revial-top', {origin: 'top'});

ScrollReveal().reveal('.revial-bottom', { origin: 'bottom' });

ScrollReveal().reveal('.revial-lift', {origin: 'left' });

ScrollReveal().reveal('.revial-right', {origin: "right",});

console.log("hello world");