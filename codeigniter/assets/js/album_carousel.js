$(document).ready(function($) {

      $('#myCarousel').carousel({
              interval: 5000
      });
      // First slide info
      $('#carousel-text').html($('#slide-content-0').html());
      $('#carousel-selector-0').addClass('active');

      $('.pic_tags').detach();
      var tag_arr = $('.carousel-inner div.active span').attr('id').split(",");
      for (i = 0; i < tag_arr.length; i++){
         $('#pictag_links').append('<a class="pic_tags" href="result/'+tag_arr[i]+'">'+tag_arr[i]+'</a>');
      }

      //Handles the carousel thumbnails
     $('[id^=carousel-selector-]').click( function(){
          var id = this.id.substr(this.id.lastIndexOf("-") + 1);
          var id = parseInt(id);
          $('#myCarousel').carousel(id);
          $('[id^=carousel-selector-]').not(this).each(function(){
              $(this).removeClass('active');
          });
          $(this).addClass('active');
      });


      // When the carousel slides, auto update the text
      var old_id = 0;
      $('#myCarousel').on('slid.bs.carousel', function (e) {
               var id = $('.item.active').data('slide-number');
              $('#carousel-text').html($('#slide-content-'+id).html());

              $('#carousel-selector-'+old_id).removeClass('active');
              $('#carousel-selector-'+id).addClass('active');
              old_id = id;

              $('.pic_tags').detach();
              var tag_arr = $('.carousel-inner div.active span').attr('id').split(",");
              for (i = 0; i < tag_arr.length; i++){
                 $('#pictag_links').append('<a class="pic_tags" href="result/'+tag_arr[i]+'">'+tag_arr[i]+'</a>');
              }
      });


      formValidationStyles('#comment');
});
