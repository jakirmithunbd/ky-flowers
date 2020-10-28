
(function($){
    var ua = window.navigator.userAgent;
    var isIE = /MSIE|Trident/.test(ua);

    if ( !isIE ) {
        //IE specific code goes here
        "use strict";
    }

      /*** Sidr Menu */
    $('.navbar-toggle').sidr({
        name: 'sidr-main',
        side: 'right',
        source: '#sidr',
        displace: false,
        renaming: false
    });

$("document").on("click",function(e) { $.sidr('close','sidr-main'); });

    $('.closeMenu').on('click', function(){
        $.sidr('close', 'sidr-main');
    });

    /*** Sticky header */
    $(window).scroll(function() {

        if ($(window).scrollTop() > 0) {
          $(".header").addClass("sticky");
        } 
        else {
          $(".header").removeClass("sticky");
        }
    });

    /*** Header height = gutter height */
    // function headersetGutterHeight(){
    //     var footer = document.querySelector('.header'),
    //         gutter = document.querySelector('.header_gutter');
    //         gutter.style.height = footer.offsetHeight + 'px';
    // }

    // window.onload = headersetGutterHeight;
    // window.onresize = headersetGutterHeight;


    $('.shop-page-wrapper .shop-sidebar .berocket_single_filter_widget .bapf_head').on('click', function(){
        $(this).parent().toggleClass('Show_items');
    });

     //  Silder
    $(".reviews-slider").slick({
        dots: true,
        // infinite: true,
        // draggable: true,
        slidesToShow: 1,
        // autoplay: true,
        slidesToScroll: 1,
        arrows: false,
        responsive: [
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 1,
                dots: true,
                arrows: false,
                slidesToScroll: 1
              }
            }
        ]
    });



     //  HOME PRODUCT SLIDER
    $(".product-images-slider").slick({
        dots: true,
        // infinite: true,
        // draggable: true,
        slidesToShow: 1,
        // autoplay: true,
        slidesToScroll: 1,
        arrows: false,
        adaptiveHeight: true
        // asNavFor: '.product-info-slider'
    });

     //  HOME PRODUCT SLIDER nav
    $(".product-info-slider").slick({
        dots: false,
        // infinite: true,
        draggable: false,
        slidesToShow: 1,
        // autoplay: true,
        slidesToScroll: 1,
        arrows: true,
        // asNavFor: '.product-images-slider',
        prevArrow: $('.home-product-slider .slider-arrow .fa-caret-left'),
        nextArrow: $('.home-product-slider .slider-arrow .fa-caret-right'),
        adaptiveHeight: true
    });

    

    // Product  Silder
    $("#category-list").slick({
        dots: false,
        // infinite: true,
        // draggable: true,
        slidesToShow: 4,
        // autoplay: true,
        slidesToScroll: 1,
        arrows: true,
        prevArrow: $('.category-slider-wrapper .prev'),
        nextArrow: $('.category-slider-wrapper .next'),
        responsive: [
            {
              breakpoint: 1100,
              settings: {
                slidesToShow: 3,
                dots: true,
                arrows: false,
                slidesToScroll: 1
              }
            },
            {
              breakpoint: 900,
              settings: {
                slidesToShow: 2,
                dots: true,
                arrows: false,
                slidesToScroll: 1
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 1,
                dots: true,
                arrows: false,
                slidesToScroll: 1
              }
            }
        ]
    });

     // Banner Silder
     $(".home-banner").on("init reInit afterChange", function(event, slick) {
        $(".news__counter").html(
            slick.slickCurrentSlide() + 1 + "/" + slick.slideCount
        );
    });

    const slider = $(".home-banner");
    $(slider).slick({
        dots: false,
        infinite: true,
        draggable: true,
        slidesToShow: 1,
        autoplay: true,
        adaptiveHeight: true,
        slidesToScroll: 1,
        fade: true,
        arrows: false,
        // prevArrow: $('.slider-arrows-counter .fa-caret-left'),
        // nextArrow: $('.slider-arrows-counter .fa-caret-right'),
    });


    // Animation
    $('.home-banner').on('init', function(e, slick) {
      var $firstAnimatingElements = $('div.slick-slide:first-child').find('[data-animation]');
      doAnimations($firstAnimatingElements);    
    });
    $('.home-banner').on('beforeChange', function(e, slick, currentSlide, nextSlide) {
      var $animatingElements = $('div.slick-slide[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
      doAnimations($animatingElements); 
    });

        // Animation
    function doAnimations(elements) {
      var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
      elements.each(function() {
        var $this = $(this);
        var $animationDelay = $this.data('delay');
        var $animationType = 'animated ' + $this.data('animation');
        $this.css({
          'animation-delay': $animationDelay,
          '-webkit-animation-delay': $animationDelay
        });
        $this.addClass($animationType).one(animationEndEvents, function() {
          $this.removeClass($animationType);
        });
      });
    };

    $('#search-icon').on('click', function(e){
      e.preventDefault();
        $('.search-container').toggleClass('ShowSearch');
    });

    $('#mySelect, .single-product-select').on('change', function (e) {
       window.location.href = $(this).val();
    });

        /* Header Mini cart hover ajaxfy */
   $('.shopping_cart').hover(function(){
    var data = {
        'action': 'mode_theme_update_mini_cart'
    };
    
    $.post(
        woocommerce_params.ajax_url, // The AJAX URL
        data, // Send our PHP function
        function(response){
          $('.header_shopping_cart_content').html(response); // Repopulate the specific element with the new content
        }
    );
   });

   $('.woocommerce .quantity').on('click', '.qty-minus', function (e) {
        var $inputQty = $(this).parent().find('input.qty');
        var val = parseInt($inputQty.val());
        var step = $inputQty.attr('step');
        step = 'undefined' !== typeof(step) ? parseInt(step) : 1;
        if (val > 0) {
            $inputQty.val(val - step).change();
        }
    });

    // $('.qty').on('change', function(){
    //     setTimeout(function() {//This is set, so it gives the update cart button time to enable from disable mode
    //         $('input[name="update_cart"]').trigger('click');
    //     }, 2000);

    // });




    $('.woocommerce .quantity').on('click', '.qty-plus', function (e) {
        var $inputQty = $(this).parent().find('input.qty');
        var val = parseInt($inputQty.val());
        var step = $inputQty.attr('step');
        step = 'undefined' !== typeof(step) ? parseInt(step) : 1;
        $inputQty.val(val + step).change();
    });

    $('.woocommerce-form .form-row input').on('click', function(){
        $(this).parent().addClass('show_input');
    });

    $('.woocommerce-form .form-row input').on('blur', function(){
        $(this).parent().removeClass('show_input');
    });

    focusout

    
})(jQuery);



