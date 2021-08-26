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
                slidesToShow: 3,
                slidesToScroll: 1,
                vertical: true

            }
        },
        // {
        //     breakpoint: 600,
        //     settings: {
        //         slidesToShow: 2,
        //         slidesToScroll: 2
        //     }
        // },
        // {
        //     breakpoint: 480,
        //     settings: {
        //         slidesToShow: 1,
        //         slidesToScroll: 1
        //     }
        // }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]


});


