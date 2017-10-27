$(document).ready(function(){
  $('#search').on("click",(function(e){
    e.stopPropagation();
  }));
   $(document).on("click", function(e) {
    if ($(e.target).is("#search") === false && $(".form-control").val().length == 0) {
      $("#search .form-control").css('border', 'none');
      $(".search-label").css({'background': '#A84', 'color': '#fff'});
      $(".popuptext").hide('1000');
    }
  });
    $(".form-control-submit").click(function(e){
      $(".form-control").each(function(){
        if($(".form-control").val().trim().length == 0){
          e.preventDefault();
          $(".search-form .form-control").css('border', '2px solid red');
          $(".search-label").css({'background': 'red', 'color': '#fff'});
          $(".popuptext").show('1000');
        }
        $('.form-control').bind('keydown keyup keypress', function() {
          $("#search .form-control").css('border', 'none');
          $(".search-label").css({'background': '#A84', 'color': '#fff'});
          $(".popuptext").hide('1000');
        });
    })
  })

// collapsed navbar closing fix
  $(document).click(function(e) {
    if (!$(e.target).is('a')) {
        $('.collapse').collapse('hide');
      }
  });
})
