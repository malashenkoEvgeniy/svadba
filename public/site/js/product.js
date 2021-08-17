 $('.product-main-photos').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
     infinite: false,
  fade: true,
  asNavFor: '.product-previews-list'
});
$('.product-previews-list').slick({
   dots: false,
    arrows: false,
    infinite: false,
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.product-main-photos',

});


