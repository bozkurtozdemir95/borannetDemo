$('.menu-opener').on('click', function () {
    $('body').addClass('menu-open');
});

$('.overlay').on('click', function () {
    $('body').removeClass('menu-open profile-open');
});

$(document).ready(function () {
    var location = window.location.href;
    $('.main-menu li a').each(function(){
        if(location.indexOf(this.href)>-1) {
           $(this).parent().addClass('active');
        }
    });
});