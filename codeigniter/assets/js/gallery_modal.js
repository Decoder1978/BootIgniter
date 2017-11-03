$(document).ready(function() {
  var modal_id = '';
 $(".modal_view").click(function(){
   modal_id = $(this).attr('data-target').replace(/\#/g, '');



     $("#"+modal_id).removeClass('hide').addClass('show');
     $('.modal, .modal-dialog').show();
     $("#"+modal_id).on("show.bs.modal", function () {
       $('.lazy_load').each(function(){
           var img = $(this);
           img.attr('src', img.data('src'));
       });
     });


     //Added comment form control

       $('#'+modal_id+' #comment').on("click",(function(e) {
         e.stopPropagation();
       }));
       $("#"+modal_id).on("click", function(e) {
         if ($(e.target).is('#'+modal_id+' #comment') === false && $('#'+modal_id+' #comment .form-control').val().length == 0) {
           $('#'+modal_id+' #comment .form-control').css('border', 'none');
           $('#'+modal_id+' #comment .popuptext').hide('1000');
         }
       });
       $('#'+modal_id+' #comment .comment-control-submit').click(function(e) {
         var text = $('#'+modal_id+' #comment .form-control').val();
           if($('#'+modal_id+' #comment .form-control').val().trim().length == 0) {
             e.preventDefault();
             $('#'+modal_id+' .comment_section .form-control').css('border', '2px solid red');
             $('#'+modal_id+' #comment .popuptext').show('1000');
           }
           $('#'+modal_id+' #comment .form-control').bind('keydown keyup keypress', function() {
             $('#'+modal_id+' #comment .form-control').css('border', 'none');
             $('#'+modal_id+' #comment .popuptext').hide('1000');
           });
       })


 });

// Closing modal by button or click out of bounds
 $('.modal ').click(function(){
   $("#"+modal_id).removeClass('show').addClass('hide');
    $('.modal, .modal-dialog').hide();
  })
 $('.modal-dialog').click(function(e){
    e.stopPropagation();
  })
  $('.close ').click(function(){
    $("#"+modal_id).removeClass('show').addClass('hide');
    $("#"+modal_id).modal('hide');
  })

  $(function() {
      //  $('#myCarousel').carousel({interval: 2000});
        $("#"+modal_id).on('slid', function() {
            var to_slide = $('.carousel-item.active').attr('data-slide-no');
            $(modal_id+'-target.active').removeClass('active');
            $('.carousel-indicators [data-slide-to=' + to_slide + ']').addClass('active');
        });
        $(modal_id+'-target').on('click', function() {
            $("#"+modal_id).carousel(parseInt($(this).attr('data-slide-to')));
            $(modal_id+'-target.active').removeClass('active');
            $(this).addClass('active');
        });
    });

});
