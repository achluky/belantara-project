$(document).ready(function () {
    HeroSlider();
});

function HeroSlider() {

  $("#owl-demo").owlCarousel({
    autoPlay: true,
      navigation : true, // Show next and prev buttons
      pagination: false,
    // Responsive 
    responsive: true,
    responsiveRefreshRate : 200,
    responsiveBaseWidth: window,
      slideSpeed : 100,
      paginationSpeed : 100,
      singleItem:true,
      navigationText: [
      "<i class='fa fa-angle-left icon-white fa-3x'></i>",
      "<i class='fa fa-angle-right icon-white fa-3x'></i>"
      ]
 
  });

}