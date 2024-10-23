// Code for fade in transition on the current page everytime the page load
window.addEventListener("load", () => {
  const content = document.getElementById("content");
  content.classList.add("loaded"); // Add class to trigger the fade-in effect
});
// off canvas mobile menu open and close functions
function openNav() {
  document.getElementById("myNav").style.width = "100%";
}
function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}
// code for client logos slider
jQuery(document).ready(function ($) {
  if ($(".slick.marquee").length) {
    $(".slick.marquee").slick({
      speed: 3000,
      autoplay: true,
      autoplaySpeed: 1,
      centerMode: false,
      cssEase: "linear",
      slidesToShow: 8,
      slidesToScroll: 1,
      variableWidth: false,
      infinite: true,
      initialSlide: 0,
      arrows: false,
      buttons: false,
      responsive: [
        {
          breakpoint: 991, // For tablets
          settings: {
            slidesToShow: 3, // Show 2 slides on tablets
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 776, // For mobile devices
          settings: {
            slidesToShow: 2, // Show 1 slide on mobile
            slidesToScroll: 1,
          },
        },
      ],
    });
  }
});
// code for home page project sectoion slider
jQuery(document).ready(function ($) {
  if ($(".project-slider").length) {
    $(".project-slider").slick({
      speed: 0,
      autoplay: false,
      autoplaySpeed: 0,
      centerMode: false,
      cssEase: "linear",
      slidesToShow: 3, // Default for larger screens
      // slidesToScroll: 1,
      variableWidth: false,
      infinite: true,
      initialSlide: 1,
      arrows: false,
      buttons: false,
      draggable: true,
      swipeToSlide: true,
      responsive: [
        {
          breakpoint: 991, // For tablets
          settings: {
            slidesToShow: 2, // Show 2 slides on tablets
            // slidesToScroll: 1,
          },
        },
        {
          breakpoint: 776, // For mobile devices
          settings: {
            slidesToShow: 1, // Show 1 slide on mobile
            // slidesToScroll: 1,
          },
        },
      ],
    });
    
  }
});
jQuery(document).ready(function ($) {
  if ($(".blog-slider").length) {
    $(".blog-slider").slick({
      speed: 300,
      autoplay: false,
      autoplaySpeed: 5,
      centerMode: false,
      cssEase: "linear",
      slidesToShow: 1,
      slidesToScroll: 1,
      variableWidth: false,
      infinite: true,
      initialSlide: 0,
      arrows: false, // Disable default arrows
      buttons: false, // Disable default buttons
    });

    // Custom button functionality
    $(".slick-prev").on("click", function () {
      $(".blog-slider").slick("slickPrev"); // Move to previous slide
    });

    $(".slick-next").on("click", function () {
      $(".blog-slider").slick("slickNext"); // Move to next slide
    });
    $(".blog-slider .slick-slide").on("click", function () {
      var index = $(this).data("slick-index"); // Get the index of the clicked slide
      $(".blog-slider").slick("slickGoTo", index); // Go to the clicked slide
    });
  }
});
// tabs panel code on the blogs page 
// Show the first tab and hide the rest
$("#tabs-nav li:first-child").addClass("active");
$(".tab-content").hide();
$(".tab-content:first").show();

// Click function
$("#tabs-nav li").click(function () {
  $("#tabs-nav li").removeClass("active");
  $(this).addClass("active");
  $(".tab-content").hide();

  var activeTab = $(this).find("a").attr("href");
  $(activeTab).fadeIn();
  return false;
});
// tabs panel code for the carrers page sidebar salary filters
$("#salary-tabs-nav li:first-child").addClass("active");
$(".salary-tab-content").hide();
$(".salary-tab-content:first").show();

// Click function
$("#salary-tabs-nav li").click(function () {
  $("#salary-tabs-nav li").removeClass("active");
  $(this).addClass("active");
  $(".salary-tab-content").hide();

  var activeTab = $(this).find("a").attr("href");
  $(activeTab).fadeIn();
  return false;
});

const countryInput = $("#mobile_code");
if (countryInput.length) {
  countryInput.intlTelInput({
    initialCountry: "za",
    separateDialCode: true,
  });
}

//  JavaScript for Scroll to Top Functionality 
    // Get the scrollToTopBtn element
    const scrollToTopBtn = document.getElementById("scrollToTopBtn");

    // Show button after scrolling 1000px
    window.onscroll = function() {
        if (document.body.scrollTop > 1000 || document.documentElement.scrollTop > 1000) {
            scrollToTopBtn.style.display = "flex"; // Show the button
        } else {
            scrollToTopBtn.style.display = "none"; // Hide the button
        }
    };

    // Scroll to top when the button is clicked
    scrollToTopBtn.addEventListener("click", function() {
        window.scrollTo({
            top: 0,
            behavior: "smooth" // Smooth scroll to top
        });
    });
