
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
        // autoplay: true,
        slidesToScroll: 1,
        fade: true,
        arrows: false,
        prevArrow: $('.slider-arrows-counter .fa-caret-left'),
        nextArrow: $('.slider-arrows-counter .fa-caret-right'),
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
    
})(jQuery);




