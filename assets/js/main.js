// chat code
function chat() {
  chatIcon = document.querySelector(".chat");
  chatContent = document.getElementById("chat_box");

  check = true;
  chatIcon.addEventListener("click", function () {
    if (check == true) {
      chatContent.classList.add("chat-container2");
      chatContent.classList.add("animate__bounceInUp");
      chatContent.classList.remove("chat-container");
      check = false;
    } else {
      chatContent.classList.remove("chat-container2");
      chatContent.classList.add("chat-container");
      check = true;
    }
  });
}
window.addEventListener("load", chat);

// animation
wow = new WOW({
  boxClass: "animate__animated", // default
  animateClass: "animated", // default
  offset: 0, // default
  mobile: true, // default
  live: true, // default
});
wow.init();

/**
 * Animation on scroll function and init
 */
function aosInit() {
  AOS.init({
    duration: 600,
    easing: "ease-in-out",
    once: true,
    mirror: false,
  });
}
window.addEventListener("load", aosInit);

$(".owl-carousel").owlCarousel({
  loop: true,
  margin: 10,
  autoplay: true,
  autoplayTimeout: 3000,
  autoplayHoverPause: false,
  nav: true,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 3,
    },
    1000: {
      items: 3,
    },
  },
});
