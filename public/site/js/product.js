

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
    centerMode: false,
    focusOnSelect: true,
    responsive: [
        {
            breakpoint: 768,
            settings: {
                vertical: true

            }
        },
        {
            breakpoint: 700,
            settings: {
                vertical: false
            }
        }
    ]


});


 // Переключает табы в карточке товара
 $('.product-tabs-header-btn').click(function (){
     if($(this).children('i').hasClass('fa-chevron-up')) {
         $(this).children('i').removeClass('fa-chevron-up').addClass('fa-chevron-down');
         $(this).siblings('.product-tabs-header-description').removeClass('active');

     } else {
         $(this).children('i').removeClass('fa-chevron-down').addClass('fa-chevron-up');
         $(this).siblings('.product-tabs-header-description').addClass('active');
     }
 });
