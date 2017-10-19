$(document).ready(function(){
  $('#search').on("click",(function(e){
  $(".form-group").addClass("sb-search-open");
    e.stopPropagation();
  }));
   $(document).on("click", function(e) {
    if ($(e.target).is("#search") === false && $(".form-control").val().length == 0) {
      $(".form-group").removeClass("sb-search-open");
      $("#search .form-control").css('border', 'none');
      $(".search-label").css({'background': '#A84', 'color': '#fff'});
      $(".navbar-right").css('min-width', '40px');
    }
  });
    $(".form-control-submit").click(function(e){
      $(".form-control").each(function(){
        if($(".form-control").val().length == 0){
          e.preventDefault();
          $(".search-form .form-control").css('border', '2px solid red');
          $(".search-label").css({'background': 'red', 'color': '#fff'});
        }
    })
  })

// collapsed navbar closing fix
  $(document).click(function(e) {
    if (!$(e.target).is('a')) {
        $('.collapse').collapse('hide');
      }
  });
})
