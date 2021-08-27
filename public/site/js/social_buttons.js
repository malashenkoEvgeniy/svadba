function toggle_social_button(){
    $('.social-items-menu').fadeToggle();
    $('.social-btn').toggleClass('active');
    $('.social-btn .s-btn-close').toggleClass('active');
    $('.social-btn-pulse').toggleClass('active');
    $('.social-btn-bg').toggleClass('active');
    $('.social-btn .btn-1').toggleClass('close');
    $('.social-btn .btn-2').toggleClass('close');
    $('.social-items-bg').fadeToggle();
    $('.social-items-bg').toggleClass('active');
}


function swap_social_button_icons(){
    $('.btn-1').fadeToggle(1500);
    $('.btn-2').fadeToggle(1500);
    setTimeout(swap_social_button_icons, 2000);
}
swap_social_button_icons();
$('.social-items-wrapper, .social-items-bg ').click(function(){
    toggle_social_button();
});

$(window).on('scroll', { passive: true }, function() {
    if ($(this).scrollTop() > 100) {
        $('#btn-up').fadeIn();
    } else {
        $('#btn-up').fadeOut();
    }
});
