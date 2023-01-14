// jQuery(window).on("load", function () {
//   jQuery("#loader").fadeOut();
// });
jQuery(document).ready(function ($) {
  $(".up_arrow").on("click", function () {
    scroll({ behavior: "smooth", top: 0 });
  });
});
