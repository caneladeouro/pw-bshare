$(document).ready(function () {
  var width = $(document).width();
  if (width <= 1200) {
    $(".menu-desktop").addClass("hide");
    $(".menu-desktop").removeClass("display");
    $(".menu-mobile").addClass("display");
    $(".menu-mobile").removeClass("hide");
    $(".menu-container").addClass("display");
    $(".menu-container").removeClass("hide");
  }
});



function menuClick() {
  if ($(".menu-mobile").hasClass("menu-mobile-active")) {
    $(".menu-mobile").removeClass("menu-mobile-active");
    $(".menu-container").removeClass("menu-container-active");
  }
  else {
    $(".menu-mobile").addClass("menu-mobile-active");
    $(".menu-container").addClass("menu-container-active");
  }


}