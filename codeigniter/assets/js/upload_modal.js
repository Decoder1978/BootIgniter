$(document).ready(function() {
  // jQuery plugin to prevent double submission of forms
  jQuery.fn.preventDblSub = function() {
    $(this).on('submit',function(e){
      var $form = $(this);
      if ($form.data('submitted') === true) {
        e.preventDefault();
      } else {
        // Mark it so that the next submit can be ignored
        $form.data('submitted', true);
      }
    });
    return this;
  };
  $('form').preventDblSub();

  $('.profile_change').click(function(){
    $('.pr_form').toggle();
  })
});
