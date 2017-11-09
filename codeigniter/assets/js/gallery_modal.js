$(document).ready(function() {
  var modal_id = '';
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
     let mid_com_shrct = modal_id +' #comment';

     function Styling(tgl, brdr_cls) {
       $(mid_com_shrct + ' textarea').attr('class', "");
       $(mid_com_shrct + ' textarea').addClass('form-control com_msg ' + brdr_cls);
       if(tgl == "show")
        $(mid_com_shrct + ' .popuptext').show('1000');
       else if (tgl == "hide")
        $(mid_com_shrct + ' .popuptext').hide('1000');
     }

       $(mid_com_shrct).on("click",(function(e) {
         e.stopPropagation();
       }));
       $(modal_id).on("click", function(e) {
         if ($(e.target).is(mid_com_shrct) === false && $(mid_com_shrct + ' .form-control').val().length < 3) {
          Styling('hide', 'default');
         }
       });

        $('.modal-dialog').on("click", function(e){
          Styling('hide', 'default');
        })
        $('.com_msg').on("click", function(e){
          Styling('hide', 'focused');
        })

        $(mid_com_shrct + ' .comment-control-submit').click(function(e) {
           if($(mid_com_shrct + ' .form-control').val().trim().length < 3) {
             e.preventDefault();
             Styling('show', 'disabled');
           }
           $(mid_com_shrct + ' .form-control').bind('keydown keyup keypress', function() {
             Styling('hide', 'focused');
           });
       })
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
