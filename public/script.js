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

document.addEventListener('DOMContentLoaded', function() {
  // User dropdown
  const userIcon = document.querySelector('.user-icon');
  const userDropdown = document.getElementById('userDropdown');
  
  if (userIcon && userDropdown) {
    userIcon.addEventListener('click', function(e) {
      e.preventDefault();
      e.stopPropagation();
      if (userDropdown.style.display === 'none') {
        userDropdown.style.display = 'block';
        languageDropdown.style.display = 'none';
      } else {
        userDropdown.style.display = 'none';
      }
    });
  }

  // Language dropdown
  const languageIcon = document.querySelector('.language-icon');
  const languageDropdown = document.getElementById('languageDropdown');
  
  if (languageIcon && languageDropdown) {
    languageIcon.addEventListener('click', function(e) {
      e.preventDefault();
      e.stopPropagation();
      if (languageDropdown.style.display === 'none') {
        languageDropdown.style.display = 'block';
        userDropdown.style.display = 'none';
      } else {
        languageDropdown.style.display = 'none';
      }
    });
  }

  // Close dropdowns when clicking outside
  document.addEventListener('click', function(e) {
    if (!userIcon.contains(e.target) && !userDropdown.contains(e.target)) {
      userDropdown.style.display = 'none';
    }
    if (!languageIcon.contains(e.target) && !languageDropdown.contains(e.target)) {
      languageDropdown.style.display = 'none';
    }
  });

  // Mobile menu functionality
  const menuToggle = document.querySelector('[data-nav-toggler]');
  const navbar = document.querySelector('[data-navbar]');
  const overlay = document.querySelector('[data-overlay]');
  const body = document.body;

  if (menuToggle && navbar) {
    menuToggle.addEventListener('click', function() {
      navbar.classList.toggle('active');
      overlay.classList.toggle('active');
      body.classList.toggle('menu-open');
    });
  }

  // Close menu when clicking overlay
  if (overlay) {
    overlay.addEventListener('click', function() {
      navbar.classList.remove('active');
      overlay.classList.remove('active');
      body.classList.remove('menu-open');
    });
  }

  // Close menu when clicking close button
  const closeBtn = document.querySelector('.nav-close-btn');
  if (closeBtn) {
    closeBtn.addEventListener('click', function() {
      navbar.classList.remove('active');
      overlay.classList.remove('active');
      body.classList.remove('menu-open');
    });
  }

  // Close menu when clicking on navigation links
  const navLinks = document.querySelectorAll('.navbar-link');
  navLinks.forEach(link => {
    link.addEventListener('click', function() {
      // Only close menu if it's not a dropdown toggle
      if (!this.hasAttribute('data-dropdown-toggle')) {
        navbar.classList.remove('active');
        overlay.classList.remove('active');
        body.classList.remove('menu-open');
      }
    });
  });

  // Handle window resize
  window.addEventListener('resize', function() {
    if (window.innerWidth > 768) {
      navbar.classList.remove('active');
      overlay.classList.remove('active');
      body.classList.remove('menu-open');
    }
  });

  // Initialize Swiper for company images slider
  var companySwiper = new Swiper('.company-swiper', {
    loop: true,
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
      delay: 3500,
      disableOnInteraction: false,
    },
    pagination: {
      el: '.company-swiper .swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.company-swiper .swiper-button-next',
      prevEl: '.company-swiper .swiper-button-prev',
    },
    breakpoints: {
      0: { slidesPerView: 1 },
      700: { slidesPerView: 2 },
      1024: { slidesPerView: 3 }
    }
  });
});