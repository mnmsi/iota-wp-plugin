// jQuery(window).on("load", function () {
//   jQuery("#loader").fadeOut();
// });
jQuery(document).ready(function ($) {
    $(".up_arrow").on("click", function () {
        scroll({behavior: "smooth", top: 0});
    });
    // isotop
    let $grid = $(".isotope").isotope({});
    // filter items on button click
    $(".isotope-filters").on("click", "button", function () {
        let filterValue = $(this).attr("data-filter");
        $grid.isotope({filter: filterValue});
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
//   slick slider
    $(".management-slider").slick({
        dots: false,
        infinite: true,
        speed: 300,
        autoplay: true,
        arrows: true,
        slidesToShow: 1,
        prevArrow: "<button type='button' class='slick-custom-arrow slick-prev pull-left'><i class='fa-solid fa-arrow-left'></i></button>",
        nextArrow: "<button type='button' class='slick-custom-arrow slick-next pull-right'><i class='fa-solid fa-arrow-right'></i></button>"
    });
//     tour gallery slider
    $(".tour-gallery-slider").slick({
        dots: false,
        infinite: true,
        speed: 300,
        arrows: true,
        slidesToScroll: 1,
        slidesToShow: 3,
        autoplay: true,
        prevArrow: "<button type='button' class='tour-arrows slick-prev'><i class='fa-solid fa-arrow-left'></i></button>",
        nextArrow: "<button type='button' class='tour-arrows slick-next'><i class='fa-solid fa-arrow-right'></i></button>"
    });
});
