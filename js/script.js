// jQuery(window).on("load", function () {
//   jQuery("#loader").fadeOut();
// });
jQuery(document).ready(function ($) {
    $(".up_arrow").on("click", function () {
        scroll({behavior: "smooth", top: 0});
    });
    // isotop
    var $grid = $(".isotope").isotope({});
    // filter items on button click
    $(".isotope-filters").on("click", "button", function () {
        var filterValue = $(this).attr("data-filter");
        $grid.isotope({filter: filterValue});
    });
//     simpleLightBox
    $(".gallery a").simpleLightbox({
        captionsData: "alt",
        captionDelay: 250,
        spinner: true,
        nav: true,
        sourceAttr: 'href',
        showCounter: true,
    });

});
