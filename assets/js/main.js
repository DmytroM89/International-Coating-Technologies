/**
 * Created by Дмитрий on 26.03.2017.
 */
jQuery(document).ready(function ($) {
    
    "use strict";

    // Loader
    $('#page-preloader').delay(1000).fadeOut(1000);
    $('#page-preloader .spinner').delay(1000).fadeOut(1000);



    //Slider photo
    $('.a-slider_sm').slick({
        dots: false,
        arrows: false,
        infinite: true,
        autoplay: true,
        draggable: false,
        speed: 1300,
        fade: true,
        cssEase: 'linear',
        pauseOnHover: false,
        waitForAnimate: true
    });

    $('.a-slider_lg').slick({
        dots: false,
        arrows: false,
        infinite: true,
        autoplay: true,
        draggable: false,
        speed: 3000,
        fade: true,
        cssEase: 'linear',
        pauseOnHover: false,
        waitForAnimate: true
    });

    //Slider product describe
    $('.p-slider__name').slick({
        dots: false,
        arrows: true,
        infinite: true,
        autoplay: false,
        draggable: false,
        speed: 500,
        cssEase: 'linear',
        asNavFor: '.p-slider__describe'
    });

    $('.p-slider__describe').slick({
        dots: false,
        arrows: true,
        infinite: true,
        autoplay: false,
        draggable: false,
        speed: 500,
        cssEase: 'linear',
        adaptiveHeight: true,
        asNavFor: '.p-slider__name',
    });

    /**
     *  Slider products prepare
     */
    $('.products__prepare__slider__type').slick({
        dots: false,
        arrows: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        adaptiveHeight: true,
        asNavFor: '.products__prepare__slider__items',
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 543,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    $('.products__prepare__slider__items').slick({
        dots: false,
        arrows: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        adaptiveHeight: true,
        asNavFor: '.products__prepare__slider__type',
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 543,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    /**
     *  Magnific prepare
     */
    $('.products__prepare__items').each(function() {
        var popup = $(this).next();
        $(this).magnificPopup({
            removalDelay: 500,
            midClick: true,
            closeOnContentClick: false,
            items: {
                src: $(popup),
                type: 'inline'
            },
            mainClass: $(popup).data('effect'),
            showCloseBtn: true
        });
    });

    $('.prepare__slider').slick({
        dots: false,
        arrows: false,
        infinite: true,
        autoplay: true,
        draggable: false,
        speed: 1300,
        fade: true,
        cssEase: 'linear',
        pauseOnHover: false,
        waitForAnimate: true
    });

    // Animation menu button
    $('.menu_btn').click(function () {
       $(this).toggleClass('open');
    });

    // Menu popups
    $('.menu_btn').magnificPopup({
        removalDelay: 500, //delay removal by X to allow out-animation
        midClick: true,
        closeOnContentClick: true,
        fixedContentPos: true,
        callbacks: {
            afterClose: function () {
                $('.menu_btn').removeClass('open');
            },
            beforeOpen: function() {
                this.st.mainClass = this.st.el.attr('data-effect');
            }
        },
        showCloseBtn: false,
        overflowY: false
    });

    // Callback popups
    $('.callBack').magnificPopup({
        removalDelay: 500, //delay removal by X to allow out-animation
        midClick: true,
        closeOnContentClick: false,
        items: [
            {
                src: '#callBack', // CSS selector of an element on page that should be used as a popup
                type: 'inline'
            }
        ],
        callbacks: {
            beforeOpen: function() {
                this.st.mainClass = this.st.el.attr('data-effect');
            }
        },
        showCloseBtn: true
    });

    // Перемещае кнопку закрытия модалка перед формой
    $('.callBack').on('click', function () {
       $('.mfp-close').prependTo('.callback__form');
    });

    // Плавный скролл при нажатии на якорь
    $(".menu__nav").on("click","a", function (event) {
        event.preventDefault(); //отменяем стандартную обработку нажатия по ссылке
        var id  = $(this).attr('href'), //забираем идентификатор бока с атрибута href
        top = $(id).offset().top; //узнаем высоту от начала страницы до блока на который ссылается якорь
        $('body,html').animate({scrollTop: top - 80}, 1500); //анимируем переход на расстояние - top за 1500 мс
    });

    // Скролл к началу страницы по нажатию на название
    $('.title__c-name').click(function(){
        $('html, body').animate({scrollTop : 0}, 800);
        return false;
    });

    // Sphere
    $('#sphere').earth3d({
        dragElement: $('#locations') // where do we catch the mouse drag
    });


    // Form
    $(".wpcf7").on('wpcf7mailsent', function (event) {
        setTimeout('$.magnificPopup.close()', 3000);
    });


    // Header transform (scroll)
    scrollNav();

    function scrollNav () {
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();
            var displayWidth = $(window).width();
            if (scroll >= 200 && displayWidth >= 768) {
                $(".header").addClass("header_transform");
            }
            else {
                $(".header").removeClass("header_transform");
            }

            if (scroll >= 150 && displayWidth <= 767) {
                $(".title__slogan").addClass("hide");
            }
            else {
                $(".title__slogan").removeClass("hide");
            }

        });
    }

});


