// jQuery(window).on("load", function () {
//   jQuery("#loader").fadeOut();
// });
jQuery(document).ready(function ($) {
  $(".up_arrow").on("click", function () {
    scroll({ behavior: "smooth", top: 0 });
  });
  // isotop
  var $grid = $(".isotope").isotope({});
  // filter items on button click
  $(".isotope-filters").on("click", "button", function () {
    var filterValue = $(this).attr("data-filter");
    $grid.isotope({ filter: filterValue });
  });
  //     magnificPopup
  $(".gallery").each(function () {
    $(this).magnificPopup({
      delegate: "a",
      type: "image",
      gallery: {
        enabled: true,
      },
    });
  });
  //   masonry
  //   $(".gallery").masonry({
  //     itemSelector: "img",
  //     columnWidth: 300,
  //   });
});
