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


});



























