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

    if($(window).width() > 700) {

        $(".products-list").slick({
            dots: false,
            arrows: true,
            prevArrow:"<button type=\"button\" class=\"slick-prev\"><svg width=\"26\" height=\"50\" viewBox=\"0 0 26 50\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n" +
                "<path d=\"M25 1L1 25L25 49\" stroke=\"black\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>\n" +
                "</svg>\n</button>",
            nextArrow: "<button type=\"button\" class=\"slick-next\"><svg width=\"26\" height=\"50\" viewBox=\"0 0 26 50\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n" +
                "<path d=\"M1 49L25 25L1 0.999998\" stroke=\"black\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>\n" +
                "</svg>\n</button>",
            infinite: true,
            slidesToShow: 3,
            autoplay: false,
            autoplaySpeed: 1000,
            slidesToScroll: 1,
            responsive: [
                {
                  breakpoint: 769,
                      settings: {
                        slidesToShow: 2,
                      }
                }
            ]
        });

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
