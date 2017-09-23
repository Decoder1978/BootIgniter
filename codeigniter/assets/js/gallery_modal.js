$(document).ready(function() {
  modal_id = '';
 $(".modal_view").click(function(){
   modal_id = $(this).attr('data-target').replace(/\#/g, '');
     $("#"+modal_id).removeClass('hide').addClass('show');
     $('.modal, .modal-dialog').show();
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

});
