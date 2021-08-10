"use strict";
if($(document).width() > 1200) {
       

//    Открытие -закрытие формы поиска
    $('.search-form-btn-open').click(function(evt){
        evt.stopPropagation();
        $('.nav-item-nav-menu').addClass('nav-item-nav-menu-close');
        $('.search-form').removeClass('search-input-close');
        $(this).addClass('passive');
    });
//    Ховер меню категорий
    
    $('.nav-menu-link-catalog').hover(function(){
        $('.sub-catalog-list').addClass('active');
    }, function(){});
    $('.sub-catalog-list').hover(function(){
        $(this).addClass('active');
    }, function(){
        $(this).removeClass('active');
    });
    $('.nav-menu-link-catalog').hover(function(){}, function(){
        $('.sub-catalog-list').removeClass('active');
    });
    
    //    Ховер меню услуг
    
    $('.nav-menu-link-service').hover(function(){
        $('.sub-service-list').addClass('active');
    }, function(){});
    $('.sub-service-list').hover(function(){
        $(this).addClass('active');
    }, function(){
        $(this).removeClass('active');
    });
    $('.nav-menu-link-service').hover(function(){}, function(){
        $('.sub-service-list').removeClass('active');
    });
}

if( $(document).width() <= 1200) {
    
    $('.search-form-btn-open').click(function(evt){
        evt.stopPropagation();
        $(this).parent().siblings().addClass('passive');
        $(this).parent().addClass('open-search-blok');
        $('.search-form').removeClass('search-input-close');
        $(this).addClass('passive');
      
    });
    
    $('.btn-menu-burger').click(function(){
        $('.nav-item-nav-menu').addClass('active');
        $('body').addClass('overlay');
        $('.overflow').addClass('overflow-hid');
    });
    
    $('.nav-item-burger-close').click(function(evt){
        $('.nav-item-nav-menu').removeClass('active');
        $('body').removeClass('overlay');
        $('.overflow').removeClass('overflow-hid');
    });
    
    $('.nav-menu-link-catalog').click(function(){
         $('.nav-item-nav-menu').removeClass('active');
         $('.sub-catalog-menu').addClass('active');
    });
    
    $('.sub-catalog-menu .nav-menu-back').click(function(){
         $(this).parent().removeClass('active');
        $('.nav-item-nav-menu').addClass('active');
    });
    
    $('.sub-catalog-link').click(function(){
         $(this).toggleClass('active');
         $(this).siblings().toggleClass('active');
        
    });
    $('.nav-menu-link-service').click(function(evt){
        evt.preventDefault();
         $('.nav-item-nav-menu').removeClass('active');
         $('.sub-service-menu').addClass('active');
    });
    
     $('.sub-service-menu .nav-menu-back').click(function(){
         $(this).parent().removeClass('active');
        $('.nav-item-nav-menu').addClass('active');
    });
    
}

