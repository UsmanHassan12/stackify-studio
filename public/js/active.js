(function ($) {
    'use strict';

    var browserWindow = $(window);

    // :: 1.0 Preloader Active Code
    browserWindow.on('load', function () {
        $('.preloader').fadeOut('slow', function () {
            $(this).remove();
        });
    });

    // :: 2.0 Nav Active Code
    if ($.fn.classyNav) {
        $('#creditNav').classyNav();
    }

    // :: 3.0 Sliders Active Code
    if ($.fn.owlCarousel) {
        var welcomeSlide = $('.hero-slideshow');

        welcomeSlide.owlCarousel({
            items: 1,
            loop: true,
            nav: true,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            dots: true,
            autoplay: true,
            autoplayTimeout: 10000,
            smartSpeed: 500
        });

        welcomeSlide.on('translate.owl.carousel', function () {
            var slideLayer = $("[data-animation]");
            slideLayer.each(function () {
                var anim_name = $(this).data('animation');
                $(this).removeClass('animated ' + anim_name).css('opacity', '0');
            });
        });

        welcomeSlide.on('translated.owl.carousel', function () {
            var slideLayer = welcomeSlide.find('.owl-item.active').find("[data-animation]");
            slideLayer.each(function () {
                var anim_name = $(this).data('animation');
                $(this).addClass('animated ' + anim_name).css('opacity', '1');
            });
        });

        $("[data-delay]").each(function () {
            var anim_del = $(this).data('delay');
            $(this).css('animation-delay', anim_del);
        });

        $("[data-duration]").each(function () {
            var anim_dur = $(this).data('duration');
            $(this).css('animation-duration', anim_dur);
        });

        var featuredProjects = $('.ve-featured-projects-carousel');
        if (featuredProjects.length) {
            var featuredWheelLocked = false;
            var featuredCount = featuredProjects.find('.item').length;
            var navDesktop = featuredCount > 4;
            var navTablet = featuredCount > 2;
            var navMobile = featuredCount > 1;
            var getFeaturedVisibleItems = function () {
                var width = browserWindow.width();
                return width >= 1200 ? 4 : (width >= 768 ? 2 : 1);
            };
            var canScroll = featuredCount > getFeaturedVisibleItems();
            featuredProjects.owlCarousel({
                items: 4,
                margin: 24,
                loop: canScroll,
                nav: navDesktop,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                dots: false,
                autoplay: canScroll,
                autoplayTimeout: 3500,
                autoplayHoverPause: true,
                smartSpeed: 700,
                responsive: {
                    0: { items: 1, nav: navMobile },
                    768: { items: 2, nav: navTablet },
                    1200: { items: 4, nav: navDesktop }
                }
            });

            var updateFeaturedScrollableState = function () {
                canScroll = featuredCount > getFeaturedVisibleItems();
                featuredProjects.toggleClass('ve-can-scroll', canScroll);
            };
            updateFeaturedScrollableState();
            browserWindow.on('resize', updateFeaturedScrollableState);

            // Allow trackpad / mouse wheel to navigate carousel horizontally
            featuredProjects.on('wheel', function (event) {
                if (!canScroll) return;
                var oe = event.originalEvent;
                if (!oe) return;
                var deltaX = oe.deltaX || 0;
                var deltaY = oe.deltaY || 0;
                var primaryDelta = Math.abs(deltaX) >= Math.abs(deltaY) ? deltaX : (oe.shiftKey ? deltaY : 0);
                if (primaryDelta === 0) return;
                if (Math.abs(primaryDelta) < 8) return;
                event.preventDefault();
                if (featuredWheelLocked) return;
                featuredWheelLocked = true;
                if (primaryDelta > 0) {
                    featuredProjects.trigger('next.owl.carousel');
                } else {
                    featuredProjects.trigger('prev.owl.carousel');
                }
                setTimeout(function () {
                    featuredWheelLocked = false;
                }, 280);
            });

            // Pause autoplay while cursor is inside carousel area
            featuredProjects.on('mouseenter', function () {
                if (!canScroll) return;
                featuredProjects.trigger('stop.owl.autoplay');
            });
            featuredProjects.on('mouseleave', function () {
                if (!canScroll) return;
                featuredProjects.trigger('play.owl.autoplay', [3500]);
            });
        }
    }

    // :: 4.0 ScrollUp Active Code
    if ($.fn.scrollUp) {
        // browserWindow.scrollUp({ scrollSpeed: 1500, scrollText: '<i class="fa fa-angle-up"></i><span>TOP</span>' });
    }

    // :: 5.0 CounterUp Active Code - Disabled to prevent conflict with stackify.js IntersectionObserver
    // if ($.fn.counterUp && $.fn.waypoint) { ... }

    // :: 6.0 Progress Bar Active Code
    if ($.fn.circleProgress) {
        $('#circle').circleProgress({
            size: 90,
            emptyFill: "rgba(0, 0, 0, .0)",
            fill: '#fff',
            thickness: '3',
            reverse: true
        });
        $('#circle2').circleProgress({
            size: 90,
            emptyFill: "rgba(0, 0, 0, .0)",
            fill: '#fff',
            thickness: '3',
            reverse: true
        });
        $('#circle3').circleProgress({
            size: 90,
            emptyFill: "rgba(0, 0, 0, .0)",
            fill: '#fff',
            thickness: '3',
            reverse: true
        });
        $('#circle4').circleProgress({
            size: 90,
            emptyFill: "rgba(0, 0, 0, .0)",
            fill: '#ffbb38',
            thickness: '3',
            reverse: true
        });
        $('#circle5').circleProgress({
            size: 90,
            emptyFill: "rgba(0, 0, 0, .0)",
            fill: '#ffbb38',
            thickness: '3',
            reverse: true
        });
        $('#circle6').circleProgress({
            size: 90,
            emptyFill: "rgba(0, 0, 0, .0)",
            fill: '#ffbb38',
            thickness: '3',
            reverse: true
        });
        $('#circle7').circleProgress({
            size: 90,
            emptyFill: "rgba(0, 0, 0, .0)",
            fill: '#ffbb38',
            thickness: '3',
            reverse: true
        });
        $('#circle8').circleProgress({
            size: 90,
            emptyFill: "rgba(0, 0, 0, .0)",
            fill: '#ffbb38',
            thickness: '3',
            reverse: true
        });
        $('#circle9').circleProgress({
            size: 90,
            emptyFill: "rgba(0, 0, 0, .0)",
            fill: '#ffbb38',
            thickness: '3',
            reverse: true
        });
    }

    // :: 7.0 Tooltip Active Code
    if ($.fn.tooltip) {
        $('[data-toggle="tooltip"]').tooltip();
    }

    // :: 8.0 Prevent Default a Click
    $('a[href="#"]').on('click', function ($) {
        $.preventDefault();
    });

    // :: 9.0 Jarallax Active Code
    if ($.fn.jarallax) {
        $('.jarallax').jarallax({
            speed: 0.2
        });
    }

    // :: 10.0 Sticky Active Code
    if ($.fn.sticky) {
        $("#sticker").sticky({
            topSpacing: 0
        });
    }

    // :: 11.0 Wow Active Code
    if (browserWindow.width() > 767) {
        new WOW().init();
    }

})(jQuery);

