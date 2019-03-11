$(document).ready(function(){
    $(".owl-carousel").owlCarousel({
        margin: 30,
        loop: true,
        center: true,
        autoplayTimeout: 1500,
        autoplayHoverPause: true,
        nav: true,
        animateIn: true,
        navText : ["<div class='nav-btn prev-slide'><i class='fas fa-chevron-circle-left fa-3x'></i></div>",
        "<div class='nav-btn next-slide'><i class='fas fa-chevron-circle-right fa-3x'></i></div>"]
    });
  });