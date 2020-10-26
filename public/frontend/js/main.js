!function (e) {
    "use strict";
    e(window).on("load", function () {
        e(".loader-container").fadeOut(500)
    }), e(document).on("ready", function () {
        e(document).on("click", ".main-menu-content ul li .search-button", function () {
            e(".search-option").toggleClass("active")
        }), e(document).on("click", ".side-menu-wrap .side-menu-ul .sidenav__item .menu-plus-icon", function () {
            return e(this).closest(".sidenav__item").siblings().removeClass("active").find(".side-sub-menu").slideUp(200), e(this).closest(".sidenav__item").toggleClass("active").find(".side-sub-menu").slideToggle(200), !1
        }), e(document).on("click", ".logo-right-button .side-menu-open", function () {
            e(".side-nav-container").addClass("active")
        }), e(document).on("click", ".humburger-menu .side-menu-close", function () {
            e(".side-nav-container").removeClass("active")
        }), e(window).on("scroll", function () {
            100 < e(window).scrollTop() ? e(".header-menu-wrapper").addClass("header-fixed") : e(".header-menu-wrapper").removeClass("header-fixed"), 300 < e(window).scrollTop() ? e("#back-to-top").addClass("show-back-to-top") : e("#back-to-top").removeClass("show-back-to-top")
        }), e(document).on("click", "#back-to-top", function () {
            return e("html, body").animate({scrollTop: 0}, 800), !1
        }), e(".counter").counterUp({delay: 20, time: 2e3}), e(".client-logo").owlCarousel({
            loop: !0,
            items: 5,
            nav: !1,
            dots: !1,
            smartSpeed: 500,
            autoplay: !0,
            responsive: {0: {items: 1}, 480: {items: 2}, 991: {items: 3}, 1280: {items: 5}}
        }), e(".client-logo2").owlCarousel({
            loop: !0,
            items: 4,
            nav: !1,
            dots: !1,
            smartSpeed: 500,
            autoplay: !0,
            responsive: {320: {items: 2}, 481: {items: 3}, 768: {items: 4}}
        }), e(".client-testimonial").owlCarousel({
            loop: !0,
            items: 1,
            nav: !1,
            dots: !0,
            smartSpeed: 500,
            autoplay: !0
        }), e(".service-wrap").owlCarousel({
            loop: !0,
            items: 3,
            nav: !1,
            dots: !0,
            smartSpeed: 700,
            autoplay: !0,
            margin: 30,
            responsive: {0: {items: 1}, 600: {items: 1}, 992: {items: 3}}
        })

        const cookieContainer = document.querySelector(".cookie-container");
        const cookieButton = document.querySelector(".cookie-btn");

        cookieButton.addEventListener("click", () => {
            cookieContainer.classList.remove("active");
            localStorage.setItem("cookieBannerDisplayed", "true");
        });

        setTimeout(() => {
            if (!localStorage.getItem("cookieBannerDisplayed")) {
                cookieContainer.classList.add("active");
            }
        }, 5000);
    })
}(jQuery);


