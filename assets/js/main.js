// loading page
$(window).ready(function () {
  $(".loader").fadeOut(1200, function () {
    $("body").css("overflow", "auto");
    $(".loading-spiner").fadeOut(1500);
  });
});


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
