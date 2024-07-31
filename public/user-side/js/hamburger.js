$(document).ready(function(){
    //Hamburger
    $('.cross_logo').hide();
    $('.navBarMenu2').hide();
    $('.navBarMenu').addClass('navi');
    $('.hamburger_logo').on('click',function(){
        $('.hamburger_logo').hide();
        $('.cross_logo').show();
        $('.navBarMenu2').show();
    });

    $('.cross_logo').on('click',function(){
        $('.cross_logo').hide();
        $('.hamburger_logo').show();
        $('.navBarMenu').addClass('navi'); 
        $('.navBarMenu2').hide();
    });
    $('.searchCloseButton').click(function(){
        $('.search').css('display','none')
    })

    
});