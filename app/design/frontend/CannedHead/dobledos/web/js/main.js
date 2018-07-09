define([
    "jquery",
    "bootstrap"
  ], 
  function($) {
    "use strict";
  
        $(document).ready(function($){
        $('#searchbtn').click(function(){
                        console.log('Click search');
                         $("#searchwrapper").toggle();
                     });
        });

        $('.navbardropdowndd').mouseover(function(){
            if(!$(this).hasClass("open")){
              $(this).addClass('open');
            }              
        });

        $('.navbardropdowndd').mouseout(function() {
          if($(this).hasClass("open")){
            $(this).removeClass('open');
          }     
        });

        $(".nav-toggle").click(function(){
          console.log("toggle");
          $(".navbar-dd").toggleClass("hidden-xs");
        });

        // Find all YouTube videos
        var $allVideos = $("iframe[src^='//www.youtube.com']"),

        // The element that is fluid width
        $fluidEl = $("body");

        // Figure out and save aspect ratio for each video
        $allVideos.each(function() {

          $(this)
            .data('aspectRatio', this.height / this.width)

            // and remove the hard coded width/height
            .removeAttr('height')
            .removeAttr('width');

        });

        // When the window is resized
        $(window).resize(function() {

          var newWidth = $fluidEl.width();

          // Resize all videos according to their own aspect ratio
          $allVideos.each(function() {

            var $el = $(this);
            $el
              .width(newWidth)
              .height(newWidth * $el.data('aspectRatio'));

          });

        // Kick off one resize to fix all videos on page load
        }).resize();

        return;
  });