$(document).ready(function () {
    $('.filter-btn-filter').click(function(){
        $('.modal-btn-filter').addClass('active');
    });

    $('.filter-modal-btn-close').click(function(){
        $('.modal-btn-filter').removeClass('active');
    });



//curt

    $('.nav-item-cart-btn').click(function(env){
        env.preventDefault();
        $('.modal-curt').addClass('active');
    });

    $('.cart-modal-btn-close').click(function(){
        $('.modal-curt').removeClass('active');
    });


//filter-sort
    $('.filter-btn-sort').click(function(env){
        $('.filter-btn-sort-list').toggleClass('active');
    });

    if( $(document).width() <= 1200) {

        $(".silhouette-list").slick({
            dots: false,
            arrows: false,
            infinite: true,
            slidesToShow: 2,
            autoplay: true,
            autoplaySpeed: 1000,
            slidesToScroll: 1,
        });

    }

    $('.filter-show-more').click(function (evt) {
        evt.preventDefault();
        $(this).siblings('.filter-group-inputs').css('height', 'auto');
        $(this).css('display', 'none');
    });

    $('.block-pagination .btn-show-more').click(function(){

        let page = $(this).attr('data-page');

        $.ajax({
            method: 'GET',
            url: page,
            data: {
                _token: '{{csrf_token()}}',
            }
        }).done(function(data){
            let page = $(data);
            let items = page.find('.products-item');
            if (page.find('.block-pagination .btn-show-more').length == 1) {
                let nextPage = page.find('.block-pagination .btn-show-more').attr('data-page');
                $('.block-pagination .btn-show-more').attr('data-page', nextPage);
            }else{
                $('.block-pagination .btn-show-more').remove();
            }

            $('.rubric-products-list').append(items);

            let next = $('.page-item.active').next();
            $('.page-item.active').removeClass('active');
            next.addClass("active");
        });
    });


});



























