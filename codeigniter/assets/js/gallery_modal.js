$(document).ready(function() {
  var modal_id;
 $(".modal_view").click(function(){
   modal_id = $(this).attr('data-target');

   //Modal pic lazy load
     $(modal_id).removeClass('hide').addClass('show');
     $('.modal, .modal-dialog').show();

     $(modal_id).on("show.bs.modal", function () {
       let id = modal_id.replace("#myModal", "");
       $('.lazy_load'+id).each(function(){
           let img = $(this);
           img.attr('src', img.data('src'));
       });
     });

      //Comment form control
     let modal_form = modal_id +' #comment';
     formValidationStyles(modal_form);
 });

// Closing modal by button or click out of bounds
 $('.modal ').click(function(){
   $(modal_id).removeClass('show').addClass('hide');
    $('.modal, .modal-dialog').hide();
  })
 $('.modal-dialog').click(function(e){
    e.stopPropagation();
  })
  $('.close ').click(function(){
    $(modal_id).removeClass('show').addClass('hide');
    $(modal_id).modal('hide');
  })
});
