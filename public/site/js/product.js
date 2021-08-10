 $('.product-main-photos').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: '.product-previews-list'
});
$('.product-previews-list').slick({
   dots: false,
    arrows: false,
//    vertical: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.product-main-photos',

});



$(".similar-products-list").slick({
        dots: false,
        arrows: false,
        
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