// window.jQuery = window.$ = require('jquery');



(function ($) {
    "use strict";
    $(document).ready(function () {

        /*------------------------------
            fixed-nav
        -------------------------------*/

        $(window).on('scroll', function () {
            var scroll = $(window).scrollTop();
            if (scroll < 100) {
                $("#navbar").removeClass("sticky");
            } else {
                $("#navbar").addClass("sticky");
            }
        });

        /*------------------------------
            scroll-to-top
        -------------------------------*/
        var ScrollTop = $(".scrollToTop");
        $(window).on('scroll', function() {
            if ($(this).scrollTop() < 500) {
                ScrollTop.removeClass("active");
            } else {
                ScrollTop.addClass("active");
            }
        });

        /*------------------------------
            popup-videos
        -------------------------------*/

        $('.popup-video').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false,
        });

        /*------------------------------
            choose-section-carousel
        -------------------------------*/

        $('.choose-section-carousel').slick({

            infinite: true,
            autoplay: true,
            focusOnSelect: true,
            speed: 1000,
            slidesToShow: 6,
            slidesToScroll: 1,
            arrows: false,
            prevArrow:"<button type='button' class='slick-prev pull-left'><i class=\"icofont-thin-left\"  aria-hidden='true'></i></button>",
            nextArrow:"<button type='button' class='slick-next pull-right'><i class=\"icofont-thin-right\"  aria-hidden='true'></i></button>",
            dots: false,
            dotsClass: 'choose-section-dots',
            customPaging: function (slider, i) {
                var slideNumber = (i + 1),
                    totalSlides = slider.slideCount;
                return '<a class="dot" role="button" title="' + slideNumber + ' of ' + totalSlides + '"><span class="string">' + slideNumber + '/' + totalSlides + '</span></a>';
            },
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        infinite: true
                    }
                },
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true
                    }
                },
                {
                    breakpoint: 993,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        infinite: true
                    }
                },
                {
                    breakpoint: 769,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });


        /*------------------------------
            testimonial-carousel
        -------------------------------*/

        $('.testimonial-carousel').slick({

            infinite: true,
            autoplay: false,
            centerMode:true,
            focusOnSelect: true,
            speed: 1000,
            slidesToShow: 2,
            slidesToScroll: 1,
            arrows: true,
            prevArrow:"<button type='button' class='slick-prev pull-left'><i class=\"icofont-thin-double-left\"  aria-hidden='true'></i></button>",
            nextArrow:"<button type='button' class='slick-next pull-right'><i class=\"icofont-thin-double-right\"  aria-hidden='true'></i></button>",
            responsive: [
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 320,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }
            ]
        });

        /*------------------------------
            preloader
        -------------------------------*/

        $("#preloader").delay(300).animate({
            "opacity" : "0"
        }, 500, function() {
            $("#preloader").css("display","none");
        });

    })

})(jQuery);