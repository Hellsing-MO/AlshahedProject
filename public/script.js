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
    loop: true,
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
      pauseOnMouseEnter: true,
    },
    effect: "slide",
    speed: 800,
    grabCursor: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      dynamicBullets: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      600: {
        slidesPerView: 2,
        spaceBetween: 40,
      },
      900: {
        slidesPerView: 3,
        spaceBetween: 50,
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

    // Navigation active state management
    const contactNavLink = document.querySelector('.contact-nav-link');
    const contactSection = document.getElementById('contact');
    
    if (contactNavLink && contactSection) {
        // Function to check if contact section is in view
        function isContactInView() {
            const rect = contactSection.getBoundingClientRect();
            const windowHeight = window.innerHeight;
            
            // Check if the contact section is visible in the viewport
            return rect.top <= windowHeight * 0.3 && rect.bottom >= windowHeight * 0.3;
        }
        
        // Function to update contact nav link active state
        function updateContactNavState() {
            if (isContactInView()) {
                contactNavLink.classList.add('id-activ');
            } else {
                contactNavLink.classList.remove('id-activ');
            }
        }
        
        // Add scroll event listener with throttling for better performance
        let scrollTimeout;
        window.addEventListener('scroll', function() {
            if (scrollTimeout) {
                clearTimeout(scrollTimeout);
            }
            scrollTimeout = setTimeout(updateContactNavState, 10);
        });
        
        // Initial check
        updateContactNavState();
        
        // Smooth scroll to contact section when clicking the nav link
        contactNavLink.addEventListener('click', function(e) {
            e.preventDefault();
            contactSection.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        });
    }

    // Enhanced navigation highlighting for all nav links
    const navLinks = document.querySelectorAll('.navbar-link');
    
    // Function to remove active class from all nav links
    function clearActiveStates() {
        navLinks.forEach(l => l.classList.remove('id-activ'));
    }
    
    // Function to set active state for a specific link
    function setActiveState(link) {
        clearActiveStates();
        if (link && !link.classList.contains('contact-nav-link')) {
            link.classList.add('id-activ');
        }
    }
    
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            // Set active state for clicked link (except contact which is handled by scroll)
            if (!this.classList.contains('contact-nav-link')) {
                setActiveState(this);
            }
        });
    });

    // Handle browser back/forward buttons
    window.addEventListener('popstate', function() {
        // Check current route and set appropriate active state
        const currentPath = window.location.pathname;
        const currentHash = window.location.hash;
        
        clearActiveStates();
        
        if (currentHash === '#contact') {
            if (contactNavLink) {
                contactNavLink.classList.add('id-activ');
            }
        } else {
            // Find the matching nav link and set it as active
            navLinks.forEach(link => {
                const href = link.getAttribute('href');
                if (href === currentPath || href === currentPath + '/') {
                    setActiveState(link);
                }
            });
        }
    });

    // Initialize active state based on current page
    function initializeActiveState() {
        const currentPath = window.location.pathname;
        const currentHash = window.location.hash;
        
        if (currentHash === '#contact') {
            if (contactNavLink) {
                contactNavLink.classList.add('id-activ');
            }
        } else {
            navLinks.forEach(link => {
                const href = link.getAttribute('href');
                if (href === currentPath || href === currentPath + '/') {
                    setActiveState(link);
                }
            });
        }
    }
    
    // Initialize on page load
    initializeActiveState();
});

console.log("ScrollReveal initialization complete");