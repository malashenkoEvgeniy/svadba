$(document).ready(function() {

    $(".main-slider").slick({
    dots: true,
        arrows: false,
    infinite: true,
    slidesToShow: 1,
    autoplay: false,
    autoplaySpeed: 1000,
    slidesToScroll: 1,
  });

    if($(window).width() > 568) {

        $(".products-list").slick({
        dots: false,
        arrows: true,
        prevArrow:"<button type=\"button\" class=\"slick-prev\"><i class=\"fas fa-chevron-left\"></i></button>",
        nextArrow: "<button type=\"button\" class=\"slick-next\"><i class=\"fas fa-chevron-right\"></i></button>",
        infinite: true,
        slidesToShow: 3,
        autoplay: false,
        autoplaySpeed: 1000,
        slidesToScroll: 1,
             responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          }
        },
      ]});
    }

    if($(window).width() > 1024) {

        $('.products-link').hover(function(){
            let newImg = $(this).children('img').attr('data-change');
            $(this).children('img').attr('src', newImg);
        }, function(){
            let newImg = $(this).children('img').attr('data-old');
            $(this).children('img').attr('src', newImg);
        }
       );
    }
});
