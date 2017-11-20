$(document).ready(function() {
  $('#search').on("click",(function(e){
    $(".form-group").addClass("sb-search-open");
      e.stopPropagation()
    }));
    $(document).on("click", function(e) {
     if ($(e.target).is("#search") === false && $(".form-control").val().length == 0) {
       $(".form-group").removeClass("sb-search-open");
     }
   });
   formValidationStyles('#search');

// collapsed navbar closing fix
  $(document).click(function(e) {
    if (!$(e.target).is('a')) {
        $('.collapse').collapse('hide');
      }
  });
})
