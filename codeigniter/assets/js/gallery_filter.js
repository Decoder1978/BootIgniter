$(document).ready(function(){

  function Pagination(value){

    var num_on_page = 3;  // number of albums on page
    var temp_num = 1;

    var count = 0;
    var pages_count;

    if(value == "all"){
      count = $(".filter").length;
      $(".filter").slice(num_on_page * (temp_num-1), num_on_page * temp_num).show();
      $(".filter").not($(".filter").slice(num_on_page * (temp_num-1), num_on_page * temp_num)).hide();
    }
    else{
      count = $("." + value).length;
      if(count == 0)
        $(".gal_pagination_top").hide();
      else
        $(".gal_pagination_top").show();
      $(".filter").filter("." + value).slice(num_on_page * (temp_num-1), num_on_page * temp_num).show();
      $(".filter").not($(".filter").filter("." + value).slice(num_on_page * (temp_num-1), num_on_page * temp_num)).hide();
    }

    var filter_used = null;
    pages_count = Math.ceil(count / num_on_page);

    $('.gal_pagination_top,.gal_pagination_bottom').bootpag({
      total: pages_count,
      page: 1,
      maxVisible: pages_count,
      leaps: false,
      firstLastUse: true,
      first: '←',
      last: '→'
    }).on("page", function(event, num){
      if (filter_used == num){
        return;
      }
      else {
        if(value == "all"){
          var show_pages = $(".filter").slice(num_on_page * (num-1), num_on_page * num);
        }
        else{
          var show_pages = $(".filter").filter("." + value).slice(num_on_page * (num-1), num_on_page * num);
        }
        show_pages.show();
        $(".filter").not(show_pages).hide();
      }
        filter_used = num;
      });


  }


Pagination("all");

  $(".filter-button").click(function(){
      var value = $(this).attr('data-filter');
      if(value == "all")
      {
        Pagination(value);

          if ($(".filter-button").removeClass("active")) {
              $(this).removeClass("active");
            }

            $(this).addClass("active");
      }
      else
      {
          Pagination(value);

          if ($(".filter-button").removeClass("active")) {
              $(this).removeClass("active");
            }

            $(this).addClass("active");

      }
  });

});
