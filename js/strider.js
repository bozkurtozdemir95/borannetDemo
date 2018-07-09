$(document).ready(function(){
    "use strict";
    
    // PAGE LOADING BAR
    ;(function(){
      function id(v){ return document.getElementById(v); }
      function loadbar() {
        var ovrl = id("loader-wrapper"),
            prog = id("progress"),
            img = document.images,
            c = 0,
            tot = img.length;
        if(tot == 0) return doneLoading();

        function imgLoaded(){
          c += 1;
          var perc = ((100/tot*c) << 0) +"%";
          prog.style.width = perc;
          stat.innerHTML = "Loading "+ perc;
          if(c===tot) return doneLoading();
        }
        function doneLoading(){
          ovrl.style.opacity = 0;
          setTimeout(function(){ 
            ovrl.style.display = "none";
          }, 1200);
        }
        for(var i=0; i<tot; i++) {
          var tImg     = new Image();
          tImg.onload  = imgLoaded;
          tImg.onerror = imgLoaded;
          tImg.src     = img[i].src;
        }    
      }
      document.addEventListener('DOMContentLoaded', loadbar, false);
    }());
    
    // NAVBAR RESIZE FUNCTION
    $(window).scroll( function() {
        var value = $(this).scrollTop();
        if ( value > $(window).height() * 1 )
            $(".navbar-dark").addClass("scrolled");
        else
            $(".navbar-dark").removeClass("scrolled");
    });
    
    //HAMBURGER MENU ANIMATION
        $('#hamburger').click(function(){
        $(this).toggleClass('open');
       });
    
    // SMOOTH SCROLLING TO ANCHORS
        $('a[href*=\\#]:not([href=\\#]):not(.control-right, .control-left, .carousel-control-prev, .carousel-control-next)').on('click', function() {
            if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html,body').animate({
                  scrollTop: target.offset().top - 100
                }, 1000);
            return false;
          }
        }
      });
    
    // ANIMATIONS
    var $animation_elements = $('.animation-element');
    var $window = $(window);

    function check_if_in_view() {
      var window_height = $window.height();
      var window_top_position = $window.scrollTop();
      var window_bottom_position = (window_top_position + window_height);

      $.each($animation_elements, function() {
        var $element = $(this);
        var element_height = $element.outerHeight();
        var element_top_position = $element.offset().top + 150;
        var element_bottom_position = (element_top_position + element_height);

        //check to see if this current container is within viewport
        if ((element_bottom_position >= window_top_position) &&
            (element_top_position <= window_bottom_position)) {
          $element.addClass('in-view');
        }
      });
    }
    $window.on('scroll resize', check_if_in_view);
    $window.trigger('scroll');
    
    //STOP VIDEO FROM PLAYING AFTER CLOSING A MODAL
    $("body").on('hidden.bs.modal', function (e) {
        var $iframes = $(e.target).find("iframe");
        $iframes.each(function(index, iframe){
            $(iframe).attr("src", $(iframe).attr("src"));
         });
     });
    
    // LIGHTBOX OPTIONS
     lightbox.option({
      'resizeDuration': 500,
      'imageFadeDuration': 500,
      'wrapAround': true
    });
    
    // LOAD GOOGLE MAP
    google.maps.event.addDomListener(window, 'load', init);
         function init() {
                // Basic options for a simple Google Map
                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                var mapOptions = {
                    // How zoomed in you want the map to start at (always required)
                    zoom: 16,

                    // The latitude and longitude to center the map (always required)
                    center: new google.maps.LatLng(40.9999952371434,28.64481881260872), // New York

                    // How you would like to style the map. 
                    // This is where you would paste any style found on Snazzy Maps.
                   styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"lightness":20},{"color":"#000000"}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"administrative.country","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"color":"#ffffff"}]},{"featureType":"administrative.province","elementType":"geometry.fill","stylers":[{"visibility":"simplified"}]},{"featureType":"administrative.province","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"administrative.province","elementType":"labels.text.stroke","stylers":[{"weight":"0.01"},{"invert_lightness":true},{"color":"#f26c4f"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"visibility":"simplified"},{"weight":"0.05"},{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#E48632"},{"weight":"0.10"},{"invert_lightness":true},{"lightness":29}]},{"featureType":"road.highway","elementType":"labels.text.fill","stylers":[{"color":"#E48632"}]},{"featureType":"road.highway.controlled_access","elementType":"geometry","stylers":[{"weight":"0.30"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}]
                };

                // Get the HTML DOM element that will contain your map 
                // We are using a div with id="map" seen below in the <body>
                var mapElement = document.getElementById('map-canvas');

                // Create the Google Map using our element and options defined above
                var map = new google.maps.Map(mapElement, mapOptions);

                // Let's also add a marker while we're at it
                var image = 'images/map_marker.png';
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(40.9999952371434,28.64481881260872),
                    map: map,
                    icon: image,
                    title: 'Snazzy!'
                });
            }

            
            
});
window.onload = function() {
    //INITIALIZE ISOTIPE
    // cache container
    var $container = $('.games-portfolio');
    // initialize isotope
    $container.isotope({
    // options...
    });
    // filter items when filter link is clicked
    $('.game-tags li a').on('click', function(){
        var selector = $(this).attr('data-filter');
        $container.isotope({ filter: selector });
        return false;
    });
    
    // HIDE LOADING SCREEN WHEN PAGE IS LOADED
    $('#loader-wrapper').addClass('loaded');
    
}

$(document).ready(function(){
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        item:1,
        autoplay: true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    })
    });