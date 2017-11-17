$(document).ready(function() {
  $('#search').on("click",(function(e){
    formValidationStyles('#search');
  }))

// collapsed navbar closing fix
  $(document).click(function(e) {
    if (!$(e.target).is('a')) {
        $('.collapse').collapse('hide');
      }
  });
})
