$(document).ready(function(){

  function Pagination(value) {

      var num_on_page = 2;  // number of albums on page
      var count, pages_count;

      if(value == "all"){
        count = $(".filter").length;
        $(".filter").show();
        $(".gal_pagination_top").hide();
      }
      else {
        count = $("." + value).length;
        if(count == 0)
          $(".gal_pagination_top").hide();
        else
          $(".gal_pagination_top").show();

        $(".filter").filter("." + value).slice(num_on_page * 0, num_on_page).show();
        $(".filter").not($(".filter").filter("." + value).slice(num_on_page * 0, num_on_page)).hide();
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
      }).on("page", function(event, num) {
        if(filter_used == num) return;
        else {
          if(value == "all")
            var show_pages = $(".filter");
          else
            var show_pages = $(".filter").filter("." + value).slice(num_on_page * (num-1), num_on_page * num);
          show_pages.show();
          $(".filter").not(show_pages).hide();
        }
          filter_used = num;
        });
    }

Pagination("all");

  $(".filter-button").click(function() {
      var value = $(this).attr('data-filter');
        Pagination(value);
        if ($(".filter-button").removeClass("active")) {
            $(this).removeClass("active");
          }
          $(this).addClass("active");
  });
});
